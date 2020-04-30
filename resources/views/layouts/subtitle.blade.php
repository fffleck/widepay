@if(session('title'))
<div class="row col-12 col-lg-12 col-md-12 col-sm-12 vd_title-section clearfix">
    {{--<div class="col-12 col-lg-3 col-md-4 col-sm-6">--}}
        {{--<h1>{{ session('title') }}</h1>--}}
        {{--@if(session('sub-title'))--}}
            {{--<small class="subtitle">{{ session('sub-title') }}</small>--}}
        {{--@endif--}}
    {{--</div>--}}
    <!-- MESSAGE INFORMATION -->
    <div class="alert alert-warning alert-dismissable alert-condensed col-12 col-lg-9 col-md-8 col-sm-6">
        {{--<a target="_blank" href="https://awscapitalgroup.zendesk.com/hc/en-gb/articles/360031117671-How-do-I-know-the-monthly-hosting-cost-How-do-I-pay-How-it-is-calculated-When-is-the-due-date-">--}}
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
            <i class="fa fa-exclamation-triangle append-icon"></i>
            For more information about our hosting services and mining equipment please send email to support@awscapitalgroup.com.
        {{--</a>--}}
    </div>
</div>

@endif
