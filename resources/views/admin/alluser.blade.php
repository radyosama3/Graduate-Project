@extends('admin.layout')
    @section('body')
    @include('errors')
    @include('success')
    <h1>User Management</h1>
    <table id="user-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>User ID</th>
                <th>Class</th>
                <th>Level</th>
                <th>User Number</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->class_room }}</td>
                    <td>{{ $user->level }}</td>
                    <td>{{ $user->number }}</td>
                    <td>{{ $user->type }}</td>

                    <td>
                            <a type="button" href="{{route('edituser',$user->id)}}" class="edit-btn">Edit</a>
                        <form action="{{route('deleteuser',$user->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
