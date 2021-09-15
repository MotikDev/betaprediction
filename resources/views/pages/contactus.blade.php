@extends ('layout.app')

@section ('content')
    <br><br>
    <h1 class="text-center">Contact Us</h1>
    <form role="form">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="name" class="form-control" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" cols="10" maxlength="200" class="form-control" placeholder="We will like to hear from you."></textarea>
        </div>
        
        <div class="text-center">
            <input type="submit" value="Send" class="btn btn-success ">
        </div>
        
    </form>

    <br> <br> <br> <br> <br> <br> <br>
@endsection

<div class="hidden-xs hidden-sm hidden-md hidden-lg">
    @section('comments')

    @endsection
</div>
