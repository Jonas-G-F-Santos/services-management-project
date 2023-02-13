@extends('layouts.app')

@section('content')
    
    <a href="{{url('/novocliente')}}" class="button new noselect">
        + Novo Cliente
    </a>

    @foreach($clients as $client)
        <div class="client">
            <div class="client-info ">
                <div class="client-name">Nome: <strong style="font-size: 20px">{{$client->name}}</strong></div>
                <div class="client-address">Endereço: {{$client->address}}</div>
                <div class="client-email">E-mail: {{$client->email}}</div>
                <div class="client-phone">Telefone: {{$client->phone_1}}</div>
                <div class="client-celphone">Celular: {{$client->phone_2}}</div>
            </div>
            <a href="{{url('/editarcliente', ['id'=>$client->id])}}" class="button noselect">
                Editar
            </a>
        </div>
    @endforeach

    <div class="pagination">{{$clients->links()}}</div>


@endsection