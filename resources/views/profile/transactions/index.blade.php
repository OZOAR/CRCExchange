@extends('layouts.authorized', ['pageTitle' => __('profile.labels.transactions.title')])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('profile.labels.transactions.title')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        @if(count($transactions))
                            @include('profile.transactions.list')
                        @else
                            @lang('profile.messages.transactions.empty_collection')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $transactions->links() }}
        </div>
    </div>
@endsection
