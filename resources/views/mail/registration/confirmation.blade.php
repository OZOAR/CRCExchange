<div>
    @lang('mail.welcome', ['username' => $user->getName()])
    <br/>
    <br/>
    @lang('mail.body', ['projectName' => $projectName])
    <br/>
    <a href="{{ $registrationLink }}" target="_blank">{{ $registrationLink }}</a>
    <br/>
    <br/>
    <hr/>
    @lang('mail.information')<br/>
    @lang('mail.contacts',
          ['supportEmail' => $supportEmail, 'telegram' => $telegram, 'twitter' => $twitter, 'website' => $website])
    <br/>
</div>