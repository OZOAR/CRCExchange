<?php

namespace App\Events;

use App\Models\RegistrationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered as RegisteredEvent;

class Registered extends RegisteredEvent
{
    /**
     * @var RegistrationRequest registration token
     */
    protected $request;

    /**
     * Registered constructor.
     *
     * @param User                $user
     * @param RegistrationRequest $request
     */
    public function __construct(User $user, $request) {
        parent::__construct($user);
        $this->request = $request;
    }

    /**
     * Get user of the event.
     *
     * @return \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get registration request.
     *
     * @return RegistrationRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set request of the registration.
     *
     * @param RegistrationRequest $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }
}
