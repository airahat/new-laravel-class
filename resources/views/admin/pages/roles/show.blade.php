@extends("layout.nav")
@section("title", "Role Details")

@section("content")

<h1>Role Details</h1>   
<p>ID: {{ $role['id'] }}</p>
<p>Title: {{ $role['name'] }}</p>

@endsection