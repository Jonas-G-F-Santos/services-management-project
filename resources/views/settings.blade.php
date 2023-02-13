@extends('layouts.app')

@section('content')
    
        <form class="form" method="POST" enctype="multipart/form-data">

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
            
            @if ($user->photo);
                <input type="text" class="profile "name="profile" style="display: none" value="{{$user->photo}}"/>
            @else
                <input type="text" class="profile "name="profile" style="display: none" value=""/>    
            @endif
          
            <div class="image-container noselect">
                <div class="xxx">
                    <span>Foto de Perfil</span>
                    <div class="button-close">x</div>
                </div>
    
            </div>

            <div class="select-btn noselect" style="color: #222; justify-content: center;">
                + Adicionar imagem de Perfil
            </div>

            <input type="file" id="fileInput" name="photo" style="display: none">

            <input type="text" class="name "name="name" placeholder="Nome: (Obrigatorio)" value="{{old('name', $user->name)}}"/>
         
            <input type="email" name="email" placeholder="Email" value="{{old('email', $user->email)}}"/>
            
            <input type="password" name="password" placeholder="Digite a nova Senha"/>
            
            <input type="password" name="password_confirmation" placeholder="Confirme a nova Senha"/>

            <input type="submit" class="noselect" value="Atualizar" />

            <a href="{{url('/')}}" class="cancel noselect">Voltar</a>
        
        </form>

        <div class="button delete noselect">Deletar Conta</div>

        <x-confirm_modal>

            <x-slot:url>
                {{url('/deletarconta', ['id'=>$user->id])}}
            </x-slot:url>

            <x-slot:message>
                Tem certeza que deseja <strong>Deletar</strong> sua conta?
            </x-slot:message>

            <p>Deletar</p>

        </x-confirm_modal>

        <script src="{{url('assets/js/profilePhoto.js')}}"></script>
        <script src="{{url('assets/js/modal.js')}}"></script>

@endsection
