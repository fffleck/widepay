<div class="row">
    <form id="num_paginas">
        <input type="hidden" name="rows" id="rows_by_page" value="{{ $rows }}"/>
        @php
            if(!isset($query)) {
                $query = array_filter(old());
            }
        @endphp
        @foreach($query as $key => $attr)
            @php if($key == 'rows') { continue; } @endphp
            <input type="hidden" name="{{ $key }}" id="{{ $key }}" value="{{ $attr }}"/>
        @endforeach
    </form>
    <div class="col-xs-12 col-sm-6 col-md-6 col-ls-6 col-xl-6  text-left">
        {{--<h2 class="panel-title text-left">--}}
            {{--@if(isset($nome_tabela))--}}
                {{--{{ $nome_tabela }}--}}
            {{--@else--}}
                {{--{{ trans('perfil.Resultado') }}--}}
                {{--@endempty--}}
        {{--</h2>--}}
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-ls-6 col-xl-6  text-right">
        @if(!isset($exibir_botao_exportacao) || $exibir_botao_exportacao)
            <div class="btn-group">
                {{--<a class="btn btn-primary buttons-print" target="_blank"--}}
                {{--href="{{ route(Route::currentRouteName()) }}?{{ http_build_query($query + ['export' => \App\Enum\EnumFormatosExportacao::PRINT_EX]) }}">--}}
                {{--<span>{{ trans('perfil.Imprimir') }}</span>--}}
                {{--</a>--}}
                {{--<a class="btn btn-primary buttons-csv buttons-html5" target="_blank"--}}
                   {{--@if(count($query))--}}
                   {{--href="{{ route(Route::currentRouteName()) }}?{{ http_build_query($query + ['export' => 'csv']) }}"--}}
                   {{--@else--}}
                   {{--href="#"--}}
                   {{--onclick="swal('{{ trans('admin.Erro') }}', '{{ trans('relatorios.Para exportar neste formato, é necessário preencher algum filtro.') }}', 'error'); return false;"--}}
                        {{--@endif--}}
                {{-->--}}
                    {{--<span>CSV</span>--}}
                {{--</a>--}}

                <div class="btn-group">
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                      {{trans('pagination.Items per page')}}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li onclick="itensPagina(15)"><a
                                    href="#">15 {!! $rows == 15 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '' !!}</a>
                        </li>
                        <li onclick="itensPagina(30)"><a
                                    href="#">30 {!! $rows == 30 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '' !!}</a>
                        </li>
                        <li onclick="itensPagina(60)"><a
                                    href="#">60 {!! $rows == 60 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '' !!}</a>
                        </li>
                        <li onclick="itensPagina(100)"><a
                                    href="#">100 {!! $rows == 100 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '' !!}</a>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="btn-group">
                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                    {{trans('pagination.Items per page')}}<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li onclick="itensPagina(15)"><a
                                href="#">15 {!! $rows == 15 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '' !!}</a>
                    </li>
                    <li onclick="itensPagina(30)"><a
                                href="#">30 {!! $rows == 30 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '' !!}</a>
                    </li>
                    <li onclick="itensPagina(60)"><a
                                href="#">60 {!! $rows == 60 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '' !!}</a>
                    </li>
                    <li onclick="itensPagina(100)"><a
                                href="#">100 {!! $rows == 100 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '' !!}</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</div>
