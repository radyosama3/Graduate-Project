@extends('admin.layout')
@section('body')
{{-- add lecture  --}}
<div class="main-content" id="addLecture">
<h2>Add Lecture</h2>
    <br>
        <br>
            <form>
                <div class="form-group">
                    <label for="lectureTitle">Lecture Title</label>
                    <input type="text" id="lectureTitle" name="lectureTitle" placeholder="Enter lecture title">
                </div>
                <div class="form-group">
                    <label for="lectureContent">Lecture Content</label>
                    <input type="text" id="lectureContent" name="lectureContent" placeholder="Enter lecture content">
                </div>
                <div class="form-group">
                    <label for="lectureCourse">Assign to Course</label>
                    <select id="lectureCourse" name="lectureCourse">
                        <!-- Options would be populated dynamically -->
                        <option value="101">Course 1</option>
                        <option value="102">Course 2</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="file_upload">File Upload</label>
                    <input type="file" id="file_upload" name="file_upload" accept="image/*,.pdf,.ppt,.pptx">
                </div>

                <div class="form-group">
                    <button type="submit">Add Lecture</button>
                </div>
            </form>
</div>
@endsection