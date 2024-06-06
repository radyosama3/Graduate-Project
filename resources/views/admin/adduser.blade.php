@extends('admin.layout')
@section('body')
{{-- add user --}}
<div class="main-content" id="addUser">
    @include('errors')
    @include('success')
    <br>
    <h2>Add User</h2>
    <br>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="userId">User ID</label>
            <input type="text" user_id="id" name="user_id" placeholder="Enter ID" >
        </div>

        <div class="form-group">
            <label for="userName">User Name</label>
            <input type="text" id="name" name="name" placeholder="Enter user name" >
        </div>

        <div class="form-group">
            <label for="userEmail">User Email</label>
            <input type="email" id="email" name="email" placeholder="Enter user email" >

        </div>

        <div class="form-group">
            <label for="userRole">User Role</label>
            <select id="type" name="type">
                {{-- @foreach ($types as $type) --}}
                    {{-- <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ $type }}</option> --}}
                    <option value="admin">admin</option>
                    <option value="student">student</option>
                    <option value="instructor">instructor</option>
                {{-- @endforeach --}}
            </select>

        </div>

        <div class="form-group">
            <label for="class">Class</label>
            <input type="text" id="class_room" name="class_room" placeholder="Enter user class" >
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" id="level" name="level" placeholder="Enter user level">

        </div>

        <div class="form-group">
            <label for="userNumber">User Number</label>
            <input type="text" id="number" name="number" placeholder="Enter user number" >

        </div>

        <div class="form-group">
            <label for="password">User Password</label>
            <input type="password" id="password" name="password" placeholder="Enter user password">

        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter confirm password">

        </div>

        <div class="form-group">
            <label for="image">User Image</label>
            <input type="file" id="image" name="image" accept="image/*">

        </div>

        <div class="form-group">
            <button type="submit">Add User</button>
        </div>
    </form>

</div>
@endsection