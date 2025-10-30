@extends('admin.layout.nav')
@section('title', 'Users List')
@section('content')
    <h2>Users List</h2>
<div><a href="{{ route('users.create') }}" class="btn btn-outline-danger">Add new</a></div>
    
       
    @if(session("success"))
    <div class="alert alert-success mt-2" role="alert">
        {{ session("success") }}
    </div>
    @endif



    <table class="table table-striped">
        <thead>

            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
<tbody>

    @foreach ($users as $i => $user)
        <tr>
            <td>{{ $users->firstItem() +$i }}</td>
            <td>
                @if($user['photo']==null)
                    <img src="https://placehold.co/400" style="max-width: 80px" alt="null photo">
                
                @endif
                <img src="storage/{{ $user['photo']}}" style="max-width: 80px" alt=""></td>
            <td>{{ $user['first_name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['role'] }}</td>
            <td>
                <x-button href="{{ route('users.show', $user['id']) }}" :anchor="true">

                    View

                </x-button>
            
            
                <form action="{{ route("users.destroy", $user["id"]) }}" method="POST" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-outline-danger">Remove</button>


                </form>
                <form action="{{ route("users.edit", $user["id"]) }}" method="POST" class="d-inline">
                     @csrf
                   <input type="hidden" name="page" value={{ request('page', 1) }}>
                    <button type="submit" class="btn btn-outline-info">Update</button>


                </form>
            
            
            
            
            </td>



        </tr>
    @endforeach
</tbody>

<tfoot>
    <tr>
        <th  colspan="5">
            {{ $users->links() }}
        </th>
    </tr>
</tfoot>
    </table>




@endsection
