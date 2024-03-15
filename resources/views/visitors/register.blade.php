@extends('visitors.layouts.main')
@section('main-container')
<style>
    .form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>
<form method="POST" action="{{ route('register_submit') }}" style="
width: 59%;
margin: auto;
box-shadow: 10px 10px 10px 10px #00000021;
padding: 20px;
">
    @csrf
<h2> <a class="d-block" href="{{ route('login') }}">Login</a></h2>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="role">Select Role:</label>
        <select name="role" id="role" class="form-control">
            <option value="student">Student</option>
            <option value="instructor">Instructor</option>
        </select>
    </div>

   
    <button type="submit" class="btn btn-primary">Register</button>
</form>


@endsection