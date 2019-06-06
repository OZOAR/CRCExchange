<table class="table table-striped no-margin">
    <thead>
    <tr>
        <th>#</th>
        <th>@lang('profile.labels.transactions.model.referer')</th>
        <th>@lang('profile.labels.transactions.model.btc_address')</th>
        <th>@lang('profile.labels.transactions.model.total')</th>
        <th>@lang('profile.labels.transactions.model.date')</th>
        <th>TransactionID</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>

    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->getId() }}</td>
            <td>{{ $transaction->referer->getReferralLink() }}</td>
            {{--<td></td>--}}
            <td>{{ $transaction->getBtcAddress() }}</td>
            <td>{{ $transaction->getTotal() }}</td>
            <td>{{ $transaction->getDate() }}</td>
            <td>{{$transaction->transaction_id}}</td>
            <td>{{($transaction->status == 1) ? '' : 'Оплачено'}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
