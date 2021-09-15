    @extends ('layout.app')


    @section ('jumbotron')
    <div class="row">
      <div class="col-xs-12">
        <div class="jumbotron text-center">
          <h1>MY IMAGE GOES HERE</h1>
        </div>
      </div>
    </div>
    @endsection

    @section ('content')

    <div style="text-align: center">
      @if ($mytime == "1970-01-01")
        <div class="hidden-xs hidden-sm hidden-md hidden-lg">
            {{ $mytime  =  date('Y-m-d') }}    
        </div>    
      @endif
      
      <form action="{{ action('PagesController@index') }}" method="POST" role="form">

          <input type="hidden" name="_method" value="GET">

          <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="date" class="date" name="date" value="{{ $mytime }}">
            <input type="submit"  class="btn btn-info btn-sm" value="Search">
        </div>
      </form>

    </div>

      <h3 class="text-center text-primary"><strong>Top Predictions for Today</strong></h3>  

      <table class="table">
          <thead>
              <tr >
                  <th>Match Time</th>
                  <th>Country</th>
                  <th>League</th>
                  <th class="text-center">Teams</th>
                  <th>Tips</th>
                  <th>Result</th>
              </tr>
          </thead>

          <tbody>
              @if (count($posts)>0)

                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->matchTime}}</td>
                    <td>{{$post->country}}</td>
                    <td>{{$post->league}}</td>
                    <td>{{$post->teams}}</td>
                    <td>{{$post->tip}}</td>
                    <td>{{$post->result}}</td>
                </tr>
                @endforeach

              @else
                <tr>
                    <td colspan="6"><h1 class="text-center">No post for this day.</h1></td>
                </tr>
              @endif
          </tbody>
      </table>
    @endsection

        

    @section ('sidebar')
    <h3>My sidebar goes here. And the sidebar remains the same on all my web pages.</h3>
    @endsection



    @section ('comments')
    <div class="panel-heading">
        <h2 class="text-danger"> <strong>Comment Section </strong> </h2>
    </div>
        <ul class="media-list">
            <div class="hidden-xs hidden-sm hidden-md hidden-lg">
                {{ $commentCount = 0 }}
            </div>
    
            @foreach ($comments as $comment)
                @if (!isset($comment->parentId))
                    <div class="hidden-xs hidden-sm hidden-md hidden-lg">
                        {{ $commentCount++ }}
                    </div>
                    <li class="media well">
                        <a class="pull-left" href="#">
                            <img src="{{ asset('img/noImage1.jpg') }}" alt="Helmet as default picture">
                        </a>
                        <div class="media-body">
                            <h4 class="media-head">{{ $comment->userName }}</h4>
                            <p>{{ $comment->body }}</p>
    
                            <!--Dynamic reply form generated with javascript-->
                            <div class="hidden-xs hidden-sm hidden-md hidden-lg">
                                {{ $reply = "reply".$commentCount }}
                            </div>
                            <button class="btn btn-warning" onclick="{{ $reply }}();">Reply</button>
                            <div id="{{ $reply }}"></div>
    
                            <script>
                                count = 1;
    
                                function {{ $reply }}()
                                {
                                    if((count%2) == 1)
                                    {
                                        count++;
                                        return document.getElementById("{{ $reply }}").innerHTML = 
                                                    '<br>'
                                                    +'<form class="clearfix" action="{{ action("PagesController@storeReply") }}" method="POST">'
                                                    +'<input type="hidden" name="_token" value="{{ csrf_token() }}">'
                                                    +'<input type="hidden" name="pageName" value="home">'
                                                    +'<input type="hidden" name="parentId" value="{{ $comment->id }}">'
                                                    
                                                    +'<textarea rows="4" placeholder="Reply" name="reply" class="form-control"></textarea>'
                                                    +'<br>'
                                                    +'<input type="submit" value="Reply" class="btn btn-primary pull-right" >'
                                                +'</form>';
                                    }
                                    else
                                    {
                                        count++;
                                        return document.getElementById("{{ $reply }}").innerHTML = "";
                                    }
                                }
                            </script>
    
                            <div class="hidden-xs hidden-sm hidden-md hidden-lg">
                                {{ $parent1ID = $comment->id }}
                            </div>
    
    
                            <hr>
    
    
                            @foreach ($comments as $comment)
                                @if ($comment->parentId == $parent1ID)
                                    <div class="hidden-xs hidden-sm hidden-md hidden-lg">
                                        {{ $commentCount++ }}
                                    </div>
    
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="{{ asset('img/noImage1.jpg') }}" alt="Default Image">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-head">{{ $comment->userName }}</h4>
                                            <p>{{ $comment->body }}</p>
    
                                            
    
    
                                        <div class="hidden-xs hidden-sm hidden-md hidden-lg">
                                                {{ $replyReply = "replyReply".$commentCount }}
                                            </div>
        
                                            <button class="btn btn-warning" onclick="{{ $replyReply }}();">Reply</button>
        
                                            <div id="{{ $replyReply }}"></div>
        
                                            <script>
                                                countReply = 1;
        
                                                function {{ $replyReply }}()
                                                {
                                                    if((countReply%2) == 1)
                                                    {
                                                        countReply++;
        
                                                        return document.getElementById("{{ $replyReply }}").innerHTML = 
                                                        '<br>'
                                                        +'<form class="clearfix" action="{{ action("PagesController@storeReply") }}" method="POST">'
                                                        +'<input type="hidden" name="_token" value="{{ csrf_token() }}">'
                                                        +'<input type="hidden" name="pageName" value="home">'
                                                        +'<input type="hidden" name="parentId" value="{{ $comment->id }}">'
                                                        
                                                        +'<textarea rows="4" placeholder="Reply" name="reply" class="form-control"></textarea>'
                                                        +'<br>'
                                                        +'<input type="submit" value="Reply" class="btn btn-primary pull-right" >'
                                                        +'</form>';                                         
                                                    }
                                                    else
                                                    {
                                                        countReply++;
                                                        
                                                        return document.getElementById("{{ $replyReply }}").innerHTML = "";
                                                    }
                                                }
                                            </script>
        
                                            <div class="hidden-xs hidden-sm hidden-md hidden-lg">
                                                {{ $parent2ID = $comment->id }}
                                            </div>
        
                                            <hr>
        
                                            @foreach ($comments as $comment)
                                                @if ($comment->parentId == $parent2ID)
                                                <div class="media">
                                                    <a class="pull-left " href="#">
                                                        <img class="media-object" src="{{ asset('img/noImage1.jpg') }}">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-head"> {{ $comment->userName }}</h4>
                                                        <p>{{ $comment->body }}</p>
                                                    </div>         
                                                </div>               
                                                @endif
                                            @endforeach
                                            <br>
        
            
                                        </div>
                                    </div>
                                @endif
                            @endforeach
    
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>



    <!--
      1. Comment ID: automatically generated.
      2. Page Name: must be gotten from this page.
      3. Parents' ID: this can be nullable because it belongs to replies. FOR REPLIES ONLY
      4. User ID: this should also be gotten from this page.
      5. Body: this is comment or reply entered into the textarea.
      6. Timestamp: automatically generated.
      
    -->


 
        <form action="{{ action('PagesController@storeComment') }}" method="POST">
          
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <input type="hidden" name="pageName" value="home">

          <div class="form-group">
            <label for="comment" class="text-lg"> <h3> <strong> We want to hear from you </strong> </h3> </label>
            <textarea class="form-control" placeholder="Please leave a comment about the predictions" name="comment" rows="5"></textarea>
          </div>

          <button type="submit" class="btn btn-success pull-right">Comment</button>
        </form>
      
    @endsection