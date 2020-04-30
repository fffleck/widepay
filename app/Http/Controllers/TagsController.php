<?php

namespace App\Http\Controllers;

use App\Tags;
use App\ProdutosTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidatorMade;

class TagsController extends Controller
{

    public function index(Request $request)
    {
        $Tag = new Tags();
        $Tags = $Tag->filtro($request);
        $request->flash();
        return view('tag.list')->with(compact('Tags'));
    }


    public function create()
    {
        return view('tag.add_edit')->with(['Tag' => null]);
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
        (new Tags())->store($request);
        return redirect()->route('tag.index');
    }



    public function edit(Tags $Tag)
    {
        if (is_null($Tag)) {
            abort(404);
        }
        return view('tag.add_edit')->with(compact('Tag'));
    }

    public function update(Request $request, Tags $Tag)
    {
        $validator = $this->isValid($request, false);
        $request->flash();
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (is_null($Tag)) {
            abort(404);
        }
        $Tag->store($request);
        return redirect()->route('tag.index');
    }

    public function destroy(Tags $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }


    public function isValid(Request $request, $img_required = true) : ValidatorMade
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','min:1', 'max:255'],
        ]);
        return $validator;
    }

}
