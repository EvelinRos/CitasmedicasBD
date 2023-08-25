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
    <div class="form-group text-center">
      <h5 style="color: white;">ESTADO DE LA CITA</h5>
      <select class="form-control" name="" id="tipo">
      <option value="">Seleccione el estado</option>
      <option value="1">CITAS AGENDADAS</option>
      <option value="0">CITAS CANCELADAS</option>
     </select>
    </div>
{{-- TABLA DE INFORMACIÓN CITAS ACTIVAS--}}
  <div id="activos" style="display: none">
     <div class="container mt-5">
        <h1 class="text-center mb-4">LISTA DE CITAS AGENDADAS</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" style="color: white;">ID</th>
              <th scope="col" style="color: white;">Fecha</th>
              <th scope="col" style="color: white;">Hora</th>
              <th scope="col" style="color: white;">Motivo</th>
              <th scope="col" style="color: white;">Medico Asignado</th>
              <th scope="col" style="color: white;">Tipo</th>
              <th scope="col" style="color: white;">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($citasMedicas as $citas)
            @if($citas->estado == 'Activo')
            <tr>
                <th scope="row" style="color: white;">{{$citas->idCitaMedica}}</th>
                <td style="color: white;">{{$citas->fecha}}</td>
                <td style="color: white;">{{$citas->hora}}</td>
                <td style="color: white;">{{$citas->motivo}}</td>
                <td style="color: white;">{{$citas->medico}}</td>
                <td style="color: white;">{{$citas->tipoCita}}</td>
                <td>
                  <button type="button" class="btn btn-primary fa fa-marker" data-bs-toggle="modal" data-bs-target="#exampleModal{{$citas->idCitaMedica}}">
                  </button>
                          <form id="eliminarForm" action="{{ route('citasMedicas.destroy', $citas->idCitaMedica) }}" method ="POST" style="display: inline-block;">
                              @csrf @method('DELETE')
                              <button type="button" value="Eliminar" class="btn btn-danger" onclick="confirmacionEliminar()"><i class="fa fa-trash"></i></button>
                          </form>
                </td>
              {{--MODAL PARA EDITAR CITA--}}
              {{-- Ventana Modal --}}
              <!-- Modal -->
              <div class="modal fade" id="exampleModal{{$citas->idCitaMedica}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cita {{$citas->idCitaMedica}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="">
                      <form id="guardarForm" action="{{route('citasMedicas.update',$citas->idCitaMedica)}}" method="POST">
                        @csrf
                        <label for="fecha">Fecha:</label>
                        <input  class="form-control" type="date" id="fecha" name="fecha" required> </p>
                
                        <label for="hora">Hora:</label>
                        <input class="form-control" type="time" id="hora" name="hora" min="08:00" max="16:00" required> </p>
                
                        <label for="motivo">Motivo de la cita:</label>
                        <textarea class="form-control" id="motivo" placeholder="{{$citas->motivo}}" name="motivo" required></textarea> </p>
                
                        <label for="disponible">Disponibilidad Personal Medico</label>
                            <p></p>
                        <label for="medico">Médico:</label>
                        <select class="form-control" id="medico" name="medico" required>
                            <option value="" disabled selected>Selecciona un médico</option>
                            <option value="Dr. Juan Pérez">Dr. Juan Pérez</option>
                            <option value="Dr. María López">Dr. María López</option>
                            <option value="Dr. Carlos Ramírez">Dr. Carlos Ramírez</option>
                        </select> </p>
                
                        <label for="tipo-cita">Tipo de Cita:</label>
                        <select class="form-control" id="tipo-cita" name="tipoCita" required>
                            <option value="" disabled selected>Selecciona el tipo de cita</option>
                            <option value="Cita de control">Cita de control</option>
                            <option value="Cita por primera vez">Cita por primera vez</option>
                            <option value="Cita prioritaria">Cita prioritaria</option>
                        </select> </p>
                        <div class="modal-footer float-left">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>                        <input class="btn btn-success" type="submit" value="Editar"> </p>  
                      </div>
                        <div id="error-messages" class="error-message"></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              {{--FIN MODAL--}}
            </tr>
            @endif
            @endforeach
            <!-- Agrega más filas según sea necesario -->
          </tbody>
        </table>
      </div>
    </div>

{{--///// LISTA DE CITAS INACTIVAS /////////--}}
<div id="inactivos" style="display: none">
  {{-- TABLA DE INFORMACIÓN CITAS ACTIVAS--}}
       <div class="container mt-5">
          <h1 class="text-center mb-4">LISTA DE CITAS CANCELADAS</h1>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" style="color: white;">ID</th>
                <th scope="col" style="color: white;">Fecha</th>
                <th scope="col" style="color: white;">Hora</th>
                <th scope="col" style="color: white;">Motivo</th>
                <th scope="col" style="color: white;">Medico Asignado</th>
                <th scope="col" style="color: white;">Tipo</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($citasMedicas as $citas)
              @if($citas->estado == 'Inactivo')
              <tr>
                  <th scope="row" style="color: white;">{{$citas->idCitaMedica}}</th>
                  <td style="color: white;">{{$citas->fecha}}</td>
                  <td style="color: white;">{{$citas->hora}}</td>
                  <td style="color: white;">{{$citas->motivo}}</td>
                  <td style="color: white;">{{$citas->medico}}</td>
                  <td style="color: white;">{{$citas->tipoCita}}</td>
              </tr>
              @endif
              @endforeach
              <!-- Agrega más filas según sea necesario -->
            </tbody>
          </table>
        </div>
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
<script>
  var select = document.getElementById('tipo');
  var divActivos = document.getElementById('activos');
  var divInactivos = document.getElementById('inactivos');
  select.addEventListener('change',function (){
    if (select.value == 1) 
    {
      divInactivos.style.display = 'none';
      divActivos.style.display = 'block';  
    }
    else if(select.value==0)
    {
      divActivos.style.display = 'none';
      divInactivos.style.display='block';
    }
  });
</script>
  </body>
</html>