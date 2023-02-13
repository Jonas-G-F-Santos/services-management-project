@extends('layouts.app')

@section('content')
    
        <form class="form" method="POST">
            @csrf

            @if ($errors->any())
                <div >
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                    @endforeach
                </div>
             @endif

            <input type="text" name="name" placeholder="Nome (Obrigatorio)" value="{{old('name')}}"/>
         
            <input type="email" name="email" placeholder="Email" value="{{old('email')}}"/>
        
            <input type="text" name="address" placeholder="Endereço" value="{{old('address')}}"/>
            
            <input type="tel" name="phone_1" placeholder="Telefone" value="{{old('phone_1')}}"/>
            
            <input type="tel" name="phone_2" placeholder="Celular" value="{{old('phone_2')}}"/>

            <input type="submit" value="Cadastrar" />
            <a href="{{url('/clientes')}}" class="cancel">Cancelar</a>
        </form>
@endsection

<x-footer>
</x-footer>