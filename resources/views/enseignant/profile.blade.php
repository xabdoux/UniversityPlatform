@extends('enseignant.layouts.app')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/btnStyle.css') }}">
@endsection
@section('content')
<div class="row px-3">
	<div class="col-md-12 gx-card mb-3">
    	<div class="gx-card-body">
    		<div class="row">
				<div class="col-md-12">
					<h5>Configuration de profile</h5>
					<hr>
					<form method="POST" action="{{ url('modifierProfile') }}" enctype="multipart/form-data">
				    		@csrf
						<div class="row align-items-center mt-3">
							<div class="col-2 card_style1 mb-0">
								<span class="avatar brround avatar-md d-block cover-image float-right" data-image-src="{{ asset($user->profile->image) }}" style="background: rgba(0, 0, 0, 0) url({{ asset($user->profile->image) }}) repeat scroll center center; width: 5.5rem;height: 5.5rem;"></span>

							</div>
							<div class="col-10 text-headline">
								<div style="color: #000000"><h5 class="mb-0">{{strtoupper($user->last_name) }} {{ucfirst($user->first_name) }}</h5></div>
	                            <h6 class="text-overlay mb-0">{{ucfirst($user->role) }}</h6>
	                            <div>
									<div class="upload-btn-wrapper btnUpload mt-2 d-md-inline-block" style="font-size: 0.8rem;">
									    <label for="file-input" style="padding-top: 0;padding-bottom: 0;">
									        <i class="fas fa-user"></i>&nbsp;<strong> Changer la photo</strong>
									    </label>

									    <input id="file-input" name="image" type="file"/>
									</div>
									<div class="upload-btn-wrapper btnUpload mt-2 d-md-inline-block" style="font-size: 0.8rem;">
									    <label for="file-input" style="padding-top: 0;padding-bottom: 0;">
									        <i class="fas fa-image"></i>&nbsp;<strong> Changer la couverture</strong>
									    </label>

									    <input id="file-input" name="couverture" type="file"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-12 text-headline">
				            	<textarea class="form-control my-3" name="biographie" placeholder="Ecrivez votre biographie ici ..." style="height:100px">{{$user->profile->biographie}}</textarea>
								<div class="row my-3">
									<div class="col-md-6">
										<input type="text" class="form-control" placeholder="CIN" name="cin" value="{{$user->profile->cin}}">
									</div>
									<div class="col-md-6">
										<input id="datepickernaissance" name="date_naiss" placeholder="Date naissance" value="{{$user->profile->date_naiss}}" />
									</div>
								</div>
							</div>
							<div class="col-12 text-headline">
								<div class="row my-2">
									<div class="col-md-6">
										<input type="text" class="form-control" placeholder="{{$user->email}}" name="email">
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" placeholder="Téléphone" name="tel" value="{{$user->profile->tel}}">
									</div>
								</div>
							</div>
							<div class="col-12 text-headline my-3">
								<input type="text" class="form-control" placeholder="Adresse" name="adresse" value="{{$user->profile->adresse}}">
							</div>
							<div class="col-12 text-headline">
								<div class="row my-2">
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Ville" name="ville" value="{{$user->profile->ville}}">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Pays" name="pays" value="{{$user->profile->pays}}" >
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Code postal" name="code_postal" value="{{$user->profile->code_postal}}">
									</div>
								</div>
							</div>
							<div class="col-12 text-headline">
								<button type="submit" class="btn btn-success float-right mt-2">Enregistrer</button>
							</div>
						</div>
					</form>
					<form action="{{ url('changerMdp', $user->id) }}" method="POST">
						@csrf
						<h5 class="mt-3">Changer le mot de passe:</h5>
						<hr>
						@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
						<div class="row mt-3">
							<div class="form-group col-md-12">
						      	<label for="inputPassword1"><h6>Mot de passe actuel</h6></label>
						     	<input type="password" name="current_password" class="form-control ml-3" id="inputPassword1" style="width: auto;display: inline-block;">
						     	<span data-toggle="popover" data-placement="bottom" data-content="Si vous ne vous souvenez plus de votre mot de passe actuel, vous pouvez contacter le support technique pour le récupérer."><i class="far fa-question-circle ml-2"></i></span>
						    </div>
							<div class="form-group col-md-6">
						      	<label for="inputPassword2"><h6>Nouveau mot de passe</h6></label>
						     	<input type="password" name="new_password" class="form-control" id="inputPassword2">
						    </div>
							<div class="form-group col-md-6">
						      	<label for="inputPassword3"><h6>Confirmer mot de passe</h6></label>
						     	<input type="password" name="new_password_confirmation" class="form-control" id="inputPassword3">
						    </div>
						    <div class="col-12 text-headline">
						    	<button type="submit" class="btn btn-success float-right mt-2">Enregistrer</button>
						    </div>
						</div>
					</form>
				</div>
			</div>
    	</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#datepickernaissance').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd ',
    });
</script>
@endsection