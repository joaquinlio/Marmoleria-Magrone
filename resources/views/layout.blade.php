<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iconos.min.css') }}">
    <script src="{{ asset ('js/jquery.min.js') }}"></script>
    <script src="{{ asset ('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset ('js/typeahead.min.js') }}"></script>
    <script src="{{ asset ('js/iconos.min.js') }}"></script>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/pricing.css') }}" rel="stylesheet">
  </head>

  <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark flex-column flex-md-row">
          <a class="navbar-brand" href="#">Magrone</a>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('solicitudes.create') }}">Nueva Solicitud</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('paneldecontrol.index') }}">Control Diario</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Solicitudes</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="p-2 dropdown-item" href="{{ route('presupuestos.index') }}">Presupuestos</a>
                    <a class="p-2 dropdown-item" href="{{ route('pedidos.index') }}">Pedidos</a>
                    <a class="p-2 dropdown-item" href="{{ route('solicitudes.index') }}">Todas Las Solicitudes</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input type="text" class="form-control mr-sm-3" id="buscadorSol" autocomplete="off" placeholder="Buscar Solicitud">
                <button class="btn btn-success my-2 my-sm-0"><a class="text-white" href="{{ route('logout') }}">{{ Auth::user()->name }}</a></button>
              </form>
        </nav>
    <!--<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"></h5>
      <input type="text" class="my-0 mr-md-auto form-control col-3" id="buscadorSol" autocomplete="off" placeholder="Buscar Solicitud Por Numero">
      <nav class="my-2 my-md-0 mr-md-3">
        
      </nav>
      <a class="btn btn-outline-primary" href="#">Sign up</a>
    </div>-->
    <div class="">
      @yield('content')
    </div>
    </div>
    <script>
      $("#buscadorSol").keypress(function(e){
        if (e.which == 13) {
          var sol_id = $("#buscadorSol").val();
          location.href="http://localhost/marmoleria/public/solicitudes/"+sol_id; 
        } 
      });
      $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id') 
        var nombre = button.data('nombre')
        var descripcion = button.data('descripcion') 
        var precio = button.data('precio')
        //Presupuesto
        var producto = button.data('producto')
        var cantidad = button.data('cantidad')
        var total = button.data('total')
        var aplicacion = button.data('aplicacion')
        var estado = button.data('estado')
        //Cliente
        var direccion = button.data('direccion')
        var entrecalles = button.data('entrecalles')
        var observaciones = button.data('observaciones')
        var localidad = button.data('localidad')
        var partido = button.data('partido')
        var provincia = button.data('provincia')
        var telefono1 = button.data('telefono1')
        var telefono2 = button.data('telefono2')
        var factura = button.data('factura')
        var cuit = button.data('cuit')
        var razonsocial = button.data('razonsocial')
        //profecional
        var telefono = button.data('telefono')
        var email = button.data('email')
        var modal = $(this)
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #nombre').val(nombre)
        modal.find('.modal-body #descripcion').val(descripcion)
        modal.find('.modal-body #precio').val(precio)
        //Presupuesto
        modal.find('.modal-body #producto').val(producto)
        modal.find('.modal-body #cantidad').val(cantidad)
        modal.find('.modal-body #total').val(total)
        modal.find('.modal-body #aplicacion').val(aplicacion)
        modal.find('.modal-body #estado').val(estado)
        //Cliente
         modal.find('.modal-body #direccion').val(direccion)
         modal.find('.modal-body #entrecalles').val(entrecalles)
         modal.find('.modal-body #observaciones').val(observaciones)
         modal.find('.modal-body #localidad').val(localidad)
         modal.find('.modal-body #partido').val(partido)
         modal.find('.modal-body #provincia').val(provincia)
         modal.find('.modal-body #telefono1').val(telefono1)
         modal.find('.modal-body #telefono2').val(telefono2)
         modal.find('.modal-body #factura').val(factura)
         modal.find('.modal-body #cuit').val(cuit)
         modal.find('.modal-body #razonsocial').val(razonsocial)
        //profecional
        modal.find('.modal-body #telefono').val(telefono)
        modal.find('.modal-body #email').val(email)
      })
      $('#borrar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id') 
        var sol_id = button.data('sol_id') 
        var nombre = button.data('nombre')  
        var modal = $(this)
        modal.find('.modal-body #sol_id').val(sol_id)
        modal.find('.modal-body #id').val(id)

        modal.find('.modal-body #nombre').val(nombre)
      })
      $('#nuevoPed').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var total = button.data('total') 
        var modal = $(this)
        modal.find('.modal-body #total').val(total) 
      })
      $('#edit,#cargar,#nuevoPed').on('hidden.bs.modal', function () {
        //producto
        $('#id').val();
        $('#nombre').val();
        $('#descripcion').val();
        $('#precio').val();
        //Presupuesto
        $('#producto').val();
        $('#cantidad').val();
        $('#total').val();
        $('#aplicacion').val();
        $('#estado').val();
        //Cliente
        $('#direccion').val();
        $('#entrecalles').val();
        $('#observaciones').val();
        $('#localidad').val();
        $('#partido').val();
        $('#provincia').val();
        $('#telefono1').val();
        $('#telefono2').val();
        $('#factura').val();
        $('#cuit').val();
        $('#razonsocial').val();
        //profecional
        $('#telefono').val();
        $('#email').val();
        //pedido
        $('#descuento').val('');
        $('#senia').val('');
        $('#saldo').val('');
        $('#imagen').val('');
        $('#estado').val('');
        $('#subEstado').val('');
    });
    </script>
  </body>
</html>