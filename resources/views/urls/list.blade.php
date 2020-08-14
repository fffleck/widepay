@extends('layouts.app')

@section('page_title')

@endsection

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Filtro
                </h2>
            </div>
            <form>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-4">
                            <p>
                                <b>Endereço da URL</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="endereco" name="endereco" class="form-control date"  value="{{ old('endereco') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <p>
                                <b>Descrição</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="nome_site" name="nome_site" class="form-control date" value="{{ old('nome_site') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <b>&nbsp;</b>
                            </p>
                            <button class="btn btn-success waves-effect control-label">Buscar</button>
                            <a href="{{ route('urls.create') }}" class="btn btn-info waves-effect control-label">Nova</a>
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
                    Lista de Urls Cadastradas
                </h2>
            </div>
            <div class="body table-responsive">
                @if($urls->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Url</th>
                            <th>Descrição</th>
                            <th>  </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($urls as $url)
                            <tr>
                                <td scope="row">{{ $url->id }}</td>
                                <td>{{ $url->url }}</td>
                                <td>{{ $url->nome_site }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $urls->links() }}
                @else
                    <div class="alert alert-info">
                        <p>Sem Urls para exibir</p>
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


        $(() => {
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
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não'
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
