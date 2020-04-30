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
                    {{ is_null($Produto) ? "Adicionar" : "Editar" }}
                </h2>
            </div>
            <form id='form-retrieve' class='form-horizontal' enctype="multipart/form-data"
                action='{{ is_null($Produto) ? route('produto.store') : route('produto.update', $Produto->id) }}' method='post'>
                @if(!is_null($Produto))
                    @method('PUT')
                @endif
                <div class="body">
                    <div class="row clearfix">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <p>
                                <b>Produto</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="title" name="title" class="form-control date""
                                        required minlength="6" value="{{ is_null($Produto) ? old('title') : $Produto->title }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p>
                                <b>Imagem</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <label class="form-control" for="image" id="image-label">Imagem</label>
                                    <input onchange="changeImg(this)" type="file" name="image" id="image" style="display:none;" {{ is_null($Produto) ? "required" : "" }} accept="image/png, image/jpg, image/gif"/>
                                </div>
                            </div>
                            @if(!is_null($Produto))
                                <div id="product-image" class="list-unstyled row clearfix">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a id="a_product_img" href="{{ asset("storage/{$Produto->image}") }}" data-sub-html="Demo Description">
                                            <img id="img_product_img" class="img-responsive thumbnail" src="{{ asset("storage/{$Produto->image}") }}">
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div style="display: none;" id="product-image" class="list-unstyled row clearfix">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a id="a_product_img" href="#" data-sub-html="Demo Description">
                                            <img id="img_product_img" class="img-responsive thumbnail">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <p>
                                <b>Estoque</b>
                            </p>
                            <div class="input-group">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="number" min="0"  id="stock" name="stock" class="form-control date" required value="{{ is_null($Produto) ? old('stock') : $Produto->stock }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p>
                                <b>Tags Disponíveis </b>
                            </p>
                            <select id="tags" name="tags[]" class="ms" multiple="multiple">
                                @php
                                    $tagsIdsArray = isset($ProdutosTagsIds) 
                                        ? $ProdutosTagsIds 
                                        : (old('tags') ?? []);
                                @endphp
                                @foreach ($Tags as $Tag)
                                    <option {{ in_array($Tag->id, $tagsIdsArray) ? 'selected' : '' }} value="{{ $Tag->id }}">{{ $Tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <p>
                                <b>Descrição do Produto</b>
                            </p>
                            <textarea id="description" cols="250" rows="8" name="description">{{ is_null($Produto) ? old('description') : $Produto->description }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <p>
                                <b>&nbsp;Utilize o editor acima para inserir a descrição completo do produto</b>
                            </p>
                            <button class="btn btn-success waves-effect control-label">Ok</button>
                        </div>
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
    <script src="{{ asset('plugins/light-gallery/js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('plugins/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        function changeImg(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_product_img').attr('src', e.target.result);
                    $('#a_product_img').attr('href', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
            $("#product-image").show();
        }

        $(() => {
            $('#product-image').lightGallery({
                thumbnail: true,
                selector: 'a'
            });
            $('#tags').multiSelect();
        });
    </script>
@endpush