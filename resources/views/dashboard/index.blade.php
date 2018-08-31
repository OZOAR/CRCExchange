@extends('layouts.authorized', ['pageTitle' => __('dashboard.title')])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('dashboard.labels.partners.title')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        @if(count($partners))
                            @include('dashboard.partners.list')
                        @else
                            @lang('dashboard.messages.partners.empty_collection')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $partners->links() }}
        </div>
    </div>
@endsection
