@extends('layouts.master')

@section('title', 'Edit Location')

@section('content')

<div class="container-fluid">

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-0">
        <div class="card-header d-sm-flex align-items-center justify-content-between bg-primary text-white">
            <h4 class="mb-0">Edit Location</h4>
            <a href="{{ url('admin/location') }}" class="btn btn-light btn-sm shadow-sm"><i class="fas fa-arrow-alt-circle-left text-primary mx-2"></i>Back</a>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/update-location/' . $location->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- This is important for PUT requests -->

                <div class="mb-4">
                    <label for="name" class="form-label">Location Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter location name" value="{{ old('name', $location->name) }}" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Location Image</label>
                    <input type="file" name="location_image" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Leave blank if you do not want to change the image.</small>
                </div>

                @if($location->location_image)
                    <div class="mb-4">
                        <label class="form-label">Current Image</label>
                        <div>
                            <img src="{{ asset($location->location_image) }}" alt="Current Image" class="img-fluid" style="max-width: 200px;">
                        </div>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>

@endsection