<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\EditClientRequest;

class ClientController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth', ['except'=>[
            'login',
            'cadastro',
            'loginAction',
            'cadastroAction'
        ]]);
    }

    public function clients(Request $r) {

        $user = auth()->user();

        $user_id = $user->id;

        $clients = Client::select()
        ->where('user_id', $user_id)
        ->latest('created_at')
        ->paginate(5);

        $data['clients'] = $clients;

        $url = url()->current();

        $currentPage = $clients->currentPage();

        session(['page' => $currentPage]);

        session(['url' => $url]);

        return view('clients', $data);
    }

    public function add_client(Request $r) {
        return view('/add_client');
    }

    public function add_clientAction(CreateClientRequest $r) {

        $validated =$r->validated();

        if($validated){

        $user = auth()->user();

        $id = $user->id;

        $capitalizedFirst = ucfirst($validated['name']);

        $validated['name'] = $capitalizedFirst;

        $add = Arr::add($validated, 'user_id', $id);

        Client::create($add);

        }

        return redirect('clientes');
    }

    public function edit_client($id = null, Request $r) {

        if(isset($id)) {


            $url = session()->get('url');

            $page = session()->get('page');

            $user = auth()->user();

            $client = Client::find($id);

            if($client && $client->user_id == $user->id) {

                $add_1 = Arr::add($client, 'url', $url);

                $add_2 = Arr::add($client, 'page', $page);

                $data['client'] = $add_2;

                return view('edit_client', $data, ['success' => $r->session()->get('success')]);
            }
        } 

        return redirect('/clientes');
    }

    public function edit_clientAction($id = null, EditClientRequest $r) {

        if(isset($id)) {

            $user = auth()->user();

            $client = Client::find($id);

            if($client && $client->user_id == $user->id) {

                $validated = $r->validated();

                $capitalizedFirst = ucfirst($validated['name']);

                $validated['name'] = $capitalizedFirst;

                if($validated){
                    $client->update($validated);
                    $r->session()->flash('success', 'Perfil atualizado com sucesso');
                    return redirect()->back();
                }
            }
        } 
        return redirect('/clientes');
    }


    public function del_client($id = null) {
        
        if(isset($id)) {

            $user = auth()->user();

            $client = Client::find($id);

            if($client && $client->user_id == $user->id) {

                $client->delete();
            }
        }
        return redirect('/clientes');
    }
}

