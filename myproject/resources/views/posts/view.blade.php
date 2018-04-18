@extends('layouts.app')
@section('content')


<div class="blog-header">
<h1>Post Details<h1>
        <h2 class="blog-title">{{ $post->title }}</h2>
        <p>{{ date('M j, Y', strtotime( $post->created_at )) }} </p>
    </div>
    
    <div class="row">
        <div class="col-sm-8 blog-main">
            
            <div class="blog-content">
                {{$post->description}}
            </div><!-- /.blog-post -->
            
           

        </div><!-- /.blog-main -->
        
        
    </div><!-- /.row -->
<h1>User informaion</h1>
<div> 
created By : {{ $post->user->name}}
<br>
E-mail : {{ $post->user->email}}

</div>

@endsection