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



    <h1>Posts Data</h1> <a href="/posts/create" ><button class="btn-success">Create Post</button></a>
        <table class="table table-striped">
        <th><strong> Post Title </strong></th>
        <th><strong> Posted By </strong></th>
        <th><strong> Created At </strong></th>
        <th><strong> Actions </strong></th>

        @foreach ($posts as $post)
        <tr>
<td> {{ $post->title }} </td>
<td> {{ $post->user->name}} </td>s
<td> {{ date('M j, Y', strtotime( $post->created_at )) }} </td>
<td>    
<a href="/posts/view/{{ $post->id }}" ><button class="btn-primary">View</button></a>
    <a href="/posts/edit/{{ $post->id }}" ><button class="btn-warning">Edit</button></a>

    <form action="/posts/delete/{{$post->id}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?')" value="Delete"/>Delete</button>
            </form>

@endforeach

        </tr>
        </table>
        {{ $posts->links() }}
@endsection