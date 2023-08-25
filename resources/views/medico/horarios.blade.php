<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
                body {
            background-image:linear-gradient(to top, rgba(49, 73, 101, 0.729) 0%, rgba(103, 100, 100, 0.805) 100%), url(../resources/imagenes/cita.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            /* Puedes ajustar otras propiedades como el color de fondo, posición, etc. según sea necesario */
        }
    </style>
    <title>CITAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
{{-- BARRA DE NAVEGACIÓN--}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand">HOSPITAL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href='{{ route('welcome') }}'>Inicio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

{{-- TABLA DE INFORMACIÓN --}}
     <div class="container mt-5">
        <h1 class="text-center mb-4">HORARIO DE MÉDICOS</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" style="color: white;">MEDICO</th>
              <th scope="col" style="color: white;">HORA ASIGNADA</th>
              <th scope="col" style="color: white;">FECHA</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($citasMedicas as $citas)
            <tr>
                <th scope="row" style="color: white;">{{$citas->medico}}</th>
                <td style="color: white;">{{$citas->hora}}</td>
                <td style="color: white;">{{$citas->fecha}}</td>
                <td>
                </td>
            </tr>
            @endforeach
            <!-- Agrega más filas según sea necesario -->
          </tbody>
        </table>
      </div>

{{--Scripts de llamado de librerías--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
{{--Metodo para confirmación de eliminar--}}
<script>
      function confirmacionEliminar()
      {
        Swal.fire({
      title: 'Esta seguro de cancelar la cita?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        console.log("clic");
        document.getElementById("eliminarForm").submit();
      }
    })
      }
</script>
  </body>
</html>