@extends('layouts.app')

@section('content')

    <a href="{{url('/novoservico')}}" class="button new noselect">
        + Novo Serviço
    </a>

    @foreach ($services as $service)
        <div href="" class="service ">
            <div class="service-info">
                <div class="main-info-service">
                    <div class="title">Serviço: <strong style="font-size: 20px">{{$service->name}}</strong></div>
                    <div class="client-name">Cliente: {{$service->client_name}}</div>
                </div>
                <div class="secondary-info-service">
                    <div class="value-service"> <span>{{$service->pricing ?? 'R$ --'}}</span></div>
                    <div class="date-service">{{$service->created_at}}</div>
                </div>
            </div>
            <div class="status-and-button noselect">
                @if ($service->status === 1)
                    <div class="status" style="background-color: rgb(241, 220, 30)">Ativo</div>
                @else
                    <div class="status"style="background-color: rgb(4, 194, 4); color: #fff">Concluído</div>
                @endif
                <a href="{{url('/editarservico', ['id'=>$service->id])}}" class="button noselect">
                    Editar
                </a>
            </div>
        </div>
    @endforeach

    <div class="pagination">{{$services->links()}}</div>

@endsection
