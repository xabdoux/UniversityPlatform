@extends('enseignant.layouts.app')
@section('content')
@include('enseignant.includes.statistiques')
    <div class="row px-3">
    	<div class="col-md-12 gx-card mb-3 px-0">
        	<div class="gx-card-body p-0">
        		<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active hideAssignationBtn" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><strong>Publication</strong></a>
				    <a class="nav-item nav-link showAssignationBtn" id="showAssignationBtn" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Assignation</strong></a>
				  </div>
				</nav>
				<div class="tab-content p-4" id="nav-tabContent">
				    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				    	@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
				    	<form method="POST" action="{{ url('ajouterPublication', $user->id) }}" enctype="multipart/form-data">
				    		@csrf
				    		<input type="hidden" name="type" value="publication">
				    		<input type="hidden" name="publicationable_type" value="App\Classe">
				    		<div id="showAssignation" style="display: none;">
				    			<input type="text" class="form-control" placeholder="Titre de l´assignation" name="titre">
					  			<div class="row my-3">
									<div class="col-md-6">
										<input name="date_expiration" id="datepicker"/>
									</div>
									<div class="col-md-6 pt-2">
										<div class="custom-control custom-checkbox">
										    <input name="ferme" type="checkbox" class="custom-control-input" id="customControlValidation1">
										    <label class="custom-control-label" for="customControlValidation1">Bloquer cette assignation après la date limite</label>
										</div>
									</div>
								</div>
				    		</div>
			            	<textarea name="description" class="form-control" placeholder="Ecrivez votre message ici ..." style="height:100px" required></textarea>
			            	<select name="publicationable_id" class="form-control my-3" placeholder="Envoyer à ..." required>
							  	<option selected disabled hidden>Envoyer à ...</option>
							  	@foreach ($user->classes as $classe)
							  		<option value="{{$classe->id}}">
							  			{{$classe->nom}}
							  		</option>
							  	@endforeach
							</select>
							<div class="row">
								<div class="col-md-3">
									<div class="image-upload ml-3">
									    <label for="file-input">
									        <i class="fas fa-file-upload"></i>&nbsp;<strong> Joindre fichier</strong>

									    </label>
									    <p class="text-muted">Max size : 5MB</p>
									    <input id="file-input" type="file" name="pieces_jointes" />
									</div>
								</div>
								<div class="col-md-9">
				        			<button type="submit" class="btn btn-success float-right">Envoyer</button>
								</div>
							</div>
				        </form>
				    </div>
				</div>
        	</div>
        </div>
    </div>
    @if (count($user->publications) == 0)
    <div class="row px-3">
    	<div class="col-md-12 gx-card mb-3">
        	<div class="gx-card-body">
        		<div class="row">
					<div class="col-md-2 pl-3">
						<img src="images/nice.png" width="100%">
					</div>
					<div class="col-md-10">
						<h4>Commencez la conversation!</h4>
						<p>Découvrez le fonctionnement des discussions en classe en postant un message rapide ci-dessus. Par exemple, vous pouvez accueillir vos étudiants ou poser une question simple.</p>
					</div>
				</div>
        	</div>
        </div>
    </div>
    @endif
     <div class="row px-3">
     	 @include('enseignant.includes.publications')
    </div>
    @if (count($user->publications) > 3)
    <a href="{{ url('voirToutesPublication') }}">
    		<p class="text-center">
    		 Voir toutes les publications
    		 <i class="fas fa-angle-double-right"></i>
    		</p>
    </a>
    @endif
@endsection