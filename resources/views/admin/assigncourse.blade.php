@extends('admin.layout')
@section('body')
{{-- assign course --}}
<div class="main-content">
    <h2>Assign Course</h2>
    <br>
    <br>
    <form>
        <div class="form-group">
            <label for="assignUser">Select User</label>
            <select id="assignUser" name="assignUser">
                <!-- Options would be populated dynamically -->
                <option value="1">John Doe (Student)</option>
                <option value="2">Jane Smith (Instructor)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="assignCourse">Select Course</label>
            <select id="assignCourse" name="assignCourse">
                <!-- Options would be populated dynamically -->
                <option value="101">Course 1</option>
                <option value="102">Course 2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="course_grade">grade</label>
            <input type="text" id="course_grade" name="course_grade" placeholder="Enter grade of course">
        </div>
        <div class="form-group">
            <button type="submit">Assign Course</button>
        </div>
    </form>
</div>
@endsection