@extends('admin.layout')
@section('body')
{{-- add user --}}
<div class="main-content" id="addUser">
    <h2>Add User</h2>
    <br>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="userId">User id</label>
            <input type="text" id="userId" name="userId" placeholder="Enter Id">
        </div>

        <div class="form-group">
            <label for="userName">User Name</label>
            <input type="text" id="userName" name="userName" placeholder="Enter user name">
        </div>

        <div class="form-group">
            <label for="userEmail">User Email</label>
            <input type="email" id="userEmail" name="userEmail" placeholder="Enter user email">
        </div>

        <div class="form-group">
            <label for="userRole">User Role</label>
            <select id="userRole" name="userRole">
                <option value="student">Student</option>
                <option value="instructor">Instructor</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Class">Class</label>
            <input type="text" id="Class" name="Class" placeholder="Enter user Class">
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" id="level" name="level" placeholder="Enter user level">
        </div>

        <div class="form-group">
            <label for="userNumber">User Number</label>
            <input type="text" id="userNumber" name="userNumber" placeholder="Enter user number">
        </div>

        <div class="form-group">
            <label for="Password">User Password</label>
            <input type="password" id="Password" name="userPassword" placeholder="Enter user password">
        </div>

        <div class="form-group">
            <label for="Password_confirmed">Confirm Password</label>
            <input type="password" id="Password_confirmed" name="userPassword_confirmation" placeholder="Enter confirm password">
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