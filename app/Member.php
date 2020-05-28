<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Member extends Authenticatable
{
    use HasApiTokens;

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'phone',
    ];

    public function links(){
       return  $this->hasMany(Link::class)->withoutGlobalScope('ValidUser');

    }
    public function alllinks(){
        return  $this->hasMany(Link::class)->withoutGlobalScopes();

    }
}
