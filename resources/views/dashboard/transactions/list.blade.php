<table class="table table-striped no-margin">
    <thead>
    <tr>
        <th>#</th>
        <th>@lang('dashboard.labels.transactions.model.owner')</th>
        <th>@lang('dashboard.labels.transactions.model.referer')</th>
        <th>@lang('dashboard.labels.transactions.model.btc_address')</th>
        <th>@lang('dashboard.labels.transactions.model.total')</th>
        <th>@lang('dashboard.labels.transactions.model.date')</th>
    </tr>
    </thead>
    <tbody>

    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->getId() }}</td>
            <td><a href="#">{{ $transaction->owner->getName() }}</a></td>
            <td><a href="#">{{ $transaction->referer->getName() }}</a></td>
            <td>{{ $transaction->getBtcAddress() }}</td>
            <td>{{ $transaction->getTotal() }}</td>
            <td>{{ $transaction->getDate() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
