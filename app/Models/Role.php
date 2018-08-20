<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereTitle($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    public $table = 'roles';

    const ADMIN_ROLE_ID = 1;
    const PARTNER_ROLE_ID = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'title'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the role's user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get slug of the role.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get title of the role.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
