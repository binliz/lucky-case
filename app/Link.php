<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Auth;

class Link extends Model
{
    protected $fillable = [
        'valid',
    ];

    protected $casts = [
        'valid' => 'boolean',
    ];

    public function lucky()
    {
        return $this->hasMany(Lucky::class);
    }
    public function lucky_history()
    {
        return $this->lucky()->orderBy('id','desc')->limit(3);
    }
    public function getGlobalValidAttribute()
    {
        if ($this->valid === true && $this->valid_to >= now()) {
            return true;
        }

        return false;
    }
    public function getLuckyLinkAttribute(){
        return Route('lucky.link', $this->url);
    }
    public function getCanChangeAttribute(){
        return $this->valid_to >= now();
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('ValidUser', function (Builder $builder) {
            $builder->where('member_id', '=', \Auth::id());
        });

        static::addGlobalScope('Valid', function (Builder $builder) {
            $builder->where('valid', 1)->where('valid_to', '>=', now());
        });
    }
}
