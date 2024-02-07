@extends('layouts.app')

@section('content')
<?php
$quizes = \App\Models\Quiz::all();
$courseusers = \App\Models\CourseUserTable::all();
$user = Auth::user();
$quizzes=$quizes->filter(function($quiz)use($course){return $quiz->type_id == $course->type_id;});
$filteredcourseuser=$courseusers->filter(function($courseuser)use($user){return $courseuser->user_id == $user->id;});
$courseuser=$filteredcourseuser->firstWhere("course_id","==",$course->id);
?>
<script>

    let answeres = new Map();
    function handleChange(id,correct) {
        answeres.set(id,correct);
        let allcorrect=true;
        for(const answere of answeres){
            if (!answere[1]) {
                allcorrect=false;
            }
        }
        let completed = document.getElementById("completed");
        completed.setAttribute('value',allcorrect?'1':'0');
    }

</script>
    <div class="container">
        <div class="card">
            <div class="card-head m-3">
                <h4 class="card-title">{{$course->name}} Quiz</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('courseuser.update', $courseuser) }}" method="POST"
                <div><h5>Fill the quizzes</h5></div>
                    @foreach ($quizzes as $quiz)
                    <div class="m-3">
                        <label for="question-{{$quiz->id}}" class="form-label">Quistion : {{$quiz->question}}</label>
                        <br/>
                        <input type="radio" onchange="handleChange({{$quiz->id}},true)" name="question-{{$quiz->id}}" id="question-{{$quiz->id}}-1" value="{{$quiz->answere}}" required>
                        <label for="question-{{$quiz->id}}-1">{{$quiz->answere}}</label>
                        <br/>
                        <input type="radio" onchange="handleChange({{$quiz->id}},false)" name="question-{{$quiz->id}}" id="question-{{$quiz->id}}-2" value="{{$quiz->fakeanswereone}}">
                        <label for="question-{{$quiz->id}}-2">{{$quiz->fakeanswereone}}</label>
                        <br/>
                        <input type="radio" onchange="handleChange({{$quiz->id}},false)" name="question-{{$quiz->id}}" id="question-{{$quiz->id}}-3" value="{{$quiz->fakeansweretwo}}">
                        <label for="question-{{$quiz->id}}-3">{{$quiz->fakeansweretwo}}</label>
                        <br/>

                    </div>
                    @endforeach
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="seen" id="seen" value="1">
                    <input type="hidden" name="completed" id="completed" value="0">
                    <button type="submit" class="btn btn-success">Finish</button>
                    </form> 
            </div>
        </div>
    </div>
   
@endsection