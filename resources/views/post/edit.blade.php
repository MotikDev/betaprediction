@extends ('post.layout')

@section ('maincontent')
<div class="well">

        <h2 class="text-center">Update Result/Edit/Delete Prediction</h2>
        <form action="{{action('PostsController@update', $post->id)}}" method="POST" class="form-vertical" role="form">
            
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="matchTime">Match Time</label>
                <input type="text" name="matchTime" value="{{ $post->matchTime }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" value="{{ $post->country }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="league">League</label>
                <input type="text" name="league" value="{{ $post->league }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="teams">Teams</label>
                <input type="text" name="teams" value="{{ $post->teams }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="tips">Tips</label>
                <input type="text" name="tip" value="{{ $post->tip }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="result">Result</label>
                <input type="text" name="result" value="{{ $post->result }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="top">Top (good/bad for top predictions)</label>
                <input type="text" name="top" value="{{ $post->top }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Edit</button>
            
        </form>
    </div>
@endsection