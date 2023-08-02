<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <a class="Inicio" href='{{ route('welcome') }}'>Inicio</a>
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 20px;
            width: 100%;
            height: 100vh;
            background-image:linear-gradient(to top, rgba(16, 16, 98, 0.729) 0%, rgba(65, 60, 60, 0.805) 100%), url(../resources/imagenes/medico.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        h1 {
            text-align: center;
            color: rgb(230, 240, 251);
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: rgb(230, 240, 251);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border-radius: 10px;
        }

        input[type="submit"] {
            width: 103%;
            padding: 10px;
            font-size: 16px;
            background-color: rgb(5, 75, 121);
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
        }

        input[type="text"]:invalid {
            border: 1px solid rgb(211, 175, 16);
            border-radius: 10px;
        }

        input[type="text"]:valid {
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .success-message {
            text-align: center;
            margin-top: 20px;
            color: green;
            font-weight: bold;
        }
        input[type="reset"] {
            width: 104%;
            padding: 10px;
            font-size: 16px;
            background-color: rgb(5, 75, 121);
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
        }

        input:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(3, 40, 62);
        }
           
        .Inicio{
            display: block;
            width: 6%;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
            background-color: rgb(5, 64, 102);
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
            color: rgb(3, 40, 62);
        }

    </style>
    <script>
        function mostrarMensaje() {
            var nombre = document.getElementById("nombre").value;
            var apellido = document.getElementById("apellido").value;
            alert("Bienvenido " + nombre + " " + apellido + ", tu registro fue exitoso. Ahora puedes iniciar sesión.");
        }
        function redireccionar() {
            mostrarMensaje();
            window.location.href = "loginm.html";
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
    <h1 style="color: white;">Registro Médico</h1>

    @if(session()->has('message'))
    <div class="alert alert-{{session()->get('color')}} alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
        <form action="{{route('medicos.store')}}" method="POST">
            @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required> </p>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required> </p>

        <label for="cedula">Cedula:</label>
        <input type="text" id="cedula" name="cedula" required> </p>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required> </p>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required> </p>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" pattern="[0-9]{10}"
            title="Ingresa un número de teléfono válido de 10 dígitos" required> </p>

        <input type="submit" value="Registrar">
    </p>
    <p>  
        <input type="reset" name="limpiar" id="limpiar" value="Limpiar Formulario">
    </form>
</body>
</html>