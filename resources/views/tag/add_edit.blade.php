@extends('layouts.app')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="header">
                <h2>
                    {{ is_null($Tag) ? "Adicionar" : "Editar" }}
                </h2>
            </div>
            <form id='form-retrieve' class='form-horizontal' enctype="multipart/form-data"
                action='{{ is_null($Tag) ? route('tag.store') : route('tag.update', $Tag->id) }}' method='post'>
                @if(!is_null($Tag))
                    @method('PUT')
                @endif
                <div class="body">
                    <div class="row clearfix">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <p>
                                <b>Nome</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control date" placeholder="{{ trans('tag.name') }}" 
                                        required value="{{ is_null($Tag) ? old('name') : $Tag->name }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p>
                                <b>&nbsp;</b>
                            </p>
                            <button class="btn btn-success waves-effect control-label">Ok</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection