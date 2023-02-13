@extends('layouts.app')

@section('content')
    
        <form class="form"  style="width: 500px" method="POST">

            @csrf

            @if ($errors->any())
                <div >
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                    @endforeach
                </div>
             @endif

            <input type="text" name="title" placeholder="Título (Obrigatorio)" value="{{old('title')}}"/>

            <input type="text" name="pricing" class="pricing" placeholder="Valor R$  --"  
            value= "{{old('pricing')}}"/>
            
            <input type="hidden" class="client-id" name="client-id" value="{{old('client-id')}}"/>    

            <input type="hidden" class="desc" name="desc" value="{{old('desc')}}"/>

            <textarea class="textarea" name="desc" id="" cols="69" rows="20" placeholder="Descrição"></textarea>
            
            <input type="file" id="files" multiple />
            
            <div id="preview"></div>

            <div class="select-btn noselect">

                <span>Selecione o Cliente</span>
              
                <i class="uil uil-angle-down"></i>
            </div>
    
            <div class="list noselect" style="display: none">

                <ul class="options" data-key="{{count($clients)}}">
                    
                        <li class="link">+ Novo Cliente</li>
                
                        <li class="options-search">
                            <input class="opt-search" type="search" placeholder="Pesquisar por Cliente"/>
                        </li>
                        @foreach($clients as $client)
                        <li class="option" data-key="{{$client->id}}">{{ $client->name }}</li>
                        @endforeach
                        <div class="none">Sem resultados</div>

                </ul>
            </div>
            

            <div class="add-client">

                <input class="input input-name" type="text" name="name" placeholder="Nome (Obrigatorio)" value="{{old('name')}}"/>
                
                <input class="input " type="email" name="email" placeholder="Email" value="{{old('email')}}"/>
            
                <input class="input" type="text" name="address" placeholder="Endereço" value="{{old('address')}}"/>
                
                <input class="input" type="tel" name="phone_1" placeholder="Telefone" value="{{old('phone_1')}}"/>
                
                <input class="input" type="tel" name="phone_2" placeholder="Celular" value="{{old('phone_2')}}"/>
            
            </div>

            <input type="submit" value="Cadastrar" />

            <a href="{{url('/servicos')}}" class="cancel">Cancelar</a>

        </form>
        
        <script src="https://unpkg.com/imask"></script>

        <script>
            var currencyMask = IMask(
                document.querySelector('.pricing'),
                {
                    mask: 'R$ num ',
                    blocks: {
                        num: {
                            // nested masks are available!
                            mask: Number,
                            thousandsSeparator: ' '
                    }
                }
            });
        </script>

        <script src="{{url('assets/js/serviceClients.js')}}"></script>
        <script src="{{url('assets/js/servicePhotos.js')}}"></script>


@endsection
