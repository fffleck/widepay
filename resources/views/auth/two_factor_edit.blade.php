@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="panel widget">
            <div class="panel-heading vd_bg-grey">
                <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-shield"></i> </span> {{ trans('auth.Securit') }} | {{ trans('auth.Two-factor') }} </h3>
            </div>
            <div class="panel-body">

                <div class="panel widget panel-bd-left light-widget">
                    <div class="panel-heading"> </div>
                    <div class="panel-body">
                        <h2 class="mgbt-xs-20"><span class="vd_grey">{{ trans('auth.You') }}</span> <strong class="font-semibold">{{ trans('auth.status') }}</strong></h2>
                        @if(Auth::user()->authy_id)
                            <h4 class="font-semibold"><span class="vd_green">{{ trans('auth.Active') }}</span>  </h4>
                        @else
                            <h4 class="font-semibold"><span class="vd_red">{{ trans('auth.Inactive') }}</span></h4>
                        @endif

                        <br/>
                        <a href="https://play.google.com/store/apps/details?id=com.authy.authy">{{ trans('auth.Download APP') }}</a>
                    </div>
                </div>

                @if(Auth::user()->authy_id)
                    <h4 class="font-semibold">{{ trans('auth.Inactive my two-factor') }}</h4>
                    <h5>{{ Auth::user()->country->name }} {{ Auth::user()->phone_number }}</h5>
                    <form class="form-horizontal" action="{{ route('two_factor_edit') }}" role="form" method="post">
                        @csrf
                        <input type="hidden" name="inactive" value="1">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="control-label">{{ trans('auth.Code') }}</label>
                                <div class="controls">
                                    <input type="text" placeholder="{{ trans('auth.Code') }}" name="code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-danger" type="submit"><span class="menu-icon"><i class="fa fa-fw fa-check-circle"></i> {{ trans('auth.Inactive') }} </span> </button>
                        </div>
                    </form>
                @else
                    <h4 class="font-semibold pt-3">{{ trans('auth.Active my two-factor') }}</h4>
                    <h5>{{ Auth::user()->country->name }} {{ Auth::user()->phone_number }}</h5>
                    <form class="form-horizontal" action="{{ route('two_factor_edit') }}" role="form" method="post">
                        @csrf
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="control-label">{{ trans('auth.Password') }}</label>
                                <div class="controls">
                                    <input type="password" placeholder="{{ trans('auth.Password') }}" name="password">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-success ml-3" type="submit"><span class="menu-icon"><i class="fa fa-fw fa-check-circle"></i> {{ trans('auth.Active') }} </span> </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <!-- Panel Widget -->
    </div>
    <!-- col-md-12 -->
@endsection
