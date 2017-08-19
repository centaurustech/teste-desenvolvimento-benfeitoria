@extends('shared._template_blog')
	@section('content')
		
		<div ng-controller="TagController">
			@if(!empty($errors->all()))
				<div class="row">
			        <div class="col-md-4 alert alert-danger">
			        O(s) campo(s) abaixo sao obrigatorios:
			            <ul>
			                @foreach($errors->all() as $error)
			                    <li>{{$error}}</li>
			                @endforeach
			            </ul>
			        </div>
			    </div>
			@endif	
			<fieldset>
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
								<select class="form-control" id="tags" multiple="true" name="tags[]" ng-model="tags.tags" >
									<option ng-repeat="tag in tags" value="@{{tag.id}}">@{{tag.tag_name}}</option>
								</select>
							</div>
							<div class="col-md-6">
								<span class="btn btn-primary btn-sm" ng-click="toggle('tags')">
									<span class="glyphicon glyphicon-tags"></span> CRIAR NOVA TAG
								</span>
							</div>
						</div>
														<div id="tagMsg"></div>

					</div>
					<button type="submit" class="btn btn-danger">Salvar</button>
				</form>
			</fieldset>


			<!-- MODAL  -->
			<div class="modal  fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true"	>
				<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <span type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">×</span>
				        </span>
				        <h4 class="modal-title" id="tagModalLabel"></h4>
				      </div>
				    	<div class="modal-body">
							<fieldset>
								<legend>
									Criar Tags
								</legend>
								@{{ tag_name}}
								<form name="frmTag">
									<input name="_token" type="hidden" value="{{ csrf_token() }}">
									<div class="form-group">
										<label for="exampleTextarea">Título</label>
										<input type="text" class="form-control" id="tag_name" name="tag_name" ng-model="tag.tag_name" />
									</div>
									<button type="submit" ng-click="save()" class="btn btn-danger">Salvar</button>
								</form>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	@stop