@extends ('post.layout')

@section ('maincontent')

    <table class="table">
        <thead>
            <tr >
                <th>Match Time</th>
                <th>Country</th>
                <th>League</th>
                <th class="text-center">Teams</th>
                <th>Tips</th>
                <th>Result</th>
                <th>Top</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->matchTime}}</td>
                <td>{{$post->country}}</td>
                <td>{{$post->league}}</td>
                <td>{{$post->teams}}</td>
                <td>{{$post->tip}}</td>
                <td>{{$post->result}}</td>
                <td>{{$post->top}}</td>
                <td>
                    <form action="{{ action('PostsController@edit', $post->id) }}" method="GET">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ action('PostsController@destroy', $post->id) }}" method="POST">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection