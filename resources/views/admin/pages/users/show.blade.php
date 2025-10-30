@extends('admin.layout.nav')
@section('title', 'User Details')
@section('content')
    <h2>User Details</h2>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>


            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['first_name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['role'] }}</td>


            </tr>


    </table>




@endsection
