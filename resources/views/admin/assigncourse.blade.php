@extends('admin.layout')
@section('body')
<style>
    .alert-success {
        color: green;
    }
    .alert-error {
        color: red;
    }
</style>

{{-- assign course --}}
<div class="main-content">
    <h2>Assign Course</h2>
    <br>

    @if(session('success'))
        <p class="alert-success">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p class="alert-error">{{ session('error') }}</p>
    @endif

    <br>

    <form action="{{route('storeassignCourse')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="assignUser">Select User</label>
            <select id="assignUser" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ ucfirst($user->type) }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="assignCourse">Select Course</label>
            <select id="assignCourse" name="course_id">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="course_grade">Grade</label>
            <input type="text" id="course_grade" name="grade" placeholder="Enter grade of course">
        </div>
        <div class="form-group">
            <button type="submit">Assign Course</button>
        </div>
    </form>

</div>
@endsection