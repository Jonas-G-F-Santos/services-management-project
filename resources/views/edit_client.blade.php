@extends('layouts.app')

@section('content')
    
        <form class="form" method="POST">

            @csrf

            @if ($success) 

                <div class="success">{{$success}}</div>

            @endif

            @if ($errors->any())
                <div >
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                    @endforeach
                </div>
             @endif     

            <input type="text" name="name" placeholder="Nome: (Obrigatorio)" value="{{old('name', $client->name)}}"/>
         
            <input type="email" name="email" placeholder="Email" value="{{old('email', $client->email)}}"/>
        
            <input type="text" name="address" placeholder="Endereço" value="{{old('address', $client->address)}}"/>
            
            <input type="tel" name="phone_1" placeholder="Telefone" value="{{old('phone_1', $client->phone_1)}}"id="tel"/>
            
            <input type="tel" name="phone_2" placeholder="Celular" value="{{old('phone_2', $client->phone_2)}}" id="tel"/>

            <input type="submit" value="Atualizar" />

            <a href="{{$client->url.'?page='.$client->page}}" class="cancel">Voltar
                
            </a>
        
        </form>

        <div class="button delete">Deletar Cliente</div>

        <x-confirm_modal>

            <x-slot:url>
                {{url('/deletarcliente', ['id'=>$client->id])}}
            </x-slot:url>

            <x-slot:message>
                Tem certeza que deseja <strong>Deletar</strong> o cliente <strong>{{$client->name}}</strong>?
            </x-slot:message>

            <p>Deletar</p>

        </x-confirm_modal>

        <script src="{{url('assets/js/modal.js')}}"></script>


@endsection
