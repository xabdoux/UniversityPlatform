<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Profile;
use App\User;
use App\Publication;
use App\Classe;
use App\Classe_user;
use App\Pieces_jointe;
use App\Commentaire;

class enseignantController extends Controller
{
    
	public function dashboard()
	{
		$user = User::find(Auth::user()->id);
		$etudiantsActifs = 0;
		foreach ($user->classes as $classe) {
			$number = $classe->users->where('role','=','etudiant');
			$etudiantsActifs += count($number);
		}

		return view('enseignant/dashboard', compact(['user','etudiantsActifs']));
	}

	public function rejoindreClasse(Request $req, $userId)
	{
		$classe = Classe::where('code_acces', $req->code_acces)->first();
		
		if ($classe) {
			$verify = Classe_user::where('classe_id', $classe->id)
								 ->where('user_id', $userId)->first();
			$classeName = Classe::find($classe->id);					 
			if (!$verify) {
				$inscri = new Classe_user;
				$inscri->user_id    = $userId;
				$inscri->classe_id  = $classe->id;
				$inscri->save();
				return redirect()->back()->with('success', "Vous êtes inscrit dans la classe $classeName->nom avec succès");
			}else return redirect()->back()->with('error', "Vous êtes déjà inscrit dans cette classe");
				
		}else return redirect()->back()->with('error', "il n'existe aucune classe avec ce code d'accès");
		
	}


	public function ajouterPublication(Request $request, $userId)
	{
		//return dd($request);
		$validateData = $request->validate([
		  'type' => [
                    'required',
                    Rule::in(['publication','assignation']),
                ],
	      'publicationable_type'  => 'required',
	      'description'           => 'required',
          'publicationable_id'    => 'required',
          'pieces_jointes'        => 'file|max:5000',
          'titre'                 => 'nullable',
          'ferme'                 => 'nullable',
          'date_expiration'       => 'required_unless:ferme,',
    	]);

    	//$course = Course::create($request->except(['thambnail']))->save();
    	$publication            			 	= new Publication;
    	$publication->type      				= $request->type;
    	$publication->titre      				= $request->titre;
    	$publication->description       		= $request->description;
    	$publication->ferme       		        = $request->ferme;
    	$publication->date_expiration           = $request->date_expiration;
    	$publication->publicationable_type      = $request->publicationable_type;
    	$publication->publicationable_id        = $request->publicationable_id;
    	$publication->user_id                   = $userId;
        //$publication->pieces_jointes    		= $request->pieces_jointes;
        	
      if ($request->hasfile('pieces_jointes')) {

	      $destinationPath = 'files/'; // upload path
	      $extension    = $request->file('pieces_jointes')->getClientOriginalExtension();
	      $originalName = $request->file('pieces_jointes')->getClientOriginalName(); 
	      // getting pieces_jointes extension and name
	      $fileName = time().'.'.$extension; // renameing pieces_jointes
	      $request->file('pieces_jointes')->move($destinationPath, $fileName); // uploading file to given path
	      $finalName="/".$destinationPath.$fileName;
	      //insert the file in database with the new path
	      $piece = new Pieces_jointe;
	      $piece->title = $originalName;
	      $piece->type = $extension;
	      $piece->pieces_jointes = $finalName;
	      $piece->save();

	      $publication->pieces_jointe_id = $piece->id;

      }

      	  $publication->save();
          return redirect()->back()->with('successPost','Publié avec succès');
	}

	public function ajouterCommentaire(Request $request, $publicationId)
	{
		$commentaire = new Commentaire;
		$commentaire->description = $request->description;
		$commentaire->user_id = Auth::user()->id;
		$commentaire->publication_id = $publicationId;

		if ($request->hasfile('pieces_jointes')) {

	      $destinationPath = 'files/'; // upload path
	      $extension    = $request->file('pieces_jointes')->getClientOriginalExtension();
	      $originalName = $request->file('pieces_jointes')->getClientOriginalName(); 
	      // getting pieces_jointes extension and name
	      $fileName = time().'.'.$extension; // renameing pieces_jointes
	      $request->file('pieces_jointes')->move($destinationPath, $fileName); // uploading file to given path
	      $finalName="/".$destinationPath.$fileName;
	      //insert the file in database with the new path
	      $piece = new Pieces_jointe;
	      $piece->title = $originalName;
	      $piece->type = $extension;
	      $piece->pieces_jointes = $finalName;
	      $piece->save();

	      $commentaire->pieces_jointe_id = $piece->id;

      }
		  $commentaire->save();

		return redirect()->back()->with('successPost','Commentaire publié avec succès');

	}

	public function supprimerPublication($publicationId)
	{
		$publication = Publication::find($publicationId);
		$publication->delete();
		return redirect()->back()->with('successPost','La publication a été supprimé avec succès');
	}


	public function modifierPublicationView($publicationId)
	{
		$user = User::find(Auth::user()->id);
		$etudiantsActifs = 0;
		foreach ($user->classes as $classe) {
			$number = $classe->users->where('role','=','etudiant');
			$etudiantsActifs += count($number);
		}
		$publication = Publication::find($publicationId);
		return view('enseignant/modifierPublication', compact(['publication','user','etudiantsActifs']));
	}


