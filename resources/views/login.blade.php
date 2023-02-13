<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="styleSheet" href="{{url('assets/css/login.css')}}" />
</head>
<body>

    <div class="form">
    <form class="sign" method="POST">
        
        <h1>Login</h1>    

        @csrf

        @if ($error) 

            <div class="error">{{$error}}</div>

        @endif

        @if ($errors->any())
            <div >
                @foreach ($errors->all() as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <input type="email" name="email" placeholder="Digite seu E-mail" value="{{old('email')}}">

        <input type="password" name="password" placeholder="Digite sua senha">

        <input type="submit" value="Entrar" />

        Ainda não tem cadastro? <a href="{{url('/cadastro')}}">Cadastre-se</a>

    </form>
    </div>

</body>
</html>
