@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="panel widget">
            <div class="panel-heading vd_bg-grey">
                <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-shield"></i> </span> {{ trans('pin.Securit') }} | {{ trans('pin.PIN') }} </h3>
            </div>
            <div class="panel-body">

                <div class="panel widget panel-bd-left light-widget">
                    <div class="panel-heading"> </div>
                    <div class="panel-body">
                        <h2 class="mgbt-xs-10"><span class="vd_grey">{{ trans('pin.Your') }}</span> <strong class="font-semibold">{{ trans('pin.PIN') }}</strong></h2>
                        @if(isset(Auth::user()->pin->pin))
                            <h4 class="font-semibold"><span class="vd_green">{{ trans('pin.Active') }}</span></h4>
                            <button type="button" onclick="newPin()" class="btn btn-info"style=" display: block;margin-top: 13px;">{{ trans('pin.New PIN') }}</button>
                        @else
                            <form method="post" action="{{ route('pin.generate') }}" name="formPin">
                                @csrf
                            <h4 class="font-semibold"><span class="vd_red">{{ trans('pin.Inactive') }}</span> <button type="submit" class="btn btn-info"style=" display: block;margin-top: 13px;">{{ trans('pin.Generate PIN') }}</button> </h4>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <!-- Panel Widget -->
    </div>
    <!-- col-md-12 -->
@endsection
@push('scripts')
    <script type="text/javascript">

        function newPin(){
            var user = "{{ Auth::user()->id }}";

            $.ajax({
                type:'POST',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                url : "{{ route('pin.regenerate') }}",
                data: { user:user}
            }).done(function(results) {
                if (results.status == '{{ \App\Enum\EnumJson::StatusSuccess }}') {
                    swal({
                        title: 'Your PIN Resend',
                        text: 'PIN resend, please verify your email',
                        type: 'success'
                    });

                    setTimeout(function () {
                        location.href = '{{ route('home') }}';
                    }, 5000);

                } else {
                    swal({
                        title: 'ERROR',
                        text: results.message,
                        type: 'error'
                    })
                }
            });
        }
    </script>
@endpush
