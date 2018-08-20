<?php

namespace App\Models;

use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property int
 *               $id
 * @property string
 *               $name
 * @property string
 *               $email
 * @property string
 *               $password
 * @property string|null
 *               $remember_token
 * @property \Carbon\Carbon|null
 *               $created_at
 * @property \Carbon\Carbon|null
 *               $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 *                $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $is_confirmed
 * @property int $role_id
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User partners()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User notConfirmed()
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'role_id', 'is_confirmed', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Set name for user.
     *
     * @param bool $name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Set name for user.
     *
     * @param bool $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set role id for user.
     *
     * @param bool $roleId
     */
    public function setRole($roleId)
    {
        $this->role_id = $roleId;
    }

    /**
     * Get user's policy.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Check if the user is confirmed.
     *
     * @return boolean
     */
    public function isConfirmed()
    {
        return $this->is_confirmed;
    }

    /**
     * Set user's confirmation flag.
     *
     * @param boolean|$val
     */
    public function setConfirmed($val)
    {
        $this->is_confirmed = $val;
    }

    /**
     * Get id of the user.
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get name of the user.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get email of the user.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get registration date of the user.
     *
     * @return mixed
     */
    public function getRegistrationDate()
    {
        return $this->created_at;
    }

    /**
     * Check if user has a role.
     *
     * @param string $role
     *
     * @return bool
     */
    public function hasRole($role = 'admin')
    {
        switch ($role) {
            case 'admin':
                return $this->isAdministrator();
            case 'partner':
                return $this->isPartner();
            default:
                return false;
        }
    }

    /**
     * Check if user is administrator.
     *
     * @return bool
     */
    public function isAdministrator(): bool
    {
        return $this->role_id === Role::ADMIN_ROLE_ID;
    }

    /**
     * Check if user is partner.
     *
     * @return bool
     */
    public function isPartner(): bool
    {
        return $this->role_id === Role::PARTNER_ROLE_ID;
    }

    /**
     * Retrieve only partners.
     *
     * @param QueryBuilder $query
     * @return mixed
     */
    public function scopePartners($query)
    {
        return $query->where('role_id', Role::PARTNER_ROLE_ID);
    }
}
