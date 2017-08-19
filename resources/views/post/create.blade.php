@extends('shared._template_blog')
	@section('content')
		<fieldset  ng-controller="AdminController" >
		<legend>Criar novo post</legend>
			<form method="post" action="{{ action('Post\PostController@save') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
				<input name="_token" type="hidden" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="exampleTextarea">Título</label>
					<input type="text" class="form-control" id="title" name="title" />
				</div>
				<div class="form-group">
					<label for="exampleTextarea">Descrição</label>
					<textarea class="form-control" id="description" name="description" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label for="cover">Escolher imagem</label>
					<input type="file" class="form-control-file" id="cover" name="cover" aria-describedby="fileHelp">
				</div>
				

				<div class="form-group">
					<label for="">Adicionar Tags</label>
					<div class="row">
						<div class="col-md-6">
							<select class="form-control" id="tags" multiple="true" name="tags[]">
								<option>Service 1</option>
								<option>Service 2</option>
							</select>
						</div>
						<div class="col-md-6">
							<span class="btn btn-primary btn-sm" ng-click="toggle('tags')">
								<span class="glyphicon glyphicon-tags"></span> CRIAR NOVA TAG
							</span>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-danger">Salvar</button>
			</form>
		</fieldset>


		<!-- MODAL  -->
		<div class="modal  fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true"	>
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		        <h4 class="modal-title" id="tagModalLabel"></h4>
		      </div>
		    	<div class="modal-body">
					
				</div>
			</div>
		</div>
	@stop