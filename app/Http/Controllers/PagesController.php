<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\Comment;


class PagesController extends Controller
{
    public $mytime;

    public function __construct(Request $request)
    {
        $this->middleware('auth')->except('index', '_1x2', 'over', 'btts', 'contactus', 'storeComment', 'storeReply');

        $this->mytime = date('Y-m-d', strtotime($request->date));
    }



    public function index (){
        /* This method is going to call the _1x2() and btts() and over() 
        to display the top 3 predictions for each page*/

        /**The if statement is helping to set the time if the submit btn has not been clicked.
         * But if the submit btn has been clicked it will use the selected date on the calendar.
         */

        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            $this->mytime = date('Y-m-d');    
        }
        
        $posts = post::where('created_at', $this->mytime)->where('top', 'Top')->orderBy('matchTime', 'asc')->get();
        $comments = Comment::whereDate('created_at', $this->mytime)->where('pageName', 'home')->get();

        return view('pages.home')->with('posts', $posts)->with('mytime', $this->mytime)->with('comments', $comments);
    }

    public function rollover (){
        /*This page will display the safest tip for the day. */
        
        /**The if statement is helping to set the time if the submit btn has not been clicked.
         * But if the submit btn has been clicked it will use the selected date on the calendar.
         */
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            $this->mytime = date('Y-m-d');    
        }

        $posts = post::where('created_at', $this->mytime)->where('top', 'Top')->where(function($query){$query->where('tip','=','1 DNB')->orWhere('tip','=','Under 2.5');})->orderBy('matchTime', 'asc')->get();
        $comments = Comment::whereDate('created_at', $this->mytime)->where('pageName', 'rollover')->get();

        return view ('pages.rollover')->with('posts', $posts)->with('mytime', $this->mytime)->with('comments', $comments);
    }

    public function _1x2 (){
        /*This method will query the database to get home (1) or the 1 DNB 
        predictions for that day. */

        /**The if statement is helping to set the time if the submit btn has not been clicked.
         * But if the submit btn has been clicked it will use the selected date on the calendar.
         */

        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            $this->mytime = date('Y-m-d');    
        }

        $posts = post::where('created_at', $this->mytime)->where('tip', '1')->orderBy('matchTime', 'asc')->get();
        $comments = Comment::whereDate('created_at', $this->mytime)->where('pageName', '1x2')->get();

        return view ('pages.1x2')->with('posts', $posts)->with('mytime', $this->mytime)->with('comments', $comments);
    }

    public function over (){
        /*This method will query the database to get over predictions
         for that day */
        
        /**The if statement is helping to set the time if the submit btn has not been clicked.
         * But if the submit btn has been clicked it will use the selected date on the calendar.
         */

        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            $this->mytime = date('Y-m-d');    
        }

        $posts = post::where('created_at', $this->mytime)->where(function($query){$query->where('tip','=','Over 2.5')->orWhere('tip','=','Under 2.5');})->orderBy('matchTime', 'asc')->get();
        $comments = Comment::whereDate('created_at', $this->mytime)->where('pageName', 'over')->get();

        return view ('pages.over')->with('posts', $posts)->with('mytime', $this->mytime)->with('comments', $comments);
    }

    public function btts (){
        /**This method will query the database to get the 
         both team to score predictions for that day. */
        
        /**The if statement is helping to set the time if the submit btn has not been clicked.
         * But if the submit btn has been clicked it will use the selected date on the calendar.
         */

        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            $this->mytime = date('Y-m-d');    
        }

        $posts = post::where('created_at', $this->mytime)->where(function($query){$query->where('tip','=','No GG')->orWhere('tip','=','GG');})->orderBy('matchTime', 'asc')->get();
        $comments = Comment::whereDate('created_at', $this->mytime)->where('pageName', 'btts')->get();

        return view ('pages.btts')->with('posts', $posts)->with('mytime', $this->mytime)->with('comments', $comments);
    }

    public function contactus (){
        /**This method has nothing to do with the database but just display what is in the view. */
        return view('pages.contactus');
    }

    public function userComments(){
        $comments = Comment::where('userName', auth()->user()->name)->orderBy('created_at', 'desc')->get();

        return view('/home')->with('comments', $comments);
    }




    /**FROM HERE IS WHERE I WANT TO PUT THE METHODS THAT THE METHOD FORM WILL BE WORKING WITH */

    public function commentIndex(){
        /**This is the method that will show me the comments made in my dashboard. */
        //$this->middleware('auth'); Remember to add this function to middleware in the constructor

        if (!(auth()->user()->id==1))
        {
            return redirect('/')->with('error', 'You do not have permission to view this page.');
        }


        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('comments')->with('comments', $comments);
    }


    public function storeComment (Request $request){

        $this->validate($request, [
            'comment' => 'required'
        ]);

        if (!isset(auth()->user()->name))
        {
            return redirect('/')->with('error', 'Please Login or Register to comment.');
        }


        $comment = new Comment();

        $comment->body = $request->input('comment');
        $comment->userName = auth()->user()->name;
        $comment->pageName = $request->pageName;

        $comment->save();

        if ($request->pageName == "home"){
            return redirect("/")->with('success', 'Comment successfully created');    
        }

        return redirect("/$request->pageName")->with('success', 'Comment successfully created');
    }

    public function storeReply (Request $request){

        $this->validate($request, [
            'reply' => 'required'
        ]);

        if (!isset(auth()->user()->name))
        {
            return redirect('/')->with('error', 'Please Login or Register to reply to a comment.');
        }


        $reply = new Comment();

        $reply->body = $request->input('reply');
        $reply->userName = auth()->user()->name;
        $reply->pageName = $request->pageName;
        $reply->parentId = $request->parentId;

        $reply->save();

        if ($request->pageName == "home"){
            return redirect("/")->with('success', 'Reply successfully posted.');
        }
        
        return redirect("/$request->pageName")->with('success', 'Reply successfully posted.');
    }

}
