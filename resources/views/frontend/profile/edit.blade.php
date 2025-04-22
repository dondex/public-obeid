@extends('layouts.app-nonav')

@section('title', 'Edit Patient Profile')

@section('content')

<div class="container-fluid bg-blue p-1">
    <div class="row mx-2">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <a href="{{ url('profile/' . Auth::id()) }}" class="btn btn-primary btn-sm shadow-sm my-3">
                    <i class="fas fa-chevron-left text-white p-2"></i>
                </a>
            </div>
            <div class="text-center">
                <h5 class="text-white">Edit Patient Profile</h5>
            </div>
        </div>
    </div>

    <div class="row m-3 bg-white px-1 py-4 rounded">
        <div class="col-md-8 offset-md-2">
            <form action="{{ url('profile/update/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->


                <div class="form-group">
                    <label for="profile_image">Profile Image</label>
                    <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/*">
                    @if($records->isNotEmpty() && $records->first()->profile_image)
                        <img src="{{ asset($records->first()->profile_image) }}" alt="Current Profile Image" class="img-fluid mt-2" style="max-width: 150px;">
                    @endif
                </div>

              
                <div class="form-group">
                    <label for="resident_number">Resident Number</label>
                    <input type="text" name="resident_number" id="resident_number" class="form-control" value="{{ Auth::user()->resident_number }}" readonly> <!-- Use Auth::user() -->
                    <small class="form-text text-muted">This field is not editable.</small> <!-- Message indicating it's not editable -->
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $records->isNotEmpty() ? $records->first()->phone_number : '' }}" required>
                </div>

                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $records->isNotEmpty() ? $records->first()->birthday : '' }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control" rows="4" required>{{ $records->isNotEmpty() ? $records->first()->address : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male" {{ $records->isNotEmpty() && $records->first()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $records->isNotEmpty() && $records->first()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

               

              

               

                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
            </form>
        </div>
    </div>
</div>

@endsection