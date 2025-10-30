@extends("admin.layout.nav")
@section("title", "Student Details")

@section("content")
    <h1>Trainee Details</h1>
    <p>ID: {{ $trainees['id'] }}</p>
    <p>Name: {{ $trainees['name'] }}</p>
    <p>Email: {{ $trainees['email'] }}</p>
    <p>Department: {{ $trainees['department'] }}</p>
    <p>Status: {{ $trainees['is_active'] ? 'Active' : 'Inactive' }}</p>

@endsection