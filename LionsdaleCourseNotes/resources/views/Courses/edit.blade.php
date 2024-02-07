@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="card p-4">
            <div class="card-body">
                <h4 class="card-title text-center">Edit {{ $course->name }}</h4>
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
                        <form action="{{ route('courses.update', $course) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    value="{{ old('name', $course->name) }}">
                                    <input type="hidden" name="c_route" id="c_route"
                                        class="form-control" value="{{old('name','php.'.$course->name)}}">
                                @error('name')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Course Level</label>
                                <select name="level" class="form-control" id="level" data-live-search="true">
                                    
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediete">Intermediete</option>
                                    <option value="professional">Professional</option>
                                    
                                </select>
                                
                            </div>
                            <div class="mb-3">
                                <label for="type_id" class="form-label">Course Type</label>
                                <select name="type_id" class="form-control" id="type_id" data-live-search="true">
                                    @foreach(\App\Models\Type::all() as $type)
                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                        
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-warning w-75">Update
                                    {{ $course->name }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
<script>

$('#name').keyup(function(){
    $('#c_route').val('php.'+$(this).val());
});

</script>
@endsection