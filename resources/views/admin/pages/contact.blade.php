@extends("layout.nav")
@section("content")
    <h1 class="text-center">Contact</h1>

    <h2>Name: {{ $name }}</h2>
    <h2>Email: {{ $email }}</h2>
    <h2>Message: {{ $message }}</h2>



    @endsection