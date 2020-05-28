<?php

namespace App\Http\Controllers\Members\Api;

use App\Http\Controllers\Controller;
use App\{Http\Resources\LinkCollection, Http\Resources\LuckyCollection, Lucky, Member, Link};
use Illuminate\Http\Request;
use Auth;
use \App\Http\Resources\Lucky as LuckyResource;

class LinkController extends Controller
{
    protected $member;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $id = Auth::guard('members')->id();
        $this->member = Member::whereId($id)->with('alllinks')->first();
        return new LinkCollection($this->member->alllinks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::guard('members')->id();
        $this->member = Member::whereId($id)->first();
        $this->member->links()->save(new Link);

        return $this->index($request);
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
        $memberId = Auth::guard('members')->id();
        $this->member = Member::whereId($memberId)->first();
        $link = $this->member->alllinks()->find($id);
        $link->update($request->all());
        return $this->index($request);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function lucky(Link $link)
    {
        $lucky = new Lucky;
        $link->lucky()->save($lucky);
        return new LuckyResource($lucky);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function luckyHistory(Link $link)
    {
        $luckyList = $link->lucky_history;
        return new LuckyCollection($luckyList);
    }
}
