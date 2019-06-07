<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/images/favicon.png"/>
    <title>{{ $pageTitle }}</title>

    <link href="{{ asset('css/dashboard/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/custom.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src=/js/portfolioChart.js></script>
    <script src=/js/tokenChart.js></script>
</head>

<body class="nav-md">
<div id="app">
    <div class="container body">
        <div class="main_container">
            @include('partials.dashboard.head')
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    @if(Auth::user()->isAdministrator())
                        @include('partials.dashboard.sidebar')
                    @else
                        @include('partials.profile.sidebar')
                    @endif
                </div>
            </div>
            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->
        </div>
    </div>
</div>

@include('partials.authorized_footer')

<script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
<script src="{{ asset('js/dashboard/custom.min.js') }}"></script>
</body>
</html>
