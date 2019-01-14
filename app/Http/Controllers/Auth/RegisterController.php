<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\TokenBroker;
use App\Models\RegistrationRequest;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $userData = $this->performUserData($request->all());
        $updateUserResult = $this->createOrUpdateUser($userData);

        if ($updateUserResult['success']) {
            return $this->doRegistration($userData, $updateUserResult);
        }

        if ($updateUserResult['reasons']['confirmed']) {
            if (($user = User::whereEmail($userData['email'])->first()) === null) {
                abort(401, 'Cannot find such user when try to authenticate.');
            }

            Auth::login($user);

            return redirect()->route('profile.index');
        }

        return redirect()->back()->withErrors(); // TODO
    }

    /**
     * Confirm register of the user.
     *
     * @param null $token
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function confirm($token = null)
    {
        if ($token !== null) {
            $request = RegistrationRequest::whereRequestToken($token)->first();

            if ($request !== null && $request->isValid()) {
                return $this->authenticate($request); // TODO move to LoginController
            }
        }

        abort(404);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Authenticate user in system.
     *
     * @param RegistrationRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \RuntimeException
     * @throws \Exception
     */
    protected function authenticate(RegistrationRequest $request)
    {
        $email = $request->getEmail();

        if (($user = User::whereEmail($email)->first()) === null) {
            abort(401, 'Cannot find such user');
        }

        $request->delete();

        $user->setConfirmed(true);
        $user->save();

        Auth::login($user);

        return redirect()->route('profile.index')
            ->with('success_confirmation', __('profile.messages.confirmation.success'));
    }

    private function performUserData($requestAttributes)
    {
        $data = array_merge($requestAttributes, ['role_id' => Role::PARTNER_ROLE_ID]);
        $data['password'] = bcrypt($data['password']);

        return $data;
    }

    private function createOrUpdateUser($userAttributes)
    {
        $user = User::partners()->whereEmail($userAttributes['email'])->first();

        if ($user === null) {
            $user = User::create($userAttributes);
        } else {
            if ($user->isConfirmed()) {
                \Log::warning('User is already confirmed', ['user' => $user]);
                $response['success'] = false;
                $response['reasons']['confirmed'] = true;

                return $response;
            }
        }

        $response['success'] = true;
        $response['user'] = $user;

        return $response;
    }

    private function doRegistration($userData, $updateUserResult)
    {
        $registrationData = [
            'email'         => $userData['email'],
            'request_token' => TokenBroker::make(),
        ];

        $registrationRequest = RegistrationRequest::create($registrationData);

        if ($registrationRequest !== null) {
            event(new Registered($updateUserResult['user'], $registrationRequest));

            \Log::info('User has been registered and RegistrationRequest was created.',
                ['request' => $registrationRequest]);

            return redirect('/'); // TODO redirect back with success message
        }

        \Log::error('Error when tried to create RegistrationRequest with data.', $registrationData);
        return redirect()->back()->withErrors(); // TODO
    }
}
