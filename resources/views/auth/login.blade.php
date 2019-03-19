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
	<link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.7.2/css/all.css') }}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- meta tags -->
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link rel="shortcut icon" href="{{ asset('auth/images/shortcut.png') }}">

	<title></title>

</head>
<body class="register_page">
	<div class="container-fluid">
        <div class="register-wrapper row">
            <div id="register" class="register registerpage offset-lg-3 offset-md-3 offset-sm-3 offset-xs-0 col-xs-12 col-sm-5 col-lg-5" style="margin-top: 100px;">    
                <div class="register-form-header">
                	<img src="{{ asset('auth/images/padlock.png') }}" alt="login-icon" style="max-width:64px">
                    <div class="register-header">
                        <h5 class="bold color-white">Connecte-toi maintenant!</h5>
                        <h6><center><small>Veuillez entrer vos identifiants pour vous connecter.</small></center></h6>
                    </div>
                </div>
                <div class="container-register100">
					<div class="wrap-register100">
						<div class="modal-body">
					        <form method="POST" action="{{ route('login') }}">
					        	@csrf
					            <div class="form-group">
					            	<label for="email" class="col-form-label"><strong>Email:</strong></label>
					            	<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
					            	@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
					          	</div>
				          		<div class="form-group">
					            	<label for="passe-text" class="col-form-label"><strong>Mot de passe:</strong></label>
					            	<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
					          	</div>
					          	<div class="custom-control custom-switch">
								   <input type="checkbox" name="remember" class="custom-control-input" id="customSwitch1" {{ old('remember') ? 'checked' : '' }}>
								   <label class="custom-control-label" for="customSwitch1"><strong>Se souvenir</strong></label>
								</div>
								
					        
					    </div>
					    <div class="modal-footer">
					        <button type="submit" class="btn btn-success">Login</button>
					    </div>
					    </form>
					</div>
				</div>
                <p id="nav">
                	<a data-toggle="modal" data-target="#Modal_passe_oublie" data-whatever="@getbootstrap">Mot de passe oublié?</a>

                    <a href="{{ url('register') }}" class="float-right mb-3" title="S´inscrire">S´inscrire</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Start Modal passe oublié-->
    <div class="modal fade" id="Modal_passe_oublie" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
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
									<h5 class="card-category">Récupération de compte</h5>
								</span>
							</div>
							<div class="modal-body">
								<p><strong>Nous trouverons votre compte! Entrez votre email</strong></p>
						        <form>
						            <div class="form-group">
						            	<label for="email" class="col-form-label"><strong>Email:</strong></label>
						            	<input type="email" class="form-control" id="email2">
						          	</div>
						        </form>
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
						        <button type="button" class="btn btn-success">Récupérer</button>
						    </div>
						</div>
					</div>
				</div>
		    </div>
        </div>
    </div>
    <!-- End Modal passe oublié-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js') }}"></script>
<script src="{{ asset('auth/bootstrap/js/bootstrap.min.js') }}"></script>


</body>
</html>
