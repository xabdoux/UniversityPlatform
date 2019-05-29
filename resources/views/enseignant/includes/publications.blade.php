@foreach ($user->publications->take(3) as $publication)
<div class="col-md-12 gx-card mb-3">
	<div class="gx-card-body">
		<div class="item-action dropdown col-1 float-right">
			<a href="#" data-toggle="dropdown" class="icon">
				<i class="fas fa-bars"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="{{ url('afficherPublication', $publication->id) }}" class="dropdown-item">
					<i class="fas fa-eye"></i>
					 Afficher
				</a>
				<a href="{{ url('modifierPublication', $publication->id) }}" class="dropdown-item">
					<i class="far fa-edit"></i>
					 Modifier
				</a>
				<a href="#" data-toggle="modal" data-target="#target{{$publication->id}}" data-whatever="@getbootstrap" class="dropdown-item" style="color: red">
					<i class="far fa-trash-alt"></i>
					 Supprimer
				</a>
			</div>
		</div> 
		<!-- Start Modal delete-->
    <div class="modal fade" id="target{{$publication->id}}" tabindex="-1" role="dialog" aria-labelledby="codeClasseModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content" style="background-color: transparent;border: 0;margin-top: 50%;">
		    	<div class="limiter">
					<div class="container-register100">
						<div class="wrap-register100">
							<button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
					        	<span aria-hidden="true">&times;</span>
					        </button>
							<div class="modal-body text-center text-danger">
								<i class="fas fa-exclamation-triangle"></i>
								Vous êtes au point de supprimer cette publication!
						    </div>
						    <div class="modal-footer text-center">
						        <form method="POST" action="{{ url('supprimerPublication', $publication->id) }}">@csrf
						        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:-110%;">
						        	Annuler
						        </button>
						        	<input type="submit" class="btn btn-success" value="Confirmer" style="margin-left: 50%;}"></input>
						        </form>
						    </div>
						</div>
					</div>
				</div>
		    </div>
        </div>
    </div>
    <!-- End Modal delete-->
		<div class="row">
			<div class="col-md-12">
				<div class="row align-items-center">
					<div class="col-1 card_style1 mb-0">
						<span class="avatar brround avatar-md d-block cover-image" data-image-src="{{$publication->user->profile->image}}" style="background: rgba(0, 0, 0, 0) url('{{ asset($publication->user->profile->image) }}') repeat scroll center center;"></span>
					</div>
					<div class="col-11">
						<a href="#" class="text-inherit">
							<strong>
							{{strtoupper($publication->user->last_name) }}
						    {{ucfirst($publication->user->first_name) }}
							</strong>
						</a>
						@if ($publication->publicationable_type == "App\Classe")
						<i class="fas fa-angle-right"></i>
						  <span style="color: blue"><b>Classe</b></span>
						<i class="fas fa-angle-right"></i>
						
						<a href="#" class="text-inherit">
							{{$publication->publicationable->nom}}
						</a>
						@elseif($publication->publicationable_type == "App\Module")
						<i class="fas fa-angle-right"></i>
						  <span style="color: green"><b>Module</b></span>
						<i class="fas fa-angle-right"></i>
						
						<a href="#" class="text-inherit">
							{{$publication->publicationable->classe->nom}}
						</a>
						<i class="fas fa-angle-right"></i>
						<a href="#" class="text-inherit">
							{{$publication->publicationable->nom}}
						</a>

						@endif
						
						@if ($publication->type == 'assignation')
								@if ($publication->date_expiration < date('Y-m-d H:i:s'))
							<div class="float-right text-dark">
								@if ($publication->ferme == 'on')
									<i class="fas fa-lock"></i>
									Fermé
								@else
									<i class="fas fa-lock-open"></i>
								    Reste ouvert
								@endif
							</div>	
							@elseif($publication->date_expiration->diffInDays(date('Y-m-d H:i:s')) < 2)
							<div class="float-right text-success">
								<i class="fas fa-hourglass-half"></i>
									Il reste moins d'un jour
							</div>
							@else
							<div class="float-right text-success">
								<i class="fas fa-hourglass-half"></i>
								 Il reste {{$publication->date_expiration->diffInDays(date('Y-m-d H:i:s'))}} jours
							</div>
							@endif
						@endif
						<p class="text-muted">
						 <a href="{{ url('afficherPublication', $publication->id) }}">
							{{$publication->created_at->format('F d, Y')}}
						 	at {{$publication->created_at->format('h:i A')}}
						 </a>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-12 mt-3">
				<div class="text-center text-dark">
					<h4>{{$publication->titre}}</h4>
				</div>
				<div class="text-center text-info">
					<h5>
						@if ($publication->date_expiration)
							
						<i class="far fa-calendar-check"></i>
						{{$publication->date_expiration->format('F d, Y')}}
						@endif
					</h5>
				</div>
				<p>{{$publication->description}}</p>
			</div>
			@if ($publication->pieces_jointe_id)
			<div class="col-md-12">
				<div class="alert alert-secondary py-0" role="alert">
					<div class="row align-items-center mt-3">
						<div class="col-1 card_style1 mb-0">
							<i class="far fa-file fa-3x"></i>
						</div>
						<div class="col-9">
							<h6><small>{{$publication->pieces_jointe->title}}</small></h6>
					  		<h6 class="text-inherit"><strong>{{strtoupper($publication->pieces_jointe->type) }}</strong></h6>
						</div>
						<div class="col-2">
							<a href="{{$publication->pieces_jointe->pieces_jointes}}"><i class="fas fa-download float-right mr-3" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Télécharger" ></i></a>
					  		<a href="#"><i class="fas fa-eye float-right mr-3" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Voir document"></i></a>
						</div>
					</div>
				</div>
			</div>
			@endif
			<div class="col-md-12">
				<hr>
				<div class="row align-items-center">
					<div class="col-12 card_style1 mb-0">
						@if (count($publication->commentaires) >= 2)
						<a href="{{ url('afficherPublication', $publication->id) }}">Voir plus de commentaires...</a>
						<p class="float-right">2 sur {{count($publication->commentaires)}}</p>
						@endif
					</div>
				</div>
				@if ($publication->type == 'publication')
					@include('enseignant.includes.publicationCommentaires')
				@elseif($publication->type == 'assignation')
					@include('enseignant.includes.assignationCommentaires')
				@endif
			</div>
		</div>
	</div>
</div>
	
@endforeach