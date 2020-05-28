<?php

namespace App\Observers;

use App\Link;
use App\Member;

class MembersObserver
{
    //
    public function created(Member $member){
        $link = new Link();
        $member->links()->save($link);
    }
}
