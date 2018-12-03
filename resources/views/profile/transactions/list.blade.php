<table class="table table-striped no-margin">
    <thead>
    <tr>
        <th>#</th>
        <th>@lang('profile.labels.transactions.model.referer')</th>
        <th>@lang('profile.labels.transactions.model.btc_address')</th>
        <th>@lang('profile.labels.transactions.model.total')</th>
        <th>@lang('profile.labels.transactions.model.date')</th>
    </tr>
    </thead>
    <tbody>

    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->getId() }}</td>
            <td>{{ $transaction->referer->getReferralLink() }}</td>
            <td>{{ $transaction->getBtcAddress() }}</td>
            <td>{{ $transaction->getTotal() }}</td>
            <td>{{ $transaction->getDate() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
