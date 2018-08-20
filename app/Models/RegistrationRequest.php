<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RegistrationRequest
 *
 * @property int $id
 * @property string $email
 * @property string $request_token
 * @property \Carbon\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RegistrationRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RegistrationRequest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RegistrationRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RegistrationRequest whereRequestToken($value)
 * @mixin \Eloquent
 */
class RegistrationRequest extends Model
{
    public $table = 'registration_requests';

    /**
     * Default expire time in minutes.
     */
    const DEFAULT_LIFETIME = 15;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'request_token', 'created_at'];

    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at'];

    /**
     * Get request id.
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get email of the owner.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set request email.
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get request token.
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->request_token;
    }

    /**
     * Set request token.
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->request_token = $token;
    }

    /**
     * Get request creation date.
     *
     * @return Carbon
     */
    public function getCreatedDate()
    {
        return $this->created_at;
    }

    /**
     * Set creation date of the request.
     *
     * @param Carbon $date
     */
    public function setCreatedDate($date)
    {
        $this->created_at = $date;
    }

    /**
     * Check if request is valid to register user in system.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        $expireTime = config('app.request_expire_time');
        $expireDate = Carbon::parse($this->getCreatedDate())->addMinutes($expireTime);

        return Carbon::now()->lt($expireDate);
    }
}
