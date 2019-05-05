<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
     protected function registered(Request $request, $user)
    {   
        switch ($user->role) {
        case "enseignant":
            return redirect('enseignant');
            break;
        case "etudiant":
            return redirect('etudiant');
            break;
        case "coordinateur":
            return redirect('coordinateur');
            break;
        case "administration":
            return redirect('administration');
            break;
        default:
            abort(403, 'Accès refusé pour ce type des roles.');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['role'] == 'enseignant') {
                return Validator::make($data, [
                'first_name_en' => ['required', 'string', 'max:255'],
                'last_name_en' => ['required', 'string', 'max:255'],
                'email_en' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'role' => [
                    'required',
                    Rule::in(['etudiant', 'enseignant','coordinateur','administration']),
                ],
                'password_en' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }elseif ($data['role'] == 'etudiant') {
                return Validator::make($data, [
                'first_name_et' => ['required', 'string', 'max:255'],
                'last_name_et' => ['required', 'string', 'max:255'],
                'email_et' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'role' => [
                    'required',
                    Rule::in(['etudiant', 'enseignant','coordinateur','administration']),
                ],
                'password_et' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }elseif ($data['role'] == 'coordinateur') {
                return Validator::make($data, [
                'first_name_co' => ['required', 'string', 'max:255'],
                'last_name_co' => ['required', 'string', 'max:255'],
                'email_co' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'role' => [
                    'required',
                    Rule::in(['etudiant', 'enseignant','coordinateur','administration']),
                ],
                'password_co' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }elseif ($data['role'] == 'administration') {
                return Validator::make($data, [
                'first_name_ad' => ['required', 'string', 'max:255'],
                'last_name_ad' => ['required', 'string', 'max:255'],
                'email_ad' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'role' => [
                    'required',
                    Rule::in(['etudiant', 'enseignant','coordinateur','administration']),
                ],
                'password_ad' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['role'] == 'enseignant') {
            $profile = new Profile;
            $profile->image = NULL;
            $profile->save();

            return User::create([
                'last_name' => $data['last_name_en'],
                'first_name' => $data['first_name_en'],
                'email' => $data['email_en'],
                'role' => $data['role'],
                'profile_id' => $profile->id,
                'password' => Hash::make($data['password_en']),
            ]);
        }elseif ($data['role'] == 'etudiant') {
            $profile = new Profile;
            $profile->image = NULL;
            $profile->save();
            return User::create([
                'last_name' => $data['last_name_et'],
                'first_name' => $data['first_name_et'],
                'email' => $data['email_et'],
                'profile_id' => $profile->id,
                'role' => $data['role'],
                'password' => Hash::make($data['password_et']),
            ]);
        }elseif ($data['role'] == 'coordinateur') {
            $profile = new Profile;
            $profile->image = NULL;
            $profile->save();
            return User::create([
                'last_name' => $data['last_name_co'],
                'first_name' => $data['first_name_co'],
                'email' => $data['email_co'],
                'profile_id' => $profile->id,
                'role' => $data['role'],
                'password' => Hash::make($data['password_co']),
            ]);
        }elseif ($data['role'] == 'administration') {
            $profile = new Profile;
            $profile->image = NULL;
            $profile->save();
            return User::create([
                'last_name' => $data['last_name_ad'],
                'first_name' => $data['first_name_ad'],
                'email' => $data['email_ad'],
                'profile_id' => $profile->id,
                'role' => $data['role'],
                'password' => Hash::make($data['password_ad']),
            ]);
        }
    }
}
