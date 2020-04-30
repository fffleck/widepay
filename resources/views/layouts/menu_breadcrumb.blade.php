@php
    $current = Route::current();
    $uri_full = $current->uri;
    $uri_arr = explode("/", $uri_full);
@endphp

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                @foreach($uri_arr as $i)
                    @if($i != 'home')
                        @if(strpos($i, '{') === false)
                        <li class="breadcrumb-item active" aria-current="page">{{ $i }}</li>
                        @endif
                    @endif
                @endforeach
            </ol>
        </nav>


        {{-- <ul class="breadcrumb">
            <li><a>Home</a> </li>
            @foreach($uri_arr as $i)
                @if($i != 'home')
                    @if(strpos($i, '{') === false)
                        <li><a>{{ $i }}</a></li>
                    @endif
                @endif
            @endforeach
        </ul> --}}
    </div>
</div>
