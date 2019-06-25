<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Http\Request;
use Auth;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'max:255'],
            'link' => ['required', 'max:512'],
            'description' => ['required','max:128'],
        ]);
        $request->has('public')?$isPublic=true:$isPublic=false;
        $bookmark = Bookmark::Create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'public' => $isPublic,
        ]);

        $tags = explode(',', $request->input('tag'));
        $bookmark->retag($tags);
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        abort_if($bookmark->user_id !== auth()->id(), 403);
        return view('bookmark.edit',  compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'link' => ['required', 'max:512'],
            'description' => ['required', 'max:128'],
        ]);
        $request->has('public')?$isPublic=true:$isPublic=false;
        $bookmark ->update([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'public' => $isPublic,
        ]);

        $tags = explode(',', $request->input('tag'));
        $bookmark->retag($tags);
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->detag();
        $bookmark->delete();
        return redirect('/profile');
    }
}
