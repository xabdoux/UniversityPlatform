@foreach ($publication->commentaires->reverse()->take(2) as $commentaire)
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