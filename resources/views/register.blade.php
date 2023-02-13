<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="styleSheet" href="{{url('assets/css/login.css')}}" />
</head>
<body>

    <div class="form">
    <form class="sign" method="POST">
        
        @csrf

        <h1>Cadastre-se</h1>

        @if ($errors->any())
            <div >
                @foreach ($errors->all() as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            </div>
        @endif 

        <input type="name" name="name" placeholder="Digite seu Nome" value="{{old('name')}}">
    
        <input type="email" name="email" placeholder="Digite seu E-mail" value="{{old('email')}}">

        <input type="password" name="password" placeholder="Digite sua senha" value="{{old('password')}}">

        <input type="password" name="password_confirmation"  placeholder="Confirme sua senha" value="{{old('password_confirm')}}">

        <input type="submit" value="Cadastrar" />

        Já tem cadastro? <a href="{{url('/login')}}">Faça login</a>

    </form>
    </div>

</body>
</html>
