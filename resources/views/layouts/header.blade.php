<!doctype html>
<html lang="en">
<!--Contact Me
  Name: Tô Nguyên
  Facebook:https://www.facebook.com/tbn198
  Phone:01659444980
  Group: S-Developers.com
  -->
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/img/apple-icon.png') }}"/>
    <link rel="icon" type="image/png" href="{{ url('assets/img/favicon.png') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Abishoes</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png" rel="icon" type="image/png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap3-typeahead.min.js') }}"></script>

</head>
<body>
@include('layouts.sidebar')
<div class="main-content">
    <!-- Top navbar -->
@include('layouts.navbar')
<!-- Header -->

    <!-- Page content -->
@yield('content')
<!-- Footer -->

    <footer class="footer" style="padding: 20px">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; 2018 <a href="" class="font-weight-bold ml-1" target="_blank">S-Developers</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://abishoes.com/" class="nav-link" target="_blank">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>

    </footer>

</div>
</body>

<script type="text/javascript">
    function checkForm(form) {
        form.myButton.disabled = true;
        form.myButton.value = "Đợi tí";
        return true;
    }
</script>
<script type="text/javascript">
    $(function () {
        $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('Y/MM/DD H:mm:s') + ' - ' + picker.endDate.format('Y/MM/DD H:mm:s'));
        });

        $('input[name="datefilter"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });
</script>
<!--numbertext -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var $demoValue = $('#getvalue'),
            $demoResult = $('#setresult');
        $demoValue.bind('keydown keyup keypress focus blur paste change', function () {
            var result = accounting.formatMoney(
                $demoValue.val(),
                'đ ',
                0
            );
            $demoResult.text(result);
        });
    });
</script>
<!-- Argon Scripts -->

<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('assets/js/argon.js?v=1.0.0') }}"></script>
<script src="{{ asset('js/accounting.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/daterangepicker.css') }}"/>
<script type="text/javascript" src="{{ asset('source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('source/jquery.fancybox.css?v=2.1.5') }}" media="screen"/>
<script type="text/javascript">
    $(document).ready(function () {
        $(".fancybox").fancybox({
            type: 'iframe',
            'width': 1300
        });
    });

</script>
<script type="text/javascript">
    $(function () {
        $('input[name="datefilter"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'Y/MM/DD H:mm:s',
                applyLabel: "Áp dụng",
                cancelLabel: 'Xóa',"daysOfWeek": [
                    "CN",
                    "Hai",
                    "Ba",
                    "Bốn",
                    "Năm",
                    "Sáu",
                    "Bảy"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12"
                ],
            }
        });
        $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('Y/MM/DD H:mm:s') + ' - ' + picker.endDate.format('Y/MM/DD H:mm:s'));
        });

        $('input[name="datefilter"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });
</script>
<script src='{{ asset('js/bootstrapvalidator.min.js') }}'></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122322089-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-122322089-1');
</script>

</html>