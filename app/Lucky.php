<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lucky extends Model
{
    protected $fillable = [
        'number','win', 'sum_win'
    ];
    public function link(){
        return $this->belongsTo(Lucky::class);
    }
}
