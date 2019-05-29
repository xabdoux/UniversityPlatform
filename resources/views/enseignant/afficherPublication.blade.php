<!doctype html>
<html lang="fr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

	<link href="{{ asset('auth/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
	<link href="{{ asset('js/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<!-- fontawesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- datepicker CSS -->
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<!-- meta tags -->
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link rel="shortcut icon" href="images/shortcut.png">

	<title></title>

</head>
<body class="page">
	<div class="container mt-3">
		<div class="row">
		    <div class="col-sm-12 col-md-3">
		    	<div class="gx-card mb-3">
		            <div class="gx-card-body p-0">
		                <div class="timeline-block">
		                    <div class="panel panel-default">
			                    <div class="profile-block">
				                    <div class="cover overlay cover-image-full">
				                        <img src="{{ asset('images/place1-full.jpg') }}" alt="cover">
				                        <div class="overlay overlay-full overlay-bg-black">
				                            <div class="v-top v-spacing-2">
				                                <a href="{{ url('/') }}" class="icon float-right">
				                                    <i class="fa fa-home"></i>
				                                </a>
				                                <div class="text-headline text-overlay">{{strtoupper(Auth::user()->last_name) }} {{ucfirst(Auth::user()->first_name) }}</div>
				                                <p class="text-overlay">{{strtoupper(Auth::user()->role) }}</p>
				                            </div>
				                            <div class="v-bottom">
				                                <img src='{{ asset($user->profile->image) }}' alt="user_img" class="img-circle avatar">
				                            </div>
				                        </div>
				                    </div>
				                    <div class="profile-icons">
				                        <span><i class="fa fa-users"></i> 372</span> 
				                        <span><i class="fa fa-users"></i> 43</span>
				                    </div>
				                    <div class="p-2">
				                        <ul class="group_list_profile py-2 mb-0">
				                        	<li><a href="#"><i class="fas fa-envelope"></i> Messages <span class="gx-badge gx-mb-0 gx-text-white gx-badge-red float-right mr-2">12</span></a></li>
				                        	<li><a href="#"><i class="fas fa-tasks"></i> Tâches à accomplir <span class="gx-badge gx-mb-0 gx-text-white gx-badge-orange float-right mr-2">7</span></a></li>
				                        	<li><a href="#"><i class="fas fa-calendar-alt"></i> <span>Emploi de temps</a></li>
				                        	<li><a href="#"><i class="fas fa-cogs"></i> Configuration</a></li>
				                        	<li><a href="{{ route('logout') }}"
                                       			   onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Déconnexion</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
				                        </ul>
				                        
				                    </div>
				                </div>
		                    </div>
		                </div>
				    </div>
				</div>
				<div class="gx-card mb-3">
		            <div class="gx-card-body p-0">
		            	<div class="card_style1"> 
							<div class="card-header">
								<h3 class="card-title col-11">Classes</h3>
								<div class="item-action dropdown col-1">
									<a href="#" data-toggle="dropdown" class="icon"><i class="fas fa-ellipsis-h"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="far fa-edit"></i> Gérer les classes</a>
										<a   data-toggle="modal" data-target="#Modal_code_classe" data-whatever="@getbootstrap" class="dropdown-item"><i class="fas fa-sign-in-alt"></i> Rejoindre une classe</a>
									</div>
								</div> 
							</div>
							<div class="card-body o-auto team"> 
								<ul class="list-unstyled list-separated"> 
									@if (count($user->classes) == 0)
										<img src="{{ asset('images/empty-box.png') }}" style="position: absolute;
										top: 50%;
									    left: 50%;
									    transform: translate(-50%, -50%);
									    width: 50%;">
									@endif
									@foreach ($user->classes as $classe)
									<li class="list-separated-item">
										<div class="row align-items-center">
											<div class="col-12">
												<div>
													<a class="text-inherit" data-toggle="collapse" href="#classe{{$classe->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-angle-double-right"></i> {{$classe->nom}} | {{$classe->promotion}}</a>
													<a href="#">
														<i class="fas fa-info-circle float-right" style="font-size: 20px;"></i>
													</a>
												</div>

												
												<div class="collapse" id="classe{{$classe->id}}">
													@if (count($classe->modules) > 0)
														@foreach ($classe->modules as $module)
															@if ($module->enseignant_id == $user->id)
															<div>
																<a href="#" class="text-inherit ml-3"><i class="fas fa-angle-right"></i> {{$module->nom}}</a>
															</div>
															@endif
														@endforeach
													@else
															<div>
																<a href="#" class="text-inherit ml-3"><i class="fas fa-plus-circle"></i> Créer un module</a>
															</div>
													@endif
												</div>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
		            </div>
		        </div>
		        <div class="gx-card mb-3">
		            <div class="gx-card-body p-0">
		            	<div class="card_style1"> 
							<div class="card-header">
								<h3 class="card-title col-11">Encadrement</h3>
								<div class="item-action dropdown col-1">
									<a href="#" data-toggle="dropdown" class="icon"><i class="fas fa-ellipsis-h"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="far fa-edit"></i> Gérer les encadrement</a>
									</div>
								</div> 
							</div>
							<div class="card-body o-auto team"> 
								<ul class="list-unstyled list-separated"> 
									@if (count($user->encadrements) == 0)
										<img src="{{ asset('images/empty-box.png') }}" style="position: absolute;
										top: 50%;
									    left: 50%;
									    transform: translate(-50%, -50%);
									    width: 50%;">
									@endif
									@foreach ($user->encadrements as $etudiant)
									<li class="list-separated-item">
										<div class="row align-items-center">
											<div class="col-3">
												<span class="avatar brround avatar-md d-block cover-image" data-image-src="{{$etudiant->profile->image}}" style="background: rgba(0, 0, 0, 0) url('{{$etudiant->profile->image}}') repeat scroll center center;"></span>
											</div>
											<div class="col-9">
												<div>
													<a href="#" class="text-inherit">{{strtoupper($etudiant->last_name) }} {{ucfirst($etudiant->first_name) }}</a>
												</div>
												<small class="d-block item-except text-sm text-muted h-1x">
													{{$etudiant->classes[0]->nom}} | {{$etudiant->classes[0]->promotion}}
												</small>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
		            </div>
		        </div>
		        <div class="gx-card mb-3">
		            <div class="gx-card-body p-0">
		            	<div class="card_style1"> 
							<div class="card-header">
								<h3 class="card-title col-11">Support</h3>
							</div>
							<div class="card-body o-auto"> 
								<ul class="list-unstyled list-separated"> 
									<li class="list-separated-item">
										<div class="row align-items-center ml-3">
											<div class="col-12">
												<a href="#" class="text-inherit"><i class="fas fa-user-shield mr-1"></i> Administration</a>
											</div>
										</div>
									</li>
									<li class="list-separated-item">
										<div class="row align-items-center ml-3">
											<div class="col-12">
												<a href="#" class="text-inherit"><i class="fas fa-user-cog mr-1"></i> Support technique</a>
											</div>
										</div>
									</li>
									
								</ul>
							</div>
						</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-sm-12 col-md-9">
		         <div class="row px-3">
		         	 <div class="col-md-12 gx-card mb-3">
						<div class="gx-card-body">
							<div class="item-action dropdown col-1 float-right">
								<a href="#" data-toggle="dropdown" class="icon">
									<i class="fas fa-bars"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
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
											<p class="text-muted">{{$publication->created_at->format('F d, Y')}} at {{$publication->created_at->format('h:i A')}}</p>
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
									@if ($publication->type == 'publication')
										@foreach ($publication->commentaires as $commentaire)
										<div class="row align-items-center mt-3" style="background-color: #f8f2ff;border-radius: 25px;">
											<div class="col-1 card_style1 mb-0">
												<span class="avatar brround avatar-md d-block cover-image" data-image-src="{{ asset($commentaire->user->profile->image) }}" style="background: rgba(0, 0, 0, 0) url('{{ asset($commentaire->user->profile->image) }}') repeat scroll center center;"></span>
											</div>
											<div class="col-11">
												
												<p class="float-right" style="font-size: 11px;">
													<span class="float-right">
												{{$publication->created_at->format('F d, Y')}} at
												 {{$publication->created_at->format('h:i A')}}
												 </span>
												</p>
												<a href="#" class="text-inherit">
													<strong style="color: #546cab;">
														{{strtoupper($commentaire->user->last_name) }}
														{{ucfirst($commentaire->user->first_name) }}
													</strong>
														@if ($commentaire->user->role != 'etudiant')
															<i class="fas fa-check-circle text-success" title="Badge {{$commentaire->user->role}}" style="color:black"></i>
														@endif
												</a>
												<p>{{$commentaire->description}}</p>
											</div>
										</div>
										@endforeach
										<div class="row align-items-center mt-3">
											<div class="col-1 card_style1 mb-0">
												<span class="avatar brround avatar-md d-block cover-image" data-image-src="{{ asset(Auth::user()->profile->image) }}" style="background: rgba(0, 0, 0, 0) url('{{ asset(Auth::user()->profile->image) }}') repeat scroll center center;"></span>
											</div>
											<div class="col-11">
												<form action="{{ url('ajouterCommentaire', $publication->id) }}" method="POST">
													@csrf
													<input type="text" class="form-control" placeholder="Ecrire un commentaire..." name="description" required>
												</form>
											</div>
										</div>
									@elseif($publication->type == 'assignation')
									@foreach ($publication->commentaires as $commentaire)
									<div class="row align-items-center mt-3" style="background-color: #f8f2ff;border-radius: 25px;">
										<div class="col-1 card_style1 mb-0">
											<span class="avatar brround avatar-md d-block cover-image" data-image-src="{{ asset($commentaire->user->profile->image) }}" style="background: rgba(0, 0, 0, 0) url('{{ asset($commentaire->user->profile->image) }}') repeat scroll center center;"></span>
										</div>
										<div class="col-11">
											
											<p class="float-right" style="font-size: 11px;">
												<span class="float-right">
											{{$publication->created_at->format('F d, Y')}} at
											 {{$publication->created_at->format('h:i A')}}
											 </span>
											</p>
											<a href="#" class="text-inherit">
												<strong style="color: #546cab;">
													{{strtoupper($commentaire->user->last_name) }}
													{{ucfirst($commentaire->user->first_name) }}
												</strong>
													@if ($commentaire->user->role != 'etudiant')
														<i class="fas fa-check-circle text-success" title="Badge {{$commentaire->user->role}}" style="color:black"></i>
													@endif
											</a>
											<p class="mb-0">{{$commentaire->description}}</p>
											<p>
												@if ($commentaire->pieces_jointe)
												  <a href="{{ asset($commentaire->pieces_jointe->pieces_jointes) }}" style="color: #128d0f">
													<i class="fas fa-file-download"></i>
														{{$commentaire->pieces_jointe->title}}
												  </a>
												@endif
												
											</p>
										</div>
									</div>
									@endforeach
									<div class="row align-items-center mt-3">
										@if ($publication->ferme == 'on' AND $publication->date_expiration < date('Y-m-d H:i:s'))
											<div class="alert alert-dark col-12 text-center" role="alert">
												<i class="fas fa-lock"></i>
											  Les commentaires sont fermés
											</div>
										@else
										<div class="col-1 card_style1 mb-0">
											<span class="avatar brround avatar-md d-block cover-image" data-image-src="{{ asset(Auth::user()->profile->image) }}" style="background: rgba(0, 0, 0, 0) url('{{ asset(Auth::user()->profile->image) }}') repeat scroll center center;"></span>
										</div>

										<style type="text/css">
									.upload-btn-wrapper {
									  position: relative;
									  overflow: hidden;
									  display: inline-block;
									}

									.btnUpload {
									  border: 2px solid gray;
									  color: gray;
									  background-color: white;
									  padding: 2px 10px;
									  border-radius: 8px;
									  font-size: 20px;
									  font-weight: bold;
									}

									.upload-btn-wrapper input[type=file] {
									  font-size: 100px;
									  position: absolute;
									  left: 0;
									  top: 0;
									  opacity: 0;
									}
										</style>
										<div class="col-11">
											<form action="{{ url('ajouterCommentaire', $publication->id) }}" method="POST" enctype="multipart/form-data">
												@csrf
											<div class="row">
												<div class="col-11" style="margin-left: -10px;">
													<input type="text" class="form-control " placeholder="Ecrire un commentaire..." name="description" required>
												</div>
												<div class="col-1">
													<div class="upload-btn-wrapper">
													  <button class="btnUpload"><i class="fas fa-file-upload"></i></button>
													  <input type="file" name="pieces_jointes" />
													</div>
												</div>
											</div>
											</form>
										</div>
										@endif
									</div>										
									@endif
								</div>
							</div>
						</div>
					</div>
		        </div>
		    </div>
		    <div class="col-md-12">
		    	<div class="row px-3">
                	<div class="col-md-12 gx-card mb-0" style="border-bottom-left-radius: 0;border-bottom-right-radius: 0;">
		            	<div class="gx-card-body p-2">
		            		<div class="row">
								<div class="col-md-12 text-center">
									<small class="d-block item-except text-sm text-muted h-1x bold">Copyright 2019 © SYSTÈME GESTION FSJES | Tous les droits sont réservés | Créé par MSI 2019-2020</small>
								</div>
							</div>
		            	</div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>

	<!-- Start Modal Enseignant-->
    <div class="modal fade" id="Modal_code_classe" tabindex="-1" role="dialog" aria-labelledby="codeClasseModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content" style="background-color: transparent;border: 0;">
		    	<div class="limiter">
					<div class="container-register100">
						<div class="wrap-register100">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        	<span aria-hidden="true">&times;</span>
					        </button>
							<div class="register100-form-title" style="background-image: url(images/bg-01.jpg);">
								<span class="register100-form-title-1">
									<h5 class="card-category">Rejoindre une classe</h5>
								</span>
							</div>
							<div class="modal-body">
						        <form method="POST" action="{{ url('rejoindreClasse', $user->id) }}"> 
						        	@csrf
						        	<div class="form-group">
						            	<label for="code_classe" class="col-form-label">
						            		<strong>Code de classe:</strong>
						            		<a href="#" data-toggle="popover" data-placement="top" data-content="Obtenez un code du classe à 6 chiffres de votre Coordinateur."><i class="far fa-question-circle"></i></a>
										</label>
						            	<input type="text" name="code_acces" class="form-control" id="code_classe" required>
						          	</div>
						        
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
						        <input type="submit" class="btn btn-success" value="Envoyer"></input>
						    </div>
						    </form>
						</div>
					</div>
				</div>
		    </div>
        </div>
    </div>
    <!-- End Modal Enseignant-->
    

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 

    $('#showAssignationBtn').click(function(){
    	$("#showAssignation").show();
    	$('input[name=type]').val('assignation');
    	$('input[name=titre]').attr('required', true);
    	$('input[name=date_expiration]').attr('required', true);
    }); 
    $('.hideAssignationBtn').click(function(){
    	$("#showAssignation").hide();
    	$('input[name=type]').val('publication');
    	$('input[name=titre]').removeAttr('required');
    	$('input[name=date_expiration]').removeAttr('required');

    });  
});
</script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
</script>

    @if (session()->has('error'))
  <script src="{{ asset('auth/toast-master/js/jquery.toast.js') }}"></script>
  <script type="text/javascript">

    	
     $(document).ready(function () {
     	//this Notification is for any errors
     		$.toast({
		        heading: 	'Error d\'inscription'
		        , text: 	 '{{session()->get('error')}}'
		        , position: 'bottom-right'
		        , loaderBg: '#fff'
		        , icon: 	'error'
		        , hideAfter: 6000 //set to false to remove it manually
		        , stack: 6
		    })
     	
 
    }); 
     </script>

@endif
@if (session()->has('successPost'))
  <script src="{{ asset('auth/toast-master/js/jquery.toast.js') }}"></script>
  <script type="text/javascript">

    	
     $(document).ready(function () {
     	//this Notification is for any errors
     		$.toast({
		        heading: 	'Succès'
		        , text: 	 '{{session()->get('successPost')}}'
		        , position: 'bottom-right'
		        , loaderBg: '#fff'
		        , icon: 	'success'
		        , hideAfter: 6000 //set to false to remove it manually
		        , stack: 6
		    })
     	
 
    }); 
     </script>

@endif
@if(session()->has('success'))
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

    <script>
        swal('Succès!', "{{session()->get('success')}}", 'success');
    </script>
@endif 
</body>
</html>