	public function modifierPublication(Request $request, $publicationId)
	{
		//return $request->date_expiration;
		$validateData = $request->validate([
		  'type' => [
                    'required',
                    Rule::in(['publication','assignation']),
                ],
	      'publicationable_type'  => 'required',
	      'description'           => 'required',
          'publicationable_id'    => 'required',
          'pieces_jointes'        => 'file|max:5000',
          'titre'                 => 'nullable',
          'ferme'                 => 'nullable',
          'date_expiration'       => 'required_unless:ferme,',
    	]);

    	//$course = Course::create($request->except(['thambnail']))->save();
    	$publication            			 	= Publication::find($publicationId);
    	$publication->type      				= $request->type;
    	$publication->titre      				= $request->titre;
    	$publication->description       		= $request->description;
    	$publication->ferme       		        = $request->ferme;
    	if ($request->date_expiration) {
    	$publication->date_expiration           = $request->date_expiration;
    	}
    	$publication->publicationable_type      = $request->publicationable_type;
    	$publication->publicationable_id        = $request->publicationable_id;
    	$publication->user_id                   = Auth::user()->id;
        //$publication->pieces_jointes    		= $request->pieces_jointes;
        	
      if ($request->hasfile('pieces_jointes')) {

	      $destinationPath = 'files/'; // upload path
	      $extension    = $request->file('pieces_jointes')->getClientOriginalExtension();
	      $originalName = $request->file('pieces_jointes')->getClientOriginalName(); 
	      // getting pieces_jointes extension and name
	      $fileName = time().'.'.$extension; // renameing pieces_jointes
	      $request->file('pieces_jointes')->move($destinationPath, $fileName); // uploading file to given path
	      $finalName="/".$destinationPath.$fileName;
	      //insert the file in database with the new path
	      $piece = new Pieces_jointe;
	      $piece->title = $originalName;
	      $piece->type = $extension;
	      $piece->pieces_jointes = $finalName;
	      $piece->save();

	      $publication->pieces_jointe_id = $piece->id;

      }

      	  $publication->save();
          return redirect()->back()->with('successPost','Modifié  avec succès');
	}


	public function afficherPublication($publicationId)
	{
		$user = User::find(Auth::user()->id);
		$publication = Publication::find($publicationId);
		return view('enseignant/afficherPublication', compact(['publication','user']));
	}


	public function voirToutesPublication()
	{
		$user = User::find(Auth::user()->id);
		return view('enseignant/voirToutesPublication', compact(['user','etudiantsActifs']));

	}

	public function voirProfile()
	{
		$user = User::find(Auth::user()->id);
		return view('enseignant/profile', compact(['user']));
	}


	public function modifierProfile(Request $request)
	{
		$profile = Profile::find(Auth::user()->profile->id);
		$profile->cin           = $request->cin;
		$profile->cne          	= $request->cne;
		$profile->biographie 	= $request->biographie;
		$profile->date_naiss	= $request->date_naiss;
		$profile->adresse 		= $request->adresse;
		$profile->tel 			= $request->tel;
		$profile->ville 		= $request->ville;
		$profile->pays  		= $request->pays;
		$profile->code_postal 	= $request->code_postal;

		if ($request->hasfile('image')) {

	      $destinationPath = 'images/avatar/'; // upload path
	      $extension    = $request->file('image')->getClientOriginalExtension();
	      // getting image extension and name
	      $fileName = time().'.'.$extension; // renameing image
	      $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
	      $finalName="/".$destinationPath.$fileName;
	      //insert the image in database with the new path
	      $profile->image = $finalName;
      }

      if ($request->hasfile('couverture')) {

	      $destinationPath1 = 'images/cover/'; // upload path
	      $extension1    = $request->file('couverture')->getClientOriginalExtension();
	      // getting couverture extension and name
	      $fileName1 = time().'s.'.$extension1; // renameing couverture
	      $request->file('couverture')->move($destinationPath1, $fileName1); // uploading file to given path
	      $finalName1="/".$destinationPath1.$fileName1;
	      //insert the cover in database with the new path
	      $profile->couverture = $finalName1;

      }

      $profile->save();
      return redirect()->back()->with('successPost','Modifié  avec succès');


	}

	public function changerMdp(Request $request, $userId)
	{
		$validateData = $request->validate([
          'current_password'            => 'required',
          'new_password'                => 'required|confirmed|min:8',
          'new_password_confirmation'    => 'required'
    	]);

		$user = User::find($userId);
    	if (Hash::check($request->current_password, $user->password)) {
		    $user->password = Hash::make($request->new_password);
		    $user->save(); 
		return redirect()->back()->with('successPost','Le mot de passe a été Modifié avec succès');

		}else return redirect()->back()->with('error', "Le mot de passe actuel n'est pas correct!");
	
		
		 /*if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1]))) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }*/
	}




}
