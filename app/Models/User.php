<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'face', 'password', 'active', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     */
    public static function lists($searchForm)
    {
        $whereParams = [];
        $query       = User::where($whereParams);
        if (issetAndNotEmpty($searchForm['status'])) {
            $query->where('status', $searchForm['status']);
        }
        if (issetAndNotEmpty($searchForm['username'])) {
            $query->where('username', 'like', '%' . $searchForm['username'] . '%');
        }
        if (issetAndNotEmpty($searchForm['email'])) {
            $query->where('email', 'like', '%' . $searchForm['email'] . '%');
        }
        return $query->paginate(config('app.pageSize'));
    }
}
