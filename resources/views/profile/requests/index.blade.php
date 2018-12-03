@extends('layouts.authorized', ['pageTitle' => __('profile.labels.requests.title')])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('profile.index') }}" class="btn btn-primary">
                @lang('common.buttons.request')
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('profile.labels.requests.title')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        @if(count($requests))
                            @include('profile.requests.list')
                        @else
                            @lang('profile.messages.requests.empty_collection')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $requests->links() }}
        </div>
    </div>
@endsection
