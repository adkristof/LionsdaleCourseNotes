@extends('layouts.app')

@section('content')

<video id="background-video" playsinline loop autoplay muted poster="#">
   <source src="{{ asset('storage/videos/background_video.mp4') }}" type="video/webm">
   Your browser does not support the video tag.
</video>

   <div class="container">
      <div class="row">
         @foreach (\App\Models\Course::all() as $item)
             <div class="col-4">
                 <div class="card bg-dark text-white m-3 p-3">
                     <div class="row text-center">
                         <div>
                             <h4 class="card-title">{{ $item->name }}</h4>
                         </div>
                        
                        <div class="card-body">
                           <p class="card-text text-truncate">{{ $item->level }}</p>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Join</button>
                        </div>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
   </div>
@endsection
