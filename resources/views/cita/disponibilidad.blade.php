<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   
    <title>Disponibilidad de horario de trabajo</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-image:linear-gradient(to top, rgba(49, 73, 101, 0.729) 0%, rgba(103, 100, 100, 0.805) 100%), url(../resources/imagenes/disponible.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .background-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            max-width: 800px;
            background-color: transparent;
            padding: 100px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin-bottom: 20px;
        }
        h1{
            color: rgb(0, 0, 0);
            font-size: 30px;
        }
        label {
            display: block;
            font-weight: bold;
            color: rgb(0, 0, 0);
            font-size: 20px;
        }
        .info {
            margin-top: 20px;
            font-style: italic;
            color: azure; 
            font-size: 19.5px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            color: azure;
            font-size: 20px;
        }
        .fecha{
            display: block;
            width: 40%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            border-radius: 10px;
        }
        .hora{
            display: block;
            width: 40%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            border-radius: 10px;
        }
        .boton{
            align-content: center;
            width: 50%;
            padding: 10px;
            font-size: 18px;
            background-color: #0f5186;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
        }
        .boton:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(3, 40, 62);
        }
        .salir{
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

        .salir:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(3, 40, 62);
        }
        .posicion{
            padding: 15px;
        }
        .tabla{
            color: azure;
        }
        input[type="reset"] {
            width: 50%;
            padding: 10px;
            font-size: 18px;
            background-color: #0f5186;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
            align-items: center;
        }
        .botones:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(3, 40, 62);
            align-items: center;
        }
        .contenedor{
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
        }
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="posicion">
        <a class="salir" href='{{ route('welcome') }}'>Salir</a>
    </div>
    <div class="background-container">
        <div class="container">
            <h1 style="color: white;">Disponibilidad de horario de trabajo</h1>
            @if(session()->has('message'))
            <div class="alert alert-{{session()->get('color')}} alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            @endif
            <form action="{{route('disponibles.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fecha">Seleccione una fecha:</label>
                    <input class="fecha" type="date" id="fecha" name="fecha" required>
                </div>
                <div class="form-group">
                    <label for="hora">Seleccione una hora:</label>
                    <select class="hora" id="hora" name="hora" required>
                        <option value="">Seleccionar hora</option>
                        <option value="08:00">08:00 AM</option>
                        <option value="09:00">09:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">01:00 PM</option>
                        <option value="14:00">02:00 PM</option>
                        <option value="15:00">03:00 PM</option>
                        <option value="16:00">04:00 PM</option>
                    </select>
                </div>
                <div class="contenedor">
                    <button class="boton" type="submit">Guardar</button>
                    <input class="botones" type="reset" value="Limpiar Campos">
                </div>
            </form>
            <p class="info"> Por favor, seleccione la Disponibilidad de horario adecuada</p>
    </div>
    
</body>
</html>