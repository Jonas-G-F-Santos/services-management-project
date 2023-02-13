<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\CreateServiceRequest;

class ServiceController extends Controller
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

    public function services () {

        $user = auth()->user();

        $user_id = $user->id;

        $services = Service::select()
        ->where('user_id', $user_id)
        ->latest('created_at')
        ->paginate(5);

        $data['services'] = $services;

        return view('services', $data);
    }

    public function add_service(Request $r) {

        $user = auth()->user();

        $user_id = $user->id;

        $clients = Client::select()
        ->where('user_id', $user_id)
        ->latest('created_at')
        ->get();

        $data['clients'] = $clients;

        return view('add_service', $data);

    }

    public function add_serviceAction(CreateServiceRequest $r) {

        $user = auth()->user();
    
        $user_id = $user->id;
    
        $validated = $r->validated();
    
        $client_id = $validated['client-id'];
    
        if ($client_id) {

            $client = Client::where('user_id', $user_id)
                ->where('id', $client_id)
                ->first();
            if ($client) {
                $client_name = $client->name;
            } else {
                return redirect('/servicos');
            }
        } else {
  
            $capitalizedFirst = ucfirst($validated['name']);
            $validated['name'] = $capitalizedFirst;
    

            $newClient = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'phone_1' => $validated['phone_1'],
                'phone_2' => $validated['phone_2'],
                'user_id' => $user_id
            ];
    
            $client = Client::create($newClient);
            $client_id = $client->id;
            $client_name = $client->name;
        }

        $capitalizedFirst = ucfirst($validated['title']);

        $validated['title'] = $capitalizedFirst;

        $newService = [
            'name' => $validated['title'],
            'desc' => $validated['desc'],
            'file' => $validated['file'],
            'pricing' => $validated['pricing'],
            'client_id' => $client_id,
            'client_name' => $client_name,
            'user_id' => $user_id,
        ];
    
        Service::create($newService);
    
        return redirect('/servicos');
    }

}
