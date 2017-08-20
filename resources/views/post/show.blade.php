@extends('shared._template_blog')
	@section('content')

	<h1>{{$post->title}}</h1>
	<em>Data de criação: {{$post->created_at->format('d/m/Y')}}</em>
	<div class="post-content">
		<div class="col-md-6">
			<img src="{{$post->image_path}}" alt="capa" style="width:90%; height: 50%;">
		</div>
		<p>{!! $post->description !!}</p>
		<table>
	    	<tr>Tags:</tr>
		    @foreach($post->tags as $tag)
			    <tr>
			        {{$tag->tag_name}}
			    </tr>
		    @endforeach
	    </table>
	</div>
@stop