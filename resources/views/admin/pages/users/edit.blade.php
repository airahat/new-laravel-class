@extends('admin.layout.nav')
@section('title', 'Users List')
@section('content')
    <div class="container">
        <h2>Edit User</h2>


        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method("PATCH")
            @csrf
          
                <input type="hidden" name="page" value="{{$page}}">
           
            <div class="row g-3">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}">
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="row g-3">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}">
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row g-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row g-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-select">
                    @foreach ($roles as $role)
                        <option value="{{ $role['id'] }}" @selected( $user["role_id"]==$role["id"] )>{{ $role['name'] }}</option>
                    @endforeach
                </select>

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
