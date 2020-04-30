@extends('layouts.app')

@section('page_name')
    
@endsection

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Lista de Tags
                </h2>
            </div>
            <form>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-4">
                            <p>
                                <b>Nome da Tag</b>
                            </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control date"  value="{{ old('name') }}">
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
                    Tags Cadastradas
                </h2>
            </div>
            <div class="body table-responsive">
                @if($Tags->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Tags as $Tag)
                                <tr>
                                    <td scope="row">{{ $Tag->id }}</td>
                                    <td>{{ $Tag->name }}</td>
                                    <td>
                                        <a class="btn btn-primary" href={{ route('tag.edit', $Tag->id) }}>Editar
                                        </a>
                                        <button type="button" class="btn btn-danger delete" data-tag-id="{{ $Tag->id }}" data-tag-name="{{ $Tag->name }}">Apagar
                                        </button>
                                        <form action="{{ route('tag.destroy', $Tag->id) }}" method="POST" id="delete_{{ $Tag->id }}">
                                            @method('delete')
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $Tags->links() }}
                @else
                    <div class="alert alert-info">
                        <p>Sem dados para exibir</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        var delete_question = "{{ trans('tag.delete_question') }}";

        $(() => {
            $(".delete").click(function () {
                var title = $(this).data("tag-name"),
                    id = $(this).data("tag-id");
                    swal({
                        title: '',
                        text: `Deseja Realmente Apagar a Tag : ${title}`,
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
        });
    </script>
@endpush

