@extends('shared._template_blog')
	@section('content')


	<div class="flash-message">
	    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	      @if(Session::has('alert-' . $msg))
	      	<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
	      @endif
	    @endforeach
	</div>
	<div class="row">
		@foreach($posts as $post)
		    <div class="col-6 col-md-4">
		      <div class="card1">
				  <img src="/img/test.svg" alt="capa" style="width:100%">
				  <div class="containe1r">
				    <p class="title1">{{ $post->title }}</p>
				    <p>{{ $post->description }}</p>

				    <table>
				    	<tr>Tags:</tr>
					    @foreach($post->tags as $tag)
						    <tr>
						        {{$tag->tag_name}}
						    </tr>
					    @endforeach
				    </table>
				   	<a href="{{ route('post.show', [ 'id' => $post->id ]) }}">
				    	<button>Ler mais</button>
				  	</a>
				  </div>
				</div>
		    </div>
		@endforeach
	</div>
@stop