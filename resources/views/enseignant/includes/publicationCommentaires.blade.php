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