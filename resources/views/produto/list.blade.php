@extends('layouts.app')

@section('page_title')
    
@endsection

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   Lista de Produtos
                </h2>
            </div>
            <form>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-4">
                            <p>
                                <b>Produto</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="title" name="title" class="form-control date"  value="{{ old('title') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <p>
                                <b>Descrição</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="description" name="description" class="form-control date" value="{{ old('description') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <b>&nbsp;</b>
                            </p>
                            <button class="btn btn-success waves-effect control-label">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Produtos Cadastrados
                </h2>
            </div>
            <div class="body table-responsive">
                @if($Produtos->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Estoque</th>
                                <th>Imagem</th>
                                <th>Tags</th>
                                <th>  </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Produtos as $Produto)
                                <tr>
                                    <td scope="row">{{ $Produto->id }}</td>
                                    <td>{{ $Produto->title }}</td>
                                    <td>
                                        {{ str_limit(strip_tags($Produto->description), 50) }}
                                        <div id="description_{{ $Produto->id }}" style="display: none;">
                                            {!! $Produto->description !!}
                                        </div>

                                    </td>
                                    <td>{{ $Produto->stock }}</td>
                                    <td>                                        
                                        <a id="a_product_img" target="_blank" href="{{ asset("storage/{$Produto->image}") }}" data-sub-html="Demo Description">
                                            <img id="img_product_img" style="max-height: 150px; max-width: 150px;" class="img-responsive thumbnail" src="{{ asset("storage/{$Produto->image}") }}">
                                        </a>
                                    </td>
                                    <td>
                                        {{ implode(', ', $Produto->tags->pluck('name')->all()) }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href={{ route('produto.edit', $Produto->id) }}>
                                            Editar
                                        </a>
                                        <button type="button" class="btn btn-danger delete" data-product-id="{{ $Produto->id }}" data-product-title="{{ $Produto->title }}">Apagar
                                        </button>
                                        <form action="{{ route('produto.destroy', $Produto->id) }}" method="POST" id="delete_{{ $Produto->id }}">
                                            @method('delete')
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $Produtos->links() }}
                @else
                    <div class="alert alert-info">
                        <p>Sem Produtos para exibir</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    {{-- <link href="{{ asset('plugins/nouislider/nouislider.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('plugins/light-gallery/js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('plugins/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        var min_start = parseInt("{{ old('from_stock') ?? $Range->min_stock }}"),
            max_start = parseInt("{{ old('to_stock') ?? $Range->max_stock }}");
            min = parseInt("{{ $Range->min_stock }}"),
            max = parseInt("{{ $Range->max_stock }}"),
            delete_question = "{{ trans('product.delete_question') }}";

        $(() => {
            var rangeSlider = document.getElementById('nouislider_range_example');
            noUiSlider.create(rangeSlider, {
                start: [min_start, max_start],
                connect: true,
                step: 1,
                range: {
                    'min': min,
                    'max': max
                }
            });
            getNoUISliderValue(rangeSlider, false);

            $(".delete").click(function () {
                var title = $(this).data("product-title"),
                    id = $(this).data("product-id");
                    swal({
                        title: '',
                        text: `${delete_question} Title: ${title}`,
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '{{ trans("product.yes") }}',
                        cancelButtonText: '{{ trans("product.no") }}'
                    }, () => {
                        $(`#delete_${id}`).submit();
                    });
            });

            $(".see-description").click(function () {
                var id = $(this).data("product-id");
                var text = $(`#description_${id}`).html();
                swal({
                    title: '',
                    text: $(`#description_${id}`).html(),
                    html: true,
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                });
            });
            
        });

        //Get noUISlider Value and write on
        function getNoUISliderValue(slider, percentage) {
            slider.noUiSlider.on('update', function () {
                var val = slider.noUiSlider.get();
                var min = parseInt(val[0]),
                    max = parseInt(val[1]);
                $("#from_stock").html(min);
                $("#to_stock").html(max);
                $("#input_from_stock").val(min);
                $("#input_to_stock").val(max);
            });
        }
    </script>
@endpush
