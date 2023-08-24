<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    </head>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: rgb(7, 7, 117); 
        width: 100%;
            height: 100vh;
            background-image:linear-gradient(to top, rgba(16, 16, 98, 0.729) 0%, rgba(65, 60, 60, 0.805) 100%), url(imagenes/roles.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        h1 {
        text-align: center;
        color: rgb(245, 244, 249);
        }
        .Inicio{
            display: block;
            width: 6%;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
            background-color: rgb(34, 165, 246);
            border-radius: 10px;
            padding: 15px;
            margin: 0;
            color: #fff;
            text-decoration: none;  
            cursor: pointer;   
            text-align: center;
        }

        .Inicio:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(127, 206, 255);
        }
        a{
        display: block;
        width: 50%;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 700;
        background-color: rgb(34, 165, 246);
        border-radius: 10px;
        padding: 15px;
        margin: 15px 23%;
        color: #fff;
        text-decoration: none;  
        cursor: pointer;   
        text-align: center; 
        }

        a:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(127, 206, 255);
        }
        .imgfond{
            display: block;
            position: relative; 
        }
    </style>
    
<body>
    <a class="Inicio" href='{{ route('welcome') }}'>Inicio</a> </p>

    <h1> ELIJA EL ROL CON EL QUE DESEA REGISTRARSE </h1>
    <a href="{{ route('pacientes.index') }}"> PACIENTE </a> </p>
    <a href="{{ route('medicos.index') }}"> MÉDICO </a> </p>
    <a href="{{ route('auxiliares.show') }}"> AUXILIAR DE CITAS MÉDICAS </a> </p>
    <a href="{{ route('gerentes.show') }}"> GERENTE </a> </p>

</body>
</html>