<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') - Sistema Grupo Meridien</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="shortcut icon" href="{{ asset('vendor/meridienclube/laravel-meridien/media/logos/favicon.png') }}"/>
    <link href="{{ asset('vendor/meridienclube/laravel-meridien/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendor/meridienclube/laravel-meridien/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendor/meridienclube/laravel-meridien/vendors/jkanban-master/dist/jkanban.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/meridienclube/laravel-meridien/css/helpers/option_input.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendor/meridienclube/laravel-meridien/vendors/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendor/meridienclube/laravel-meridien/css/styles.css') }}" rel="stylesheet" type="text/css"/>

    @stack('styles')
</head>
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">
@include('meridien::partials.kt_header_mobile')
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @include('meridien::partials.kt_aside')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            @include('meridien::partials.kt_header')
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                @yield('content')
            </div>
            @include('meridien::partials.kt_footer')
        </div>
    </div>
</div>
@include('meridien::partials.kt_quick_panel')
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
@include('meridien::partials.kt_sticky_toolbar')
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#22b9ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<script src="{{ asset('vendor/meridienclube/laravel-meridien/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/meridienclube/laravel-meridien/js/scripts.bundle.js') }}" type="text/javascript"></script>

<script src="{{ asset('vendor/meridienclube/laravel-meridien/vendors/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/meridienclube/laravel-meridien/vendors/select2/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/meridienclube/laravel-meridien/vendors/jkanban-master/dist/jkanban.min.js') }}"></script>

<script src="{{ asset('vendor/meridienclube/laravel-meridien/vendors/jquery.mask/jquery.mask.min.js') }}"></script>
<script src="{{ asset('vendor/meridienclube/laravel-meridien/js/helpers/option_input.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/meridienclube/laravel-meridien/js/input-masks.js') }}" type="module"></script>
<script src="{{ asset('vendor/meridienclube/laravel-meridien/vendors/datatables/datatables.min.js') }}" type="text/javascript"></script>

<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js" type="text/javascript"></script>

<script>
    $.ajaxSetup({
        beforeSend: function (xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.kt-select2').select2();

    $(document).ready(function () {
        $('.date').mask('00/00/0000');

        var t;
        t = KTUtil.isRTL() ? {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        } : {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        };

        $('.kt_datepicker').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: !0,
            templates: t,
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });

        $('.kt_timepicker').timepicker({
            minuteStep: 1,
            defaultTime: '',
            showSeconds: false,
            showMeridian: false,
            snapToStep: true,
            pick12HourFormat: true
        });

    });
</script>

@stack('scripts')

</body>
</html>
