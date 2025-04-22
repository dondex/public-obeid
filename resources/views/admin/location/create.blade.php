@extends('layouts.master')

@section('title', 'Obeid Locations')

@section('content')

<div class="container-fluid">



    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-0">
        <div class="card-header d-sm-flex align-items-center justify-content-between bg-primary text-white">
            <h4 class="mb-0">Add New Location</h4>
            <a href="{{ url('admin/location') }}" class="btn btn-light btn-sm shadow-sm"><i class="fas fa-arrow-alt-circle-left text-primary mx-2"></i>Back</a>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/add-location') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label">Location Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter location name" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Location Image</label>
                    <input type="file" name="location_image" class="form-control" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary ">Submit</button>
            </form>
        </div>
    </div>

</div>

@endsection