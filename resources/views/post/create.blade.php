@extends ('post.layout')

@section ('maincontent')
    <div class="well">
        <!--<h3>This part of the page will contain the form that will store the predictions.</h3>-->
        <h2 class="text-center">Create Prediction</h2>
        <form action="{{action('PostsController@store')}}" method="POST" class="form-vertical" role="form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
            <div class="form-group">
                <label for="matchTime">Match Time</label>
                <input type="text" name="matchTime" placeholder="Time" class="form-control">
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" placeholder="Country" class="form-control">
            </div>

            <div class="form-group">
                <label for="league">League</label>
                <input type="text" name="league" placeholder="League" class="form-control">
            </div>

            <div class="form-group">
                <label for="teams">Teams</label>
                <input type="text" name="teams" placeholder="i.e Home Team vs Away Team" class="form-control">
            </div>

            <div class="form-group">
                <label for="tip">Tips</label>
                <input type="text" name="tip" placeholder="i.e Over 2.5 or 1 DNB" class="form-control">
            </div>

            <div class="form-group">
                <label for="result">Result</label>
                <input type="text" name="result" placeholder="Match Result" class="form-control">
            </div>

            <div class="form-group">
                <label for="top">Top (good/bad for top predictions)</label>
                <input type="text" name="top" placeholder="Top or Null" class="form-control">
            </div>

            <input type="submit" placeholder="Submit" class="btn btn-success">

        </form>
    </div>
@endsection