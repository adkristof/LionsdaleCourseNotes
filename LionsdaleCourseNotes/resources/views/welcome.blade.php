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
    <div>
        <div class="row text-center">
          @for ($i = 0; $i < 3; $i++)    
              <div class="col-4">
                  <div class="card bg-dark text-white m-3 p-3">
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
            <button type="submit" class="btn btn-primary">View more</button>
        </form>
       </div>
    </div>
   </div>
@endsection
