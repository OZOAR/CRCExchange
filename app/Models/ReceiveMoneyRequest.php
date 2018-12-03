<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiveMoneyRequest extends Model
{
    /**
     * Status of the request.
     */
    const STATUS = ['new', 'review', 'done', 'declined'];

    /**
     * The attributes that are mass assignable.
     * Total - in BTC
     * Status can be only: 'new', 'review', 'done' or 'declined'
     *
     * @var array
     */
    protected $fillable = ['user_id', 'total', 'status'];

    /**
     * Get id of the request.
     *
     * @return double
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get total of the request to get received.
     *
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set total in BTC for the request.
     *
     * @param double $total | BTC
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * Get status of the request.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status of the request.
     *
     * @param string $status
     */
    public function setStatus($status = 'new')
    {
        $this->status = $status;
    }

    /**
     * Get created datetime of the request.
     *
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->created_at;
    }

    /**
     * Get request user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
