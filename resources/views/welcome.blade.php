<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: rgb(41, 160, 199);
        }

        h1 {
            text-align: center;
            color: azure;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: azure;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border-radius: 10px;
        }

        .centered {
            text-align: center;
        }
        input[type="submit"] {
            width: 103%;
            padding: 10px;
            font-size: 16px;
            background-color: rgb(36, 74, 136);
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
        }
        input:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(17, 63, 91);
        }
           
        .Inicio{
            display: block;
            width: 6%;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
            background-color: rgb(36, 74, 136);
            border-radius: 10px;
            padding: 15px;
            color: #fff;
            text-decoration: none;  
            cursor: pointer;   
            text-align: center;
        }

        .Inicio:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(16, 69, 101);
        }
    </style>
    <script>
        function validateForm() {
            var usuario = document.getElementById("usuario");
            var contrasena = document.getElementById("contrasena");

            if (usuario.value.trim() === "" || contrasena.value.trim() === "") {
                return false;
            }

            return true;
        }
        function mostrarMensaje() {
            alert("Usted ha iniciado sesión");
        }
    </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    @auth
    @if(session()->has('message'))
    <div class="alert alert-{{session()->get('color')}} alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    <h1>USTED HA INICIADO SESION</h1><br><br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="CERRAR SESIÓN">
    </form>
    <br>
    <form action="{{ route('dashboard') }}" method="GET">
        @csrf
        <input type="submit" value="VER ROLES">
    </form> 
    <br>
    <form action="{{ route('citasMedicas.citas') }}" method="GET">
        @csrf
        <input type="submit" value="CITAS">
    </form>   
@else
    <h1>Inicio de Sesión </h1>
    <form action="{{ route('dashboard') }}" method="GET" >
        <p class="centered">
            <input  type="submit" value="Iniciar Sesión">
        </p>
    </form>
    @if (Route::has('register'))
    <form action="{{ route('register') }}" method="GET" >
        <p class="centered">
            <input  type="submit" value="Registrarme">
        </p>
    </form>    
    @endif
@endauth
</body>
</html>