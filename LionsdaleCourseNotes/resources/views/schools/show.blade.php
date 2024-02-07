@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card text-center p-4">
               
                <div class="card-body">
                    <h4 class="card-title">{{ $school->name }}</h4>
                    <p class="card-text">{{ $school->contactName}}, {{$school->contactEmail}}</p>
                    <p class="card-text">{{ $school->address }}</p>
                    <p class="card-text">{{ fake()->sentences(3, true) }}</p>
                    <hr>
                    <p class="card-text">{{ fake()->paragraphs(10, true) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection