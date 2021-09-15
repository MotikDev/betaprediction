<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\post;
use App\User;

class PostsController extends Controller
{




    public function __construct()
    {
        /** If the user is not me, it should redirect the user to his/her home page. */

        $this->middleware('auth');

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!(auth()->user()->id==1))
        {
            return redirect('home')->with('error', 'You do not have permission to view this page.');
        }
        $posts = post::orderBy('created_at', 'desc')->get();
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(auth()->user()->id==1))
        {
            return redirect('home')->with('error', 'You do not have permission to view this page.');
        }

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'matchTime' => 'required',
            'country' => 'required',
            'league' => 'required',
            'teams' => 'required',
            'tip' => 'required',
            'result' => 'required', 
            'top' => 'required'
        ]);

        $post = new post();
        $post->matchTime = $request->matchTime;
        $post->country = $request->country;
        $post->league = $request->league;
        $post->teams = $request->teams;
        $post->tip = $request->tip;
        $post->result = $request->result;
        $post->top = $request->top;

        $post->save();

        return redirect('/post/create')->with('success', 'Post Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!(auth()->user()->id==1))
        {
            return redirect('home')->with('error', 'You do not have permission to view this page.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!(auth()->user()->id==1))
        {
            return redirect('home')->with('error', 'You do not have permission to view this page.');
        }
        //Only edit post before the day of the game and never on the day or after the day of the match.
        $post = post::find($id);
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //This method will process the form submited by the edit method.
        $this->validate($request, [
            'matchTime' => 'required',
            'country' => 'required',
            'league' => 'required',
            'teams' => 'required',
            'tip' => 'required',
            'result' => 'required',
            'top' => 'required',
        ]);

        $post = post::find($id);
        $post->matchTime = $request->matchTime;
        $post->country = $request->country;
        $post->league = $request->league;
        $post->teams = $request->teams;
        $post->tip = $request->tip;
        $post->result = $request->result;
        $post->top = $request->top;

        $post->save();

         return redirect('/post')->with('success', 'Post successfully edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Only use this method before the day of the match.
        $post = post::find($id);
        $post->delete();

        return redirect('/post')->with('success', 'Post successfully deleted');
    }
}
