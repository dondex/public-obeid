@extends('layouts.app')

@section('title', $location->name)

@section('content')

<div class="container">

    <div>
        <a href="{{ url('locations') }}" class="btn btn-primary btn-sm shadow-sm my-3">
            <i class="fas fa-chevron-left text-white p-2"></i>
        </a>
    </div>

    <h1 class="text-center">{{ $location->name }}</h1>
    <img src="{{ asset($location->location_image) }}" alt="{{ $location->name }}" class="img-fluid rounded" >
    
    <h3 class="py-3">Departments Available:</h3>
    
        @foreach($location->departments as $department)

        <a class="text-decoration-none text-black" href="{{ url('department/' . $department->id) }}">
            <div class="row m-3 bg-white p-4 rounded shadow-sm">                  
                    @if($department->image)
                        <div class="col-2">
                            <img src="{{ asset('uploads/department/' . $department->image) }}" alt="{{ $department->name }}" class="img-fluid rounded" style="width: 50px; height: 50px;" />
                        </div>
                    @endif
                    <div class="col-10">
                        <h3>{{ $department->name }}</h3> 
                        <p>{{ $department->description }}</p>
                    </div>
        
                </div>
            </div>
        </a>
        @endforeach

</div>

@endsection