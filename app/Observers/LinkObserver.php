<?php

namespace App\Observers;
use App\Link;
class LinkObserver
{
    //
    public function creating(Link $link){
        $link->url = md5(uniqid());
        $link->valid = 1;
        $link->valid_to = now()->addDays('7');
    }
}
