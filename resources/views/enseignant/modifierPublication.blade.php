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
				                                <img src="{{ asset($user->profile->image) }}" alt="user_img" class="img-circle avatar">
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
												<span class="avatar brround avatar-md d-block cover-image" data-image-src="{{ asset($etudiant->profile->image) }}" style="background: rgba(0, 0, 0, 0) url('{{ asset($etudiant->profile->image) }}') repeat scroll center center;"></span>
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
                	<div class="col-md-12 gx-card mb-3 px-0">
		            	<div class="gx-card-body p-0">
		            		<nav>
							  <div class="nav nav-tabs" id="nav-tab" role="tablist">
							    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
								    <strong>
								    <i class="far fa-edit"></i>
								    Modifier la publication
									</strong>
								</a>
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
									@if ($publication->type == "assignation")
									
							    	<form method="POST" action="{{ url('modifierPublication', $publication->id) }}" enctype="multipart/form-data">
							    		@csrf
							    		<input type="hidden" name="type" value="{{$publication->type}}">
							    		<input type="hidden" name="publicationable_type" value="{{$publication->publicationable_type}}">
							    		<input type="text" class="form-control" placeholder="Titre de l´assignation" name="titre" value="{{$publication->titre}}">
							  			<div class="row my-3">
											<div class="col-md-6">
												<input id="datepicker" name="date_expiration" value="{{$publication->date_expiration->format('Y-m-d')}}" />
											</div>
											<div class="col-md-6 pt-2">
												<div class="custom-control custom-checkbox">
												    <input type="checkbox" name="ferme" class="custom-control-input" id="customControlValidation1" {{$publication->ferme ? 'checked':''}}>
												    <label class="custom-control-label" for="customControlValidation1">Bloquer cette assignation après la date limite</label>
												</div>
											</div>
										</div>
						            	<textarea name="description" name="description" class="form-control" placeholder="Ecrivez votre message ici ..." style="height:100px" required>{{ $publication->description }}
						            	</textarea>
						            	<select name="publicationable_id" class="form-control my-3" placeholder="Envoyer à ..." required>
										  	@foreach ($user->classes as $classe)
										  		<option value="{{$classe->id}}" {{$publication->publicationable_id == $classe->id ? 'selected':''}}>
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
											<div class="col-md-12">
												@if ($publication->pieces_jointe_id)
													
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
		
													@endif
											<div class="col-md-12">
							        			<button type="submit" class="btn btn-success float-right">Mettre à jour</button>
											</div>
										</div>
							        </form>
							        @else
							    	<form method="POST" action="{{ url('modifierPublication', $publication->id) }}" enctype="multipart/form-data">
							    		@csrf
							    		<input type="hidden" name="type" value="{{$publication->type}}">
							    		<input type="hidden" name="publicationable_type" value="{{$publication->publicationable_type}}">
						            	<textarea name="description" class="form-control" style="height:100px" required>{{$publication->description}}</textarea>
						            	<select name="publicationable_id" class="form-control my-3" placeholder="Envoyer à ..." required>
										  	@foreach ($user->classes as $classe)
										  		<option value="{{$classe->id}}" {{$classe->id == $publication->publicationable_id ? 'selected':''}}>
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
											<div class="col-md-12">
												@if ($publication->pieces_jointe_id)
													
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
		
													@endif
											<div class="col-md-12">
							        			<button type="submit" class="btn btn-success float-right">Mettre à jour</button>
											</div>
										</div>
							        </form>

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
});
</script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd ',
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
