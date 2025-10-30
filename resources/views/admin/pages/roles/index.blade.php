@extends('layout.nav')
@section('title', 'Roles')
@section('content')
    <h1>Roles</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>View</th>

            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role['id'] }}</td>
                    <td>{{ $role['name'] }}</td>
                    <td><x-button href="{{ route('roles.show', $role['id']) }}" :anchor="true">
                        
                            View
                    
                    </x-button></td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection