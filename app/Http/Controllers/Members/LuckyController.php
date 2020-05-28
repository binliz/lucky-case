<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Link;
use App\Member;
use Illuminate\Http\Request;
use Auth;

class LuckyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:members');
    }

    //
    public function index(){

        $member = Member::find(Auth::id());
    }
    public function link(Link $link){
        return view('lucky.index',compact('link'));
    }
}
