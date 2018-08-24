<?php

return [
    'from'                      => 'Поддержка CRCExchange',
    'salutation'                => 'С уважением',
    'salutation_bottom'         => 'Спасибо за вашу поддержку!',

    /**
     * Reset password mail messages.
     */
    'reset_password'            => [
        'subject' => 'Восстановление пароля',
        'welcome' => 'Здравствуйте,',

        'body'   => 'Пожалуйта, нажмите кнопку ниже для восстановления пароля:',
        'button' => 'Восстановить пароль',

        'subcopy' => 'Если у Вас возникли проблемы с нажатием на кнопку ":actionText", скопируйте и вставьте указанную'
            . ' ниже ссылку в адресную строку браузера:',
    ],

    /**
     * Registration confirmation mail messages.
     */
    'registration_confirmation' => [
        'subject' => 'Подтверждение регистрации',
        'welcome' => 'Приветствую, :username,',

        'body'   => 'Благодарим за присоединение к :projectName. Пожалуйста, подтвердите свою почту по ссылке ниже:',
        'button' => 'Подтвердить регистрацию',

        'subcopy' => 'Если у Вас возникли проблемы с нажатием на кнопку ":actionText", скопируйте и вставьте указанную'
            . ' ниже ссылку в адресную строку браузера:',

        'contacts' => 'Если вы не являетесь получателем этого письма, пожалуйста, сообщите об этом на :supportEmail<br/><br/>'
            . '<b>Контактные данные:</b><br/>'
            . '<b>Email:</b> :supportEmail<br/>'
            . '<b>Telegram:</b> :telegram<br/>'
            . '<b>Twitter:</b> :twitter<br/>'
            . ':website<br/>',
    ],
];
