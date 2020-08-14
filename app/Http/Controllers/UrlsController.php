<?php

namespace App\Http\Controllers;

use App\retornos;
use App\urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlsController extends Controller
{
    public function index(Request $request)
    {
        $urls = new urls();
        $urls = $urls->filtros($request);
        $request->flash();

        return view('urls.list')->with(compact('urls'));
    }


    public function create()
    {
        return view('urls.add_edit')->with(['urls' => null]);
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
        $dados = new urls();
        if ($dados->store($request))
            return redirect()->route('urls.index');
    }

    public function pesquisaConteudo(Request $request) {
        $url_id = $request->has('url_id') ? $request->url_id : false;

        if ($url_id) {
            $dados = retornos::where('url_id',$url_id)->first();
            $conteudo = base64_decode($dados->retorno);

            return response()->json(['result' => 'OK', 'retorno' => $conteudo]);
        } else {
            return response()->json(['result' => 'ERRO']);
        }

    }


    public function show(urls $urls)
    {
        //
    }


    public function edit(urls $urls)
    {
        if (is_null($urls)) {
            abort(404);
        }
        return view('urls.add_edit')->with(compact('urls'));
    }

    public function update(Request $request, urls $urls)
    {
        $validator = $this->isValid($request, false);
        $request->flash();
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (is_null($urls)) {
            abort(404);
        }
        $urls->store($request);
        return redirect()->route('urls.index');
    }


    public function destroy(urls $urls)
    {
        $urls->delete();
        return redirect()->route('urls.index');
    }



    public function isValid(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'endereco' => ['url'],
            'nome_site' => ['required'],
        ]);

        return $validator;
    }
}
