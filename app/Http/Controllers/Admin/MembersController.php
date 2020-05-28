<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberCreateRequest;
use App\Http\Requests\MemberRegisterRequest;
use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Member::paginate();

        return view('admin.members.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberCreateRequest $request)
    {
        //
        $member = new Member($request->all());
        $member->save();
        return redirect()->route('members.index')->withSucces('Created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $member = Member::with('links')->find($id);
        return view('admin.members.show')->with(['member'=>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Member::find($id);

        return view('admin.members.edit')->with(['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (Member::find($id)->update($request->only('username', 'phone'))) {
            return redirect()->route('members.index')->withSuccess('Updated');
        }
        return back()->withInput()->withErrors();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($member = Member::find($id)) {
            $member->delete();
        }
        return redirect()->route('members.index')->withSucces('Deleted');
    }
}
