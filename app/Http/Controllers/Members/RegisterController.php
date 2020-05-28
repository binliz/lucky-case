<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRegisterRequest;
use App\Link;
use Auth;
use App\Member;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('members.auth.register');
    }

    public function register(MemberRegisterRequest $request){
        $member = new Member($request->only('username', 'phone'));
        $member->remember_token = \Str::random(60);
        $member->save();
        $link = new Link;
        $member->links()->save($link);
        $token = $member->createToken('member-api-token');
        Auth::guard('members')->loginUsingId($member->id);
        return redirect()->route('lucky.link',$link);
    }
    public function logout(){
        $this->middleware('auth:members');

    }
}
