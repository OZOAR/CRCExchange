<table class="table table-striped no-margin">
    <thead>
    <tr>
        <th>#</th>
        <th>@lang('dashboard.labels.requests.model.user')</th>
        <th>@lang('dashboard.labels.requests.model.total')</th>
        <th>@lang('dashboard.labels.requests.model.status')</th>
        <th>@lang('dashboard.labels.requests.model.created_at')</th>
        <th>@lang('dashboard.labels.requests.actions')</th>
    </tr>
    </thead>
    <tbody>

    @foreach($requests as $request)
        <tr>
            <td>{{ $request->getId() }}</td>
            <td><a href="#">{{ $request->user->getName() }}</a></td>
            <td>{{ $request->getTotal() }}</td>
            <td>{{ $request->getStatus() }}</td> {{--TODO refactor to localized--}}
            <td>{{ $request->getCreatedDate() }}</td>
            <td>....</td> {{--TODO implement--}}
        </tr>
    @endforeach
    </tbody>
</table>
