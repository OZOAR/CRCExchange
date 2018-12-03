@extends('layouts.authorized', ['pageTitle' => __('profile.title')])

@section('content')
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>@lang('profile.title')</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view"
                                         src="/images/default-user-image.jpg" alt="Avatar">
                                </div>
                            </div>
                            <h3>{{ Auth::user()->getName() }}</h3>

                            <ul class="list-unstyled user_data">
                                <li>
                                    <i class="fa fa-envelope-o user-profile-icon"></i> {{ Auth::user()->getEmail() }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab"
                                           aria-expanded="true">
                                            @lang('profile.tabs.settings.title')
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab_content2" id="request-receive-money-tab" role="tab"
                                           data-toggle="tab" aria-expanded="false">
                                            @lang('profile.tabs.receive_money_request.title')
                                        </a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                         aria-labelledby="home-tab">
                                        @include('partials.profile.btc_address_reset')
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab_content2"
                                         aria-labelledby="request-receive-money-tab">
                                        @include('partials.profile.receive_money_request')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection