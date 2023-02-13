<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserEditRequest;
use Image;


class UserController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth', ['except'=>[
            'login',
            'register',
            'loginAction',
            'registerAction'
        ]]);
    }

    public function checkLogin() {
        if (auth()->user()) {
            return True;
        } else {
            return False;
        }   
    }
    
    public function index() {
        $user = auth()->user();
        $fullName = $user->name;
        $nameArray = explode(' ', $fullName);
        $firstName = $nameArray[0];
        return view('home', [
            'name' => $firstName
        ]);
    }

    public function login(Request $r) {
        if($this->checkLogin()) {
            return redirect('/');
        } 

        return view('/login', ['error' => $r->session()->get('error')]);
    }

    public function loginAction(LoginRequest $r) {
        
        $vld = $r->validated();

        if(Auth::attempt($vld)) {
            return redirect('/');
            
        }

        $r->session()->flash('error', 'E-mail e/ou senha não conferem');
        return redirect('/login');
    }

    public function register(Request $r) {
        if( $this->checkLogin() == True) {
            return redirect('/');
        }

        return view('/register');
    }

    public function registerAction(RegisterRequest $r) {
        
        $vld = $r->validated();
        
        $newUser = new User();

        $newUser->name = $vld['name'];
        $newUser->email = $vld['email'];
        $newUser->password = password_hash($vld['password'], PASSWORD_DEFAULT);
        $newUser->save();
        Auth::login($newUser);
        return redirect('/');

    }

    public function settings(Request $r) {
        
        $user = auth()->user();

        $data['user'] = $user;

        return view('settings', $data, ['success' => $r->session()->get('success')]);
    }

    public function settings_Action(UserEditRequest $r) {

        $user = auth()->user();
      
        $validated = $r->validated();

        if (isset($validated['photo'])) {

            $image = $validated['photo'];
        
            if($image) {
                $filename = md5(time().rand(0,9999)).'.jpg';
                $destinationPath = public_path('/storage/images');
                $image->move($destinationPath, $filename);
            }
    
            $validated['photo'] = $filename;
        }

        if ($validated['profile'] === NULL) {
            $validated['photo'] = NULL;
        }
    
        if($validated['password']) {
            $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);
        } else {
            $validated['password'] = $user->password;
        }
    
        $user->update($validated);
    
        $r->session()->flash('success', 'Perfil atualizado com sucesso');
    
        return redirect('configuracoes');
    }

    public function del_account(Request $r, $id = null) {
        $user = auth()->user();
        if($id && $id == $user->id) {
            $user->delete();
        } 
        return redirect('configuracoes');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
