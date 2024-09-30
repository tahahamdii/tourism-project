@extends("Components.layout")
@section("content")

{{-- send data of this form to the database --}}
<form style="width: 400px; margin: 0 auto; padding: 20px; background-color: #f7e4f4; border-radius: 5px;"
action="/login" method="POST">
    @csrf

    <div class="form-group">
        <label for="user-email">User Email:</label>
        <input style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #f7e4f4; border-radius: 3px; font-size: 16px"
         name="email" class="form-control" id="user-email" type="email" placeholder="User Email..." />
    </div>
    <div class="form-group">
        <label for="user-email">User password:</label>
        <input style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #f7e4f4; border-radius: 3px; font-size: 16px"
         name="password" class="form-control" id="user-email" type="password" placeholder="User password..." />
    </div>

    <button style="background-color: #713d6e; color: rgb(209, 190, 190)"
    class="btn btn-primary mr-2 my-1" type="submit">login</button>
</form>


@endsection
