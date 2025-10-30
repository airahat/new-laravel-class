@extends("admin.layout.nav")
@section("title", "Trainees List")
@section("content")
    <h1>Trainees List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainees as $trainee)
                <tr>
                    <td>{{ $trainee['id'] }}</td>
                    <td>{{ $trainee['name'] }}</td>
                    <td>{{ $trainee['email'] }}</td>
                    <td>{{ $trainee['department'] }}</td>
                    <td><span class="badge bg-{{ $trainee ["is_active"]? "success" : "danger" }}"> {{ $trainee ["is_active"] ? "Active" : "Inactive" }}</span></td>
                    <td><x-button :anchor="true" bg="outline-info" href="{{ route('trainees.show', $trainee['id']) }}">View</x-button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection