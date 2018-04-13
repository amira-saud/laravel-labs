@extends('layouts.master')
@section('content')
<!--


<h1>Posts Index</h1>
<ul>

@foreach ($posts as $post)


<li>{{ $post->title }}  And The Creator is ({{$post->user->name}})</li>


@endforeach


</ul>
-->



    <h1>Posts Data</h1> <a href="/posts/create" ><button>Create Post</button></a>
        <table class="table table-striped">
        <th><strong> Post Title </strong></th>
        <th><strong> Posted By </strong></th>
        <th><strong> Created At </strong></th>
        <th><strong> Actions </strong></th>

        @foreach ($posts as $post)
        <tr>
               

        
                

<td> {{ $post->title }} </td>
<td> {{ $post->user->name}} </td>
<td> {{ $post->created_at }} </td>
<td>    
<a href="#" ><button>View</button></a>
    <a href="#" ><button>Edit</button></a>
        <a href="#"><button>Delete</button></a>

@endforeach

        </tr>
        </table>

@endsection