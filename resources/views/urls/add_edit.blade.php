@extends('layouts.app')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        @if($error = 'validation.url')
                            <li>URL Inválida (seu endereço de seguir o exemplo: http://www.seusite.com ou https://www.seusite.com.br )</li>
                        @else
                            <li>{{ $error }} </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="header">
                <h2>
                    {{ is_null($urls) ? "Adicionar" : "Editar" }}
                </h2>
            </div>
            <form id='form-retrieve' class='form-horizontal' enctype="multipart/form-data"
                  action='{{ is_null($urls) ? route('urls.store') : route('urls.update', $urls->id) }}' method='post'>
                @if(!is_null($urls))
                    @method('PUT')
                @endif
                <div class="body">
                    <div class="row clearfix">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <p>
                                <b>URLs</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="endereco" name="endereco" class="form-control date" required minlength="6" value="{{ is_null($urls) ? old('endereco') : $urls->url }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <b>Descrição</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="nome_site" name="nome_site" class="form-control date" required minlength="3" value="{{ is_null($urls) ? old('nome_site') : $urls->nome_site }}">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success waves-effect control-label">Salvar</button>
                        <a href="javascript:history.back()" class="btn btn-info waves-effect control-label">Voltar</a>
                        <a href="{{ route('home') }}" class="btn btn-info waves-effect control-label">Home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('plugins/light-gallery/css/lightgallery.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/multi-select/css/multi-select.css') }}" rel="stylesheet">
@endpush

@push('scripts')
@endpush