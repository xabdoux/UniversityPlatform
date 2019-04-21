<!doctype html>
<html lang="fr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('auth/bootstrap/css/bootstrap.min.css') }}">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
	<!-- fontawesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	{{-- Error Notification Css --}}
	<link href="{{ asset('auth/toast-master/css/jquery.toast.css') }}" rel="stylesheet">

	<!-- meta tags -->
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link rel="shortcut icon" href="{{ asset('auth/images/shortcut.png') }}">

	<title></title>

</head>
<body class="register_page">
	<div class="container-fluid">
        <div class="register-wrapper row">
            <div id="register" class="register registerpage offset-lg-3 offset-md-3 offset-sm-3 offset-xs-0 col-xs-12 col-sm-6 col-lg-6" style="margin-top: 100px;">    
                <div class="register-form-header">
                     <div class="register-header">
                         <h4 class="bold color-white">Enseigner plus. En savoir plus. Utilisez la technologie pour rejoindre le futur!</h4>
                         <h4><center><small>Créez votre compte</small></center></h4>
                     </div>
                </div>
               
                <div class="box register">

                    <div class="content-body" style="padding-top:30px">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            	<a  data-toggle="modal" data-target="#Modal_register_enseignant" data-whatever="@getbootstrap">
				                    <div class="card card-stats one">
				                        <div class="card-header card-header-warning card-header-icon">
				                            <div class="card-icon">
				                                <i class="fas fa-user-tie"></i>
				                            </div>
				                            <p class="card-category">Je suis un</p>
				                            <h4 class="card-title">Enseignant</h4>
				                        </div>
				                    </div>
				                </a>
			                </div>
			                <div class="col-lg-6 col-md-6 col-sm-12">
			                	<a  data-toggle="modal" data-target="#Modal_register_etudiant" data-whatever="@getbootstrap">
				                    <div class="card card-stats two">
				                        <div class="card-header card-header-warning card-header-icon">
				                            <div class="card-icon">
				                                <i class="fas fa-user-graduate"></i>
				                            </div>
				                            <p class="card-category">Je suis un</p>
				                            <h4 class="card-title">Etudiant</h4>
				                        </div>
				                    </div>
				                </a>
			                </div>
			                <div class="col-lg-6 col-md-6 col-sm-12">
			                	<a  data-toggle="modal" data-target="#Modal_register_coordinateur" data-whatever="@getbootstrap">
				                    <div class="card card-stats three">
				                        <div class="card-header card-header-warning card-header-icon">
				                            <div class="card-icon">
				                                <i class="fas fa-user-check"></i>
				                            </div>
				                            <p class="card-category">Je suis un</p>
				                            <h5 class="card-title">Coordinateur</h5>
				                        </div>
				                    </div>
			                    </a>
			                </div>
			                <div class="col-lg-6 col-md-6 col-sm-12">
			                	<a  data-toggle="modal" data-target="#Modal_register_administrateur" data-whatever="@getbootstrap">
				                    <div class="card card-stats four">
				                        <div class="card-header card-header-warning card-header-icon">
				                            <div class="card-icon">
				                                <i class="fas fa-user-shield"></i>
				                            </div>
				                            <p class="card-category">Je suis un</p>
				                            <h5 class="card-title">Administrateur</h5>
				                        </div>
				                    </div>
			                    </a>
			                </div>
                        </div>
                        <p id="nav">
		                    <a href="{{ url('login') }}" class="float-right mb-3" title="S´identifier">S´identifier</a>
		                </p>

                    </div>
                </div>

                
            </div>
        </div>
    </div>

    <!-- Start Modal Enseignant-->
    <div class="modal fade" id="Modal_register_enseignant" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content" style="background-color: transparent;border: 0;">
		    	<div class="limiter">
					<div class="container-register100">
						<div class="wrap-register100">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        	<span aria-hidden="true">&times;</span>
					        </button>
							<div class="register100-form-title" style="background-image: url({{ asset('auth/images/bg-01.jpg') }});">
								<span class="register100-form-title-1">
									<h5 class="card-category">Créer mon compte</h5>
				                    <p class="card-title">Enseignant</p>
								</span>
							</div>
							<div class="modal-body">
						        <form method="POST" action="{{ route('register') }}" data-toggle="validator">
						        	@csrf
						        	<input type="hidden" name="role" value="enseignant">
						        	<div class="row">
							          	<div class="form-group col-6">
							            	<label for="last_name_ens" class="col-form-label"><strong>Nom:</strong></label>
							            	<input type="text" name="last_name_en" class="form-control {{ $errors->has('last_name_en') ? ' is-invalid' : '' }}" value="{{old('last_name_en')}}" id="last_name_en" data-minlength="3" required>
							            	{{-- show errors if any --}}
							            	<div class="help-block with-errors"></div>
							            	@if ($errors->has('last_name_en'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('last_name_en') }}</strong>
			                                    </span>
			                                @endif
							          	</div>
							          	<div class="form-group col-6">
							            	<label for="first_name_en" class="col-form-label"><strong>Prénom:</strong></label>
							            	<input type="text" name="first_name_en" class="form-control {{ $errors->has('first_name_en') ? ' is-invalid' : '' }}" value="{{old('first_name_en')}}" id="first_name_en" data-minlength="3" required>
							            	{{-- show errors if any --}}
							            	<div class="help-block with-errors"></div>
							            	@if ($errors->has('first_name_en'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('first_name_en') }}</strong>
			                                    </span>
			                                @endif
							          	</div>
						            </div>
						            <div class="form-group">
						            	<label for="email" class="col-form-label"><strong>Email:</strong></label>
						            	<input type="email" name="email_en" class="form-control {{ $errors->has('email_en') ? ' is-invalid' : '' }}" value="{{old('email_en')}}" id="email_en" required>
						            	{{-- show errors if any --}}
							            <div class="help-block with-errors"></div>
						            	@if ($errors->has('email_en'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('email_en') }}</strong>
		                                    </span>
		                                @endif
						          	</div>
						          	<div class="row">
							          	<div class="form-group col-6">
							            	<label for="passe-text" class="col-form-label"><strong>Mot de passe:</strong></label>
						            	<input type="password" name="password_en" id="Password_en" class="form-control {{ $errors->has('password_en') ? ' is-invalid' : '' }}" data-minlength="8" required>
						            	{{-- show errors if any --}}
                          			    <div class="help-block with-errors"></div>
						            	@if ($errors->has('password_en'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('password_en') }}</strong>
		                                    </span>
		                                @endif
							          	</div>
							          	<div class="form-group col-6">
							            	<label for="passe-repeat-text" class="col-form-label"><strong>Répéter le mot de passe:</strong></label>
							            	<input type="password" name="password_en_confirmation" class="form-control" data-match="#Password_en" required>
                          				    <div class="help-block with-errors"></div>
							          	</div>
						            </div>
						        
						        <p><strong>En vous inscrivant, vous acceptez nos <a href="#" class="register_a">conditions d'utilisation</a> et notre <a href="#" class="register_a">politique de confidentialité.</a></strong></p>
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
						        <button type="submit" class="btn btn-success">S'inscrire</button>
						    </div>
						    </form>
						</div>
					</div>
				</div>
		    </div>
        </div>
    </div>
    <!-- End Modal Enseignant-->

    <!-- Start Modal Etudiant-->
    <div class="modal fade" id="Modal_register_etudiant" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content" style="background-color: transparent;border: 0;">
		    	<div class="limiter">
					<div class="container-register100">
						<div class="wrap-register100">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        	<span aria-hidden="true">&times;</span>
					        </button>
							<div class="register100-form-title" style="background-image: url({{ asset('auth/images/bg-01.jpg') }});">
								<span class="register100-form-title-1">
									<h5 class="card-category">Créer mon compte</h5>
				                    <p class="card-title">Etudiant</p>
								</span>
							</div>
							<div class="modal-body">
						        <form method="POST" data-toggle="validator" action="{{ route('register') }}">
						        	@csrf
						        	<input type="hidden" name="role" value="etudiant">
						        	<div class="row">
							          	<div class="form-group col-6">
							            	<label for="last_name_et" class="col-form-label"><strong>Nom:</strong></label>
							            	<input type="text" name="last_name_et" class="form-control {{ $errors->has('last_name_et') ? ' is-invalid' : '' }}" value="{{old('last_name_et')}}" id="last_name_et" data-minlength="3" required>
							            	{{-- show errors if any --}}
							            	<div class="help-block with-errors"></div>
							            	@if ($errors->has('last_name_et'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('last_name_et') }}</strong>
			                                    </span>
			                                @endif
							          	</div>
							          	<div class="form-group col-6">
							            	<label for="first_name_et" class="col-form-label"><strong>Prénom:</strong></label>
							            	<input type="text" name="first_name_et" class="form-control {{ $errors->has('first_name_et') ? ' is-invalid' : '' }}" value="{{old('first_name_et')}}" id="first_name_et" data-minlength="3" required>
							            	{{-- show errors if any --}}
							            	<div class="help-block with-errors"></div>
							            	@if ($errors->has('first_name_et'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('first_name_et') }}</strong>
			                                    </span>
			                                @endif
							          	</div>
						            </div>
						            <div class="form-group">
						            	<label for="email" class="col-form-label"><strong>Email:</strong></label>
						            	<input type="email" name="email_et" class="form-control {{ $errors->has('email_et') ? ' is-invalid' : '' }}" value="{{old('email_et')}}" id="email_et" required>
						            	{{-- show errors if any --}}
						            	<div class="help-block with-errors"></div>
						            	@if ($errors->has('email_et'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('email_et') }}</strong>
		                                    </span>
		                                @endif
						          	</div>
						          	<div class="row">
							          	<div class="form-group col-6">
							            	<label for="passe-text" class="col-form-label"><strong>Mot de passe:</strong></label>
						            	<input type="password" name="password_et" id="Password_et" class="form-control {{ $errors->has('password_et') ? ' is-invalid' : '' }}" data-minlength="8" required>
						            	{{-- show errors if any --}}
						            	<div class="help-block with-errors"></div>
						            	@if ($errors->has('password_et'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('password_et') }}</strong>
		                                    </span>
		                                @endif
							          	</div>
							          	<div class="form-group col-6">
							            	<label for="passe-repeat-text" class="col-form-label"><strong>Répéter le mot de passe:</strong></label>
							            	<input type="password" name="password_et_confirmation" class="form-control" data-match="#Password_et" required>
							            	<div class="help-block with-errors"></div>
							          	</div>
						            </div>
						        
						        <p><strong>En vous inscrivant, vous acceptez nos <a href="#" class="register_a">conditions d'utilisation</a> et notre <a href="#" class="register_a">politique de confidentialité.</a></strong></p>
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
						        <button type="submit" class="btn btn-success">S'inscrire</button>
						    </div>
						    </form>
						</div>
					</div>
				</div>
		    </div>
        </div>
    </div>
    <!-- End Modal Etudiant-->

    <!-- Start Modal Coordinateur-->
    <div class="modal fade" id="Modal_register_coordinateur" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content" style="background-color: transparent;border: 0;">
		    	<div class="limiter">
					<div class="container-register100">
						<div class="wrap-register100">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        	<span aria-hidden="true">&times;</span>
					        </button>
							<div class="register100-form-title" style="background-image: url({{ asset('auth/images/bg-01.jpg') }});">
								<span class="register100-form-title-1">
									<h5 class="card-category">Créer mon compte</h5>
				                    <p class="card-title">Coordinateur</p>
								</span>
							</div>
							<div class="modal-body">
						        <form method="POST" data-toggle="validator" action="{{ route('register') }}">
						        	@csrf
						        	<input type="hidden" name="role" value="coordinateur">
						        	<div class="row">
							          	<div class="form-group col-6">
							            	<label for="last_name_co" class="col-form-label"><strong>Nom:</strong></label>
							            	<input type="text" name="last_name_co" class="form-control {{ $errors->has('last_name_co') ? ' is-invalid' : '' }}" value="{{old('last_name_co')}}" id="last_name_co" data-minlength="3" required>
							            	{{-- show errors if any --}}
							            	<div class="help-block with-errors"></div>
							            	@if ($errors->has('last_name_co'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('last_name_co') }}</strong>
			                                    </span>
			                                @endif
							          	</div>
							          	<div class="form-group col-6">
							            	<label for="first_name_co" class="col-form-label"><strong>Prénom:</strong></label>
							            	<input type="text" name="first_name_co" class="form-control {{ $errors->has('first_name_co') ? ' is-invalid' : '' }}" value="{{old('first_name_co')}}" id="first_name_co" data-minlength="3" required>
							            	{{-- show errors if any --}}
							            	<div class="help-block with-errors"></div>
							            	@if ($errors->has('first_name_co'))
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $errors->first('first_name_co') }}</strong>
			                                    </span>
			                                @endif
							          	</div>
						            </div>
						            <div class="form-group">
						            	<label for="email" class="col-form-label"><strong>Email:</strong></label>
						            	<input type="email" name="email_co" class="form-control {{ $errors->has('email_co') ? ' is-invalid' : '' }}" value="{{old('email_co')}}" id="email_co" required>
						            	{{-- show errors if any --}}
						            	<div class="help-block with-errors"></div>
						            	@if ($errors->has('email_co'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('email_co') }}</strong>
		                                    </span>
		                                @endif
						          	</div>
						          	<div class="row">
							          	<div class="form-group col-6">
							            	<label for="passe-text" class="col-form-label"><strong>Mot de passe:</strong></label>
						            	<input type="password" name="password_co" id="Password_co" class="form-control {{ $errors->has('password_co') ? ' is-invalid' : '' }}" data-minlength="8" required>
						            	{{-- show errors if any --}}
						            	<div class="help-block with-errors"></div>
						            	@if ($errors->has('password_co'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('password_co') }}</strong>
		                                    </span>
		                                @endif
							          	</div>
							          	<div class="form-group col-6">
							            	<label for="passe-repeat-text" class="col-form-label"><strong>Répéter le mot de passe:</strong></label>
							            	<input type="password" name="password_co_confirmation" class="form-control" data-match="#Password_co" required>
							            	<div class="help-block with-errors"></div>
							          	</div>
						            </div>
						        
						        <p><strong>En vous inscrivant, vous acceptez nos <a href="#" class="register_a">conditions d'utilisation</a> et notre <a href="#" class="register_a">politique de confidentialité.</a></strong></p>
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
						        <button type="submit" class="btn btn-success">S'inscrire</button>
						    </div>
						    </form>
						</div>
					</div>
				</div>
		    </div>
        </div>
    </div>
    <!-- End Modal Coordinateur-->

    <!-- Start Modal Administrateur-->
    <div class="modal fade" id="Modal_register_administrateur" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content" style="background-color: transparent;border: 0;">
		    	<div class="limiter">
					<div class="container-register100">
						<div class="wrap-register100">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        	<span aria-hidden="true">&times;</span>
					        </button>
							<div class="register100-form-title" style="background-image: url({{ asset('auth/images/bg-01.jpg') }});">
								<span class="register100-form-title-1">
									<h5 class="card-category">Créer mon compte</h5>
				                    <p class="card-title">Administrateur</p>
								</span>
							</div>
							<div class="modal-body">
					          	<form method="POST" data-toggle="validator" action="{{ route('register') }}">
					        	@csrf
					        	<input type="hidden" name="role" value="administrateur">
					        	<div class="row">
						          	<div class="form-group col-6">
						            	<label for="last_name_ad" class="col-form-label"><strong>Nom:</strong></label>
						            	<input type="text" name="last_name_ad" class="form-control {{ $errors->has('last_name_ad') ? ' is-invalid' : '' }}" value="{{old('last_name_ad')}}" id="last_name_ad" data-minlength="3" required>
						            	{{-- show errors if any --}}
						            	<div class="help-block with-errors"></div>
						            	@if ($errors->has('last_name_ad'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('last_name_ad') }}</strong>
		                                    </span>
		                                @endif
						          	</div>
						          	<div class="form-group col-6">
						            	<label for="first_name_ad" class="col-form-label"><strong>Prénom:</strong></label>
						            	<input type="text" name="first_name_ad" class="form-control {{ $errors->has('first_name_ad') ? ' is-invalid' : '' }}" value="{{old('first_name_ad')}}" id="first_name_ad" data-minlength="3" required>
						            	{{-- show errors if any --}}
						            	<div class="help-block with-errors"></div>
						            	@if ($errors->has('first_name_ad'))
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('first_name_ad') }}</strong>
		                                    </span>
		                                @endif
						          	</div>
					            </div>
					            <div class="form-group">
					            	<label for="email_ad" class="col-form-label"><strong>Code administrateur:
					            		<a href="#" data-toggle="popover" data-placement="right" data-content="Obtenez un code d'administrateur à 6 chiffres de votre université."><i class="far fa-question-circle"></i></a></strong>
									</label>
					            	<input type="text" name="code_admin" class="form-control" id="code-admin" 
									  required>
					            	<div class="help-block with-errors"></div>
					          	</div>
					            <div class="form-group">
					            	<label for="email" class="col-form-label"><strong>Email:</strong></label>
					            	<input type="email" name="email_ad" class="form-control {{ $errors->has('email_ad') ? ' is-invalid' : '' }}" value="{{old('email_ad')}}" id="email_ad" required>
					            	{{-- show errors if any --}}
					            	<div class="help-block with-errors"></div>
					            	@if ($errors->has('email_ad'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('email_ad') }}</strong>
	                                    </span>
	                                @endif
					          	</div>
					          	<div class="row">
						          	<div class="form-group col-6">
						            	<label for="passe-text" class="col-form-label"><strong>Mot de passe:</strong></label>
					            	<input type="password" name="password_ad" id="Password_ad" class="form-control {{ $errors->has('password_ad') ? ' is-invalid' : '' }}" data-minlength="8" required>
					            	{{-- show errors if any --}}
					            	<div class="help-block with-errors"></div>
					            	@if ($errors->has('password_ad'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('password_ad') }}</strong>
	                                    </span>
	                                @endif
						          	</div>
						          	<div class="form-group col-6">
						            	<label for="passe-repeat-text" class="col-form-label"><strong>Répéter le mot de passe:</strong></label>
						            	<input type="password" name="password_ad_confirmation" class="form-control" data-match="#Password_ad" required>
						            	<div class="help-block with-errors"></div>
						          	</div>
					            </div>
						        
						        <p><strong>En vous inscrivant, vous acceptez nos <a href="#" class="register_a">conditions d'utilisation</a> et notre <a href="#" class="register_a">politique de confidentialité.</a></strong></p>
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
						        <button type="submit" class="btn btn-success">S'inscrire</button>
						    </div>
						    </form>
						</div>
					</div>
				</div>
		    </div>
        </div>
    </div>
    <!-- End Modal Administrateur-->
    

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="{{ asset('auth/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/validator.js') }}"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>


@if ($errors->any())
  <script src="{{ asset('auth/toast-master/js/jquery.toast.js') }}"></script>
  <script type="text/javascript">

    	var hasRole = "{{ $errors->has('role') }}";
     $(document).ready(function () {
     	if (hasRole) {
     		// this notification in case of any one change the role
		    $.toast({
		        heading: 	"Action Non Autorisée"
		        , text: 	"Le role que vous avez choisi n'existe pas!"
		        , position: 'bottom-right'
		        , loaderBg: '#fff'
		        , icon: 	'error'
		        , hideAfter: false //set to false to remove it manually
		        , stack: 6
		    })
     	}
     	//this Notification is for any other error
     		$.toast({
		        heading: 	'Error d\'inscription'
		        , text: 	"Veuillez corriger les erreurs dans le formulaire"
		        , position: 'bottom-right'
		        , loaderBg: '#fff'
		        , icon: 	'error'
		        , hideAfter: 6000 //set to false to remove it manually
		        , stack: 6
		    })
     	
 
    }); 
     </script>

@endif
</body>
</html>
