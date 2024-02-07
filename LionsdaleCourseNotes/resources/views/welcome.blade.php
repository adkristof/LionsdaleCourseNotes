@extends('layouts.app')

@section('content')

<video id="background-video" playsinline loop autoplay muted poster="#">
   <source src="{{ asset('storage/videos/background_video.mp4') }}" type="video/webm">
   Your browser does not support the video tag.
</video>
<?php
$courses = \App\Models\Course::all()
?>
   <div class="container">
       <h1 class="welcome rounded-0 text-center">Welcome</h1>
    <div class="welcome rounded-bottom">
        <div class="row text-center">
            <h2 class="">Courses</h2>
          @for ($i = 0; $i < 3; $i++)    
              <div class="col-4">
                  <div class="card cards m-3 p-3 border-0">
                      <div class="row text-center">
                          <div>
                              <h4 class="card-title">{{ $courses[$i]->name }}</h4>
                          </div>
                          
                          <div class="card-body">
                              <p class="card-text text-truncate">{{ $courses[$i]->level }}</p>
                          </div>
                      </div>
                  </div>
              </div>
          @endfor
          <form action="{{ route('courses.index') }}" method="GET">
            <button type="submit" class="btn btn-warning">View all</button>
        </form>
       </div>
    </div>
   </div>
@endsection
