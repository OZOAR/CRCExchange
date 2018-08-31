<table class="table table-striped no-margin">
    <thead>
    <tr>
        <th>#</th>
        <th>@lang('dashboard.labels.partners.model.name')</th>
        <th>@lang('dashboard.labels.partners.model.email')</th>
        <th>@lang('dashboard.labels.partners.model.percentage')</th>
        <th>@lang('dashboard.labels.partners.model.btc_address')</th>
        <th>@lang('dashboard.labels.partners.model.referral')</th>
    </tr>
    </thead>
    <tbody>

    @foreach($partners as $partner)
        <tr>
            <td>{{ $partner->getId() }}</td>
            <td><a href="#">{{ $partner->getName() }}</a></td>
            <td><a href="mailto:{{ $partner->getEmail() }}">{{ $partner->getEmail() }}</a></td>
            <td>{{ round($partner->getPercentage(), 2) }}%</td>
            <td>{{ $partner->getBtc() }}</td>
            <td>
                <a href="{{ config('app.url') . '?ref=' . $partner->getId() }}" target="_blank">
                    {{ config('app.url') . '?ref=' . $partner->getId() }}
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
