@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="card p-4">
            <div class="card-body">
                <h4 class="card-title text-center">Edit {{ $school->name }}</h4>
                @if (Session::has('message'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Holy guacamole!</strong> {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Holy guacamole!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col">
                        <form action="{{ route('schools.update', $school) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    value="{{ old('name', $school->name) }}">
                                @error('name')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address"
                                    class="form-control @if ($errors->has('address')) is-invalid @endif"
                                    value="{{ old('address', $school->address) }}">
                                @error('address')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contactName" class="form-label">Contact Name</label>
                                <input type="text" name="contactName" id="contactName"
                                    class="form-control @if ($errors->has('contactName')) is-invalid @endif"
                                    value="{{ old('contactName', $school->contactName) }}">
                                @error('contactName')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contactEmail" class="form-label">Contact Email</label>
                                <input type="text" name="contactEmail" id="contactEmail"
                                    class="form-control @if ($errors->has('contactEmail')) is-invalid @endif"
                                    value="{{ old('contactEmail', $school->contactEmail) }}">
                                @error('contactEmail')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-warning w-75">Update
                                    {{ $school->name }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
@endsection