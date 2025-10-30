@extends("layout.nav")
@section("title", "Users")
@section("content")

<h1 class="text-center">User : {{ $user }}</h1>
<div>
    @if($id)
    <h1 class="text-center ">User ID : {{ $id?? 'Not Found' }}</h1>
    @endif
</div>
@endsection