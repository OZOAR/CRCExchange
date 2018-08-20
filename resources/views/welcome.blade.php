@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Widget</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <img src="/images/image.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">CRCExchange <b>BUY & SELL</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Amount to deposit:</p>
                                            <div class="input-group">
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">EUR</span>
                                            </div>
                                            <p style="margin-bottom: 0">Min 10 EUR</p>
                                            <p>Max 10000 EUR</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Amount you will receive:</p>
                                            <div class="input-group">
                                                <input type="text" class="form-control">
                                                <span class="input-group-addon">BTC</span>
                                            </div>
                                            <p style="margin-bottom: 0">This is final amount</p>
                                            <p>that already includes 7% comission</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="btc-address">Address</label>
                                            <input type="text" id="btc-address" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-8">
                                            Fee:
                                        </div>
                                        <div class="col-md-4" style="text-align: right">
                                            10%
                                        </div>
                                        <div class="col-md-8">
                                            Total:
                                        </div>
                                        <div class="col-md-4" style="text-align: right">
                                            200 EUR
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center">
                                            <a href="/" class="btn btn-primary">Continue</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron" style="text-align: center; background-color: transparent;">
            <h1>HOW TO START</h1>
            <br>
            <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus
                commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
            <br>
        </div>

        <div class="jumbotron"
             style="text-align: center; background-color: white; overflow: hidden; padding-left: 30px; padding-right: 30px;">
            <h1>ABOUT US</h1>
            <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus
                commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
            <br>
        </div>

        <div class="jumbotron"
             style="text-align: center; background-color: transparent; overflow: hidden; padding-left: 0; padding-right: 0;">
            <div class="col-md-12">
                <h1 style="text-align: center; text-transform: uppercase">Our partners</h1>
            </div>
            <div class="col-md-12">
                <br>
                <br>
                <ul style="list-style: none; text-align: center;padding-left: 0">
                    <li style="display: inline-table">
                        <img style="width: 50%"
                             src="https://orig00.deviantart.net/60fe/f/2011/265/b/3/lsi_logo_icon_256_png_by_mahesh69a-d4an1lt.png"
                             alt=""></li>
                    <li style="display: inline-table">
                        <img style="width: 50%"
                             src="https://orig00.deviantart.net/60fe/f/2011/265/b/3/lsi_logo_icon_256_png_by_mahesh69a-d4an1lt.png"
                             alt=""></li>
                    <li style="display: inline-table">
                        <img style="width: 50%"
                             src="https://orig00.deviantart.net/60fe/f/2011/265/b/3/lsi_logo_icon_256_png_by_mahesh69a-d4an1lt.png"
                             alt=""></li>
                    <li style="display: inline-table">
                        <img style="width: 50%"
                             src="https://orig00.deviantart.net/60fe/f/2011/265/b/3/lsi_logo_icon_256_png_by_mahesh69a-d4an1lt.png"
                             alt=""></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

{{-- <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('profile.index') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel | <strong>{{ Session::get('locale') }}</strong>
            @include('partials.locale')
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Documentation</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
</div>
</body>
</html>
--}}
