<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberLoginRequest;
use App\Member;
use Illuminate\Http\Request;
use Auth;
use DB;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('members.auth.login');
    }

    public function authenticate(MemberLoginRequest $request)
    {
        $credentials = $request->only('username', 'phone');
        $member = Member::where($credentials)->first();

        if ($member && Auth::guard('members')->loginUsingId($member->id)) {
            $link = $member->links()->first();

            return redirect()->route('lucky.link', ['link' => $link]);
        }

        return back()->withInput();
    }
}
