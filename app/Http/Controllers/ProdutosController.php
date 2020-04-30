<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Tags;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidatorMade;

class ProdutosController extends Controller
{

    const MAX_DESCRIPTION_SIZE = 4000;

    public function index(Request $request)
    {
        $Produto = new Produtos();
        $Produtos = $Produto->filtroProdutos($request);
        $Range = $Produto->getStock($request);
        $request->flash();
        return view('produto.list')->with(compact('Produtos', 'Range'));
    }


    public function create()
    {
        $Tags = Tags::all();
        return view('produto.add_edit')->with(['Produto' => null, 'Tags' => $Tags]);
    }


    public function store(Request $request)
    {
        $validator = $this->isValid($request);
        $request->flash();
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        (new Produtos())->store($request);
        return redirect()->route('produto.index');
    }


    public function show(Produtos $Product)
    {
        //
    }


    public function edit(Produtos $Produto)
    {
        if (is_null($Produto)) {
            abort(404);
        }
        $Tags = Tags::all();
        $productTagsIds = $Produto->tags->pluck('id')->all();
        return view('produto.add_edit')->with(compact('Produto', 'Tags', 'productTagsIds'));
    }


    public function update(Request $request, Produtos $Produto)
    {
        $validator = $this->isValid($request, false);
        $request->flash();
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (is_null($Produto)) {
            abort(404);
        }
        $Produto->store($request);
        return redirect()->route('produto.index');
    }


    public function destroy(Produtos $Produto)
    {
        $Produto->delete();
        return redirect()->route('produto.index');
    }



    public function isValid(Request $request, $img_required = true) : ValidatorMade
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required','min:6', 'max:255'],
            'stock' => ['required', 'numeric'],
            'image' => [($img_required ? 'required' : ''), 'file', 'image', 'mimetypes:image/png,image/jpg,image/gif', 'max:5000'],
            'description' => ['required', 'max:4000'],
        ]);

        return $validator;
    }
}
