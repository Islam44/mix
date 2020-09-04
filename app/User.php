<?php

namespace App;

use App\Http\Controllers\QueryFilter;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adjustments(){
        return $this->belongsToMany(Document::class,'adjustments')
            ->withTimestamps()
            ->withPivot('identifier')
            ->latest('pivot_updated_at');
    }

    public function scopeFilter($query,QueryFilter $filters){
        $filters->apply($query);
    }
}
