<table class="table table-striped no-margin">
    <thead>
    <tr>
        <th>#</th>
        <th>@lang('profile.labels.requests.model.total')</th>
        <th>@lang('profile.labels.requests.model.status')</th>
        <th>@lang('profile.labels.requests.model.created_at')</th>
    </tr>
    </thead>
    <tbody>

    @foreach($requests as $request)
        <tr>
            <td>{{ $request->getId() }}</td>
            <td>{{ $request->getTotal() }}</td>
            <td>{{ $request->getStatus() }}</td> {{--TODO refactor to localized--}}
            <td>{{ $request->getCreatedDate() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
