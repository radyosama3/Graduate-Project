@extends('admin.layout')
    @section('body')
    @include('errors')
    @include('success')
    <br>
            <h2>Update User</h2>
            <br>
            <form id="user-form" action="{{ route('updateuser',$user->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                {{-- id  --}}
                <div class="form-group">
                    <label for="userId">User ID</label>
                    <input type="text" id="id" value="{{$user->id}}" name="id" placeholder="Enter ID" >
                </div>
                {{-- Name --}}

                <div class="form-group">
                <label for="userName">User Name</label>
                <input type="text" id="name" value="{{$user->name}}" name="name" placeholder="Enter user name" >
                </div>
                {{-- Email --}}
                <div class="form-group">
                    <label for="userEmail">User Email</label>
                    <input type="email" id="email" value="{{$user->email}}"name="email" placeholder="Enter user email" >

                </div>
                <div class="form-group">
                    <label for="userRole">User Role</label>
                    <select id="type" name="type" class="form-control">
                        <option value="admin" {{ (old('type', $user->type) == 'admin') ? 'selected' : '' }}>admin</option>
                        <option value="student" {{ (old('type', $user->type) == 'student') ? 'selected' : '' }}>student</option>
                        <option value="instructor" {{ (old('type', $user->type) == 'instructor') ? 'selected' : '' }}>instructor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" id="class_room" value="{{$user->class_room}}" name="class_room" placeholder="Enter user class" >
                </div>

                <div class="form-group">
                    <label for="level">Level</label>
                    <input type="text" id="level" value="{{$user->level}}" name="level" placeholder="Enter user level">

                </div>

                <div class="form-group">
                    <label for="userNumber">User Number</label>
                    <input type="text" id="number" value="{{$user->number}}" name="number" placeholder="Enter user number" >

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
                    <img src="{{asset("storage/userImage/$user->image")}}" width="100" alt="">
                    <input type="file" id="image" name="image" accept="image/*">

                </div>

                <div class="form-buttons">
                    <button href="{{route('updateuser',$user->id)}}" class="edit-btn">Update User</a>
                </div>
            </form>
            <br>









@endsection