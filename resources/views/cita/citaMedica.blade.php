<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Programar Cita Médica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image:linear-gradient(to top, rgba(49, 73, 101, 0.729) 0%, rgba(103, 100, 100, 0.805) 100%), url(../resources/imagenes/cita.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
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
            font-size: 20px;
        }

        input[type="text"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            background-color: #0f5186;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
        }
        input[type="button"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            background-color: #0f5186;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
        }
        
        .botones:hover{
            background-color: whitesmoke;
            border: 2px solid rgb(127, 206, 255);
            color: rgb(3, 40, 62);
        }

        textarea {
            height: 100px;
        }

        .success-message {
            text-align: center;
            margin-top: 20px;
            color: rgb(16, 11, 70);
            font-weight: bold;
        }

        .error-message {
            text-align: center;
            margin-top: 20px;
            color: red;
            font-weight: bold;
        }

        .centered {
            text-align: center;
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
        .medico{
            display: block;
            width: 55%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            border-radius: 10px;
        }
        .tipo{
            display: block;
            width: 55%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            border-radius: 10px;
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
    </style>
    <script>
        function clearFields() {
            var fecha = document.getElementById("fecha");
            var hora = document.getElementById("hora");
            var motivo = document.getElementById("motivo");
            var medico = document.getElementById("medico");
            var tipoCita = document.getElementById("tipo-cita");
            var successMessage = document.getElementById("success-message");
            var reporte = document.getElementById("reporte");
            var errorMessages = document.getElementById("error-messages");

            fecha.value = "";
            hora.value = "";
            motivo.value = "";
            medico.value = "";
            tipoCita.value = "";
            successMessage.style.display = "none";
            reporte.innerHTML = "";
            errorMessages.innerHTML = "";
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <a class="salir" href="inicio.html">Salir</a>
    <h1 style="color: white;">Programar Cita Médica</h1>

    @if(session()->has('message'))
    <div class="alert alert-{{session()->get('color')}} alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    <form action="{{route('citasMedicas.store')}}" method="POST">
        @csrf
        <label for="fecha">Fecha:</label>
        <input  class="fecha" type="date" id="fecha" name="fecha" required> </p>

        <label for="hora">Hora:</label>
        <input class="hora" type="time" id="hora" name="hora" min="08:00" max="16:00" required> </p>

        <label for="motivo">Motivo de la cita:</label>
        <textarea id="motivo" name="motivo" required></textarea> </p>

        <label for="disponible">Disponibilidad Personal Medico</label>
            <p></p>
        <label for="medico">Médico:</label>
        <select class="medico" id="medico" name="medico" required>
            <option value="" disabled selected>Selecciona un médico</option>
            <option value="Dr. Juan Pérez">Dr. Juan Pérez</option>
            <option value="Dr. María López">Dr. María López</option>
            <option value="Dr. Carlos Ramírez">Dr. Carlos Ramírez</option>
        </select> </p>

        <label for="tipo-cita">Tipo de Cita:</label>
        <select class="tipo" id="tipo-cita" name="tipoCita" required>
            <option value="" disabled selected>Selecciona el tipo de cita</option>
            <option value="Cita de control">Cita de control</option>
            <option value="Cita por primera vez">Cita por primera vez</option>
            <option value="Cita prioritaria">Cita prioritaria</option>
        </select> </p>

        <input class="botones" type="submit" value="Programar Cita"> </p>
        <input class="botones" type="button" value="Limpiar Campos" onclick="clearFields()">

        <div id="error-messages" class="error-message"></div>
    </form>

    <div id="success-message" class="success-message" style="display: none;">Cita médica programada exitosamente.</div>
    <div id="reporte" class="centered"></div>
    
    <script>
        function validateForm() {
            var fecha = document.getElementById("fecha");
            var hora = document.getElementById("hora");
            var motivo = document.getElementById("motivo");
            var medico = document.getElementById("medico");
            var tipoCita = document.getElementById("tipo-cita");
            var successMessage = document.getElementById("success-message");
            var reporte = document.getElementById("reporte");
            var errorMessages = document.getElementById("error-messages");
            errorMessages.innerHTML = "";

            if (!fecha.value || !hora.value || !motivo.value || !medico.value || !tipoCita.value) {
                errorMessages.innerHTML = "Por favor, completa todos los campos.";
            } else {
                successMessage.style.display = "block";
                reporte.innerHTML = "Médico Asignado: " + medico.value + "<br>" + "Tipo de Cita: " + tipoCita.value;
            }
        }
    </script>
</body>
</html>