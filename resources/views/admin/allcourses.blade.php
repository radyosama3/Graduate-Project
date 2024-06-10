@extends('admin.layout')
@section('body')

@include('errors')
@include('success')
<br>
<h1>course Management</h1>
<table id="user-table">
    <thead>
        <tr>
            <th>Course Id</th>
            <th>Name</th>
            <th>description</th>
            <th>icon</th>
            <th>is active</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $courses as $course)
            <tr>
                <td>{{ $course->course_id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->icon }}</td>
                <td>
                    @if($course->is_active == 1)
                        Active
                    @else
                        Not Active
                    @endif
                </td>
                <td>
                    <a type="button" href="{{route('editcourse',$course->id)}}" class="edit-btn">Edit</a>

                    <form action="{{route('deletecourse', $course->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this course?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection