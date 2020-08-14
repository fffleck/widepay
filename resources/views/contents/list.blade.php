@extends('layouts.app')

@section('page_title')

@endsection

@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Visualização do Conteudo do Site</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="conteudo_site" name="conteudo_site"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
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
                @if($retornos->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Url</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Data Consulta</th>
                            <th> </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($retornos as $linha)
                            <tr>
                                <td scope="row">{{ $linha->url_id }}</td>
                                <td scope="row">{{ \App\urls::find($linha->url_id)->url }}</td>
                                <td>{{ \App\urls::find($linha->url_id)->nome_site }}</td>
                                <td>{{ $linha->cod_retorno }}</td>
                                <td>{{ $linha->dt_consulta}}</td>
                                <td><a href="" class="btn btn-secondary" onclick="conteudo({{$linha->url_id}})" data-toggle="modal"  data-target="#exampleModal">Visualizar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

        function conteudo(id) {
            $.ajax({
                method: "post",
                data: { url_id: id,
                    _token: "{{ csrf_token() }}" },
                url: "{{ route('url.pesquisa') }}",
            }).done(function(response) {
                if (response.result = "OK") {
                    $("#conteudo_site").html(response.retorno);
                } else {
                    $("#conteudo_site").html("Sem retorno para este site");
                }

            });
        }

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

        function visualiza(url) {

        }

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
