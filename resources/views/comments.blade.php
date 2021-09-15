@extends('home')

@section ('comments')
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
                                                +'<input type="hidden" name="pageName" value="admin">'
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
                                                    +'<input type="hidden" name="pageName" value="admin">'
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




    




@endsection

