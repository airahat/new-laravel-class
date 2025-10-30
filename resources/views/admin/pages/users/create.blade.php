@extends('admin.layout.nav')
@section('title', 'Users List')
@section('content')
    <div class="container">
        <h2>Users Form</h2>


        <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row g-3  mt-3">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}">
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="row g-3  mt-3">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control">
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row g-3  mt-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row g-3  mt-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-select">
                    @foreach ($roles as $role)
                        <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                    @endforeach
                </select>

            </div>

            <div class="row g-3 mt-3">
                <label for="password">Phofile Photo <span class="" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-title="
                        <ul class='ps-3 mb-0 text-start'> 
                        <li>Image must be <strong>jpg or png</strong></li>
                        <li>Image dimensions must be <strong>200x200</strong></li> 
                        <li>Image size must be no more that<strong>500kb</strong> </li> 
                    </ul>" 
                    data-bs-html="true">
                       <i class="fa-solid fa-circle-info cursor-pointer"></i>
                    </span> </label>
                <input type="file" id="photo" name="photo" class="form-control">
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row g-3  mt-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row g-3  mt-3">
                <label for="con_password">Confirm Password</label>
                <input type="password" id="con_password" name="password_confirmation" class="form-control">
            </div>
            <div class="col-md-12 mt-3">
                <input type="submit" value="Submit" class="btn btn-outline-info">
            </div>
            {{-- <div class="col-12">
                @if ($errors->any())

                    <ul class="text-danger">
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div> --}}

        </form>
    </div>
@endsection
