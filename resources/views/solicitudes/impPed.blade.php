@php
    $productos = explode("/", $solicitud->productos);
    $numeros = count($productos);
    $todos = 0;
    $opcion1 = 0;
    $opcion2 = 0;
    $opcion3 = 0;
    for ($i=0; $i <$numeros ; $i++) { 
        $producto = explode(",", $productos[$i]);
       if ($producto[5] == "Todos") {
          $todos = $todos + $producto[3];
       }
       if ($producto[5] == "opcion1") {
          $opcion1 = $opcion1 + $producto[3];
          $opcion1 = $opcion1 + $todos;
       }
       if ($producto[5] == "opcion2") {
          $opcion2 = $opcion2 + $producto[3];
          $opcion2 = $opcion2 + $todos;
       }
       if ($producto[5] == "opcion3") {
          $opcion3 = $opcion3 + $producto[3];
          $opcion3 = $opcion3 + $todos;
       }
    }
    $totalPed = number_format($solicitud->totalPed,2,",",".");
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $time = strtotime($solicitud->fecha);
    $fecha = date('d',$time)." de ".$meses[date('n',$time)-1]. " del ".date('Y',$time);
@endphp
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <style>
        #presupuesto {
            left: 450px;
            top: 10px;
            position: absolute;
        }
        #datos {
            left: 800px;
            position: absolute;
        }
        #numero {
            left: 200px;
            top: 80px;
            position: absolute;
        }
        #col-numero {
            left: 120px;
            top: 90px;
            position: absolute;
        }
        .table {
            top: 380px;
            position: absolute;
        }
        .aplicacion {
            max-width: 200px;
        }
        .text-overflow {
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .cantidad {
            width: 40px;
        }
        #opciones {
            top: 1150px;
            width: 500px;
            left: 330px;
            position: absolute;
        }
        #col-despacho {
            top: 1230px;
            width: 300px;
            border-bottom-style: solid;
            position: absolute;
        }
        #despacho {
            top: 1230px;
            left: 150px;
            position: absolute;
        }
        #leyenda {
            top: 1300px;
            position: absolute;
        }
        #leyendatext {
            top: 1300px;
            left: 100px;
            position: absolute;
        }
        #firmas {
            top: 1500px;
            width: 1000px;
            border-bottom-style: solid;
            position: absolute;
        }
        #firma {
            left: 300px;
            top: -3px;
            position: absolute;
        }
        #aclaracion {
            left: 700px;
            top: -3px;
            position: absolute;
        }
        hr { 
        border-width: 5px;
        }
        .form-control {
            width: 200px;
            border-width: 2px;
        }
        .col-colvendedor {
            top: 160px;
            position: absolute;
        }
        #vendedor {
            left: 100px;
            position: absolute;
        }
        .col-canaldeventa {
            top: 160px;
            left: 330px;
            position: absolute;
        } 
        #canaldeventa {
            left: 460px;
            position: absolute;
        } 
        #fecha {
            left: 800px;
            position: absolute;
        } 
        .col-cliente {
            top: 200px;
            position: absolute;
        } 
        #cliente {
            top: 200px;
            left: 100px;
            position: absolute;
        } 
        .col-direccion {
            top: 250px;
            position: absolute;
        } 
        #direccion {
            top: 250px;
            left: 100px;
            position: absolute;
        } 
        .col-profecional {
            top: 300px;
            position: absolute;
        } 
        #profecional {
            top: 300px;
            left: 100px;
            position: absolute;
        } 
        .col-obra {
            top: 300px;
            left: 640px; 
            position: absolute;
        } 
        #obra {
            top: 300px;
            left: 700px;
            position: absolute;
        } 
        </style>
  <body> 
    <div id="presupuesto">
        <h1 class="display-4">Pedido</h1>
        <em style="margin-right: 100px;">Comprobante (x) no valido como factura</em>
    </div>
    <div id="datos">
        <p>
            <strong>Marmoleria Magrone</strong>
            <br>
            <em>E.Policastro 414 , Adrogue</em>
            <br>
            <em>Tel/Fax 4294-6107</em>
            <em>marmoleriamagrone@hotmail.com</em>
        </p>
    </div>
    <div id="">
        <h1 class="display-1">M</h1>
    </div>
    <div id="col-numero">
            <h6 style=" font-weight: bold;">Numero:</h6> 
    </div>
    <div id="numero">
        <input type="text" class="form-control" style=" width: 80px;  font-weight: bold;" value="{{ $solicitud->pdo_id}}">    
    </div>
    <hr> 
    <div class="col-colvendedor">
        <strong>Vendedor:</strong> 
    </div>
    <div id="vendedor">   
      <input type="text" class="form-control" value="{{ $solicitud->Vendedor->nombre }}">
    </div>
    <div class="col-canaldeventa">
        <strong>Canal De Venta:</strong> 
    </div>
    <p id="fecha">ADROGUE @php echo $fecha;@endphp</p>
    <div id="canaldeventa">
        <input type="text" class="form-control" value="{{ $solicitud->canaldeventa }}">
    </div>
    <div class="col-cliente">
        <strong>Cliente:</strong> 
    </div>
    <div id="cliente">
        <input type="text" class="form-control" style=" width: 1000px;" value="{{ $solicitud->Cliente->nombre }}-{{ $solicitud->Cliente->telefono1}}">
    </div>
    <div class="col-direccion">
        <strong>Direccion:</strong> 
    </div>
    <div id="direccion">
        <input type="text" class="form-control" style=" width: 1000px;" value="{{ $solicitud->Cliente->direccion}}-{{ $solicitud->Cliente->localidad  }}">
    </div>
    <div class="col-profecional">
        <strong>Profecional:</strong> 
    </div>
    <div id="profecional">
        <input type="text" class="form-control" style=" width: 400px;" value="{{ $solicitud->Profecional->nombre }}-{{ $solicitud->Profecional->telefono}}-{{ $solicitud->Profecional->email }}">
    </div>
    <div class="col-obra">
        <strong>Obra:</strong> 
    </div>
    <div id="obra">
        <input type="text" class="form-control" value="obra">
    </div> 
    <table class="table table-sm table-bordered ">
            <thead>
            <tr class="text-center">
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col">Aplicacion</th>
                <th scope="col">Opcion</th>
            </tr>
            </thead>
            <tbody>
                @php
                for ($i=0; $i <$numeros ; $i++) { 
                    $producto = explode(",", $productos[$i]);
                    $foo = (int) $producto[3];
                    $total = number_format($foo,2,",",".");
                    echo "<tr><th>$producto[0]</th>
                    <td>$$producto[1]</td>
                    <td class='cantidad'>$producto[2]</td>
                    <td class='total'>$$total</td>
                    <td class='aplicacion'><span class='text-overflow'>$producto[4]</span></td>
                    <td class='$producto[5]'>$producto[5]</td></tr>";
                }   
                @endphp  
            </tbody>
        </table>
        <div id="col-despacho">
            <h4 style="margin-bottom: 1px;">DESPACHO:</h4>
        </div>
        <div id="despacho">
            <h5>A {{ $solicitud->despacho }}</h5>
        </div>
        <table id="opciones" class="table table-sm table-bordered">
                <tr>
                <th>Total del Pedido:</th>
                <td>$@php echo $totalPed;@endphp</td>
                </tr>
                <tr>
                <th>Seña:</th>
                <td>$@php echo number_format($solicitud->senia,2,",",".");@endphp</td>
                </tr>
                <tr>
                <th>Descuento:</th>
                <td>{{ $solicitud->descuento }}%</td>
                </tr>
                <tr>
                <th>Saldo del Pedido:</th>
                <td>$@php echo number_format($solicitud->saldo,2,",",".");@endphp</td>
                </tr>
        </table>
        <h6 id="leyenda">LEYENDA:</h6>
        <p id="leyendatext">*Presupuesto valido por 10 dias | Presupuesto: sujeto a medicion definitiva en obra | No incluye: acarreo por escalera ni izaje por exterior | Condiciones de venta: Seña por anticipo del 60% y saldo a contra entrega | Stock: a confirmar en el momento del anticipo | Formas de pago: Efectivo,cheques,transferencia,tarjeta de debito y credito*.</p>
        <div id="firmas">
        <h6 id="confirmacion">Conformidad Del Cliente:</h6>
        <h6 id="firma">FIRMA:</h6>
        <h6 id="aclaracion">ACLARACION:</h6>
        </div>      
  </body>
</html>