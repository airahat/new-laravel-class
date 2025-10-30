@extends("admin.layout.nav")
@section("title", "Home")
@section("content")

<h1 class="text-center">Home</h1>
<h5 class="container">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa itaque eos inventore delectus tempora? Temporibus ut aut autem dignissimos iste voluptatum unde voluptas corporis totam sed. Blanditiis architecto ipsa iste.
Cumque porro reiciendis quos vel consequuntur, totam laudantium eveniet numquam eum. Dolores, officia dolorum officiis at, pariatur fugiat ullam eaque neque, repellat praesentium sapiente possimus repudiandae provident? Harum, minima quo?
Porro voluptate at, aspernatur ratione voluptates repudiandae aliquam unde corporis tempora dignissimos nemo maiores blanditiis consectetur maxime aut placeat suscipit magnam quod? Nihil pariatur maxime officiis placeat! Molestiae, eaque minima.</h5>
<x-button bg="dark" :disabled="true">
    Dark Button
</x-button>
<x-button type="submit" >
    Submit Button
</x-button>
<x-button>
    Dark Button
</x-button>
@endsection