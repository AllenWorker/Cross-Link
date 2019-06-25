<?php

namespace App\Http\Controllers;

use App\profile;
use App\SocialLink;
use Illuminate\Http\Request;
use Auth;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        //  dd($user->id);
        $profile = Profile::FindOrFail($user->id);
        return view('social.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'link_name' => ['required'],
            'url' => ['required'],
        ]);
//        dd($request);
        $user = Auth::user();
        $profile = Profile::FindOrFail($user->id);

        SocialLink::create([
            'link_name' => $request->input('link_name'),
            'url' => $request->input('url'),
            'profile_id' => $profile->id,
        ]);

        return redirect('/social');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $socialLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLink $socialLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($socialLink);
//        $socialLink->delete();
        $socialLink = SocialLink::FindOrFail($id);
        $socialLink->delete();
        return redirect('/social');
    }
}
