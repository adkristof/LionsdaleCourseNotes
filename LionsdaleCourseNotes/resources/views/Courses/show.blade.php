@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-white">Detail</h1>
            <div class="card text-center p-4">
               
                <div class="card-body">
                    <h4 class="card-title">{{ $course->name }}</h4>
                    <p class="card-text">{{ fake()->sentences(3, true) }}</p>
                    <hr>
                    <p class="card-text">{{ fake()->paragraphs(23, true) }}</p>
                </div>
            </div>
        </div>
    </div>
    @endsection