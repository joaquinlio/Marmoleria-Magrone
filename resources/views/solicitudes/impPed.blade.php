@php
    $productos = explode("/", $solicitud->productos);
    $numeros = count($productos);
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
        .icono{
            position: absolute;
        }
        #datos {
            left: 800px;
            position: absolute;
        }
        #numero {
            left: 250px;
            top: 90px;
            position: absolute;
        }
        #col-numero {
            left: 170px;
            top: 90px;
            position: absolute;
        }
        .table {
            top: 400px;
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
        .form-control {
            width: 200px;
            border-width: 2px;
        }
        .col-colvendedor {
            top: 210px;
            left: 450px;
            position: absolute;
        }
        #vendedor {
            top: 210px;
            left: 550px;
            position: absolute;
        }
        .col-canaldeventa {
            top: 210px;
            left: 770px;
            position: absolute;
        } 
        #canaldeventa {
            top: 210px;
            left: 900px;
            position: absolute;
        } 
        #fecha {
            top: 160px;
            left: 800px;
            position: absolute;
        } 
        .col-cliente {
            top: 160px;
            position: absolute;
        } 
        .col-cliente {
            top: 160px;
            position: absolute;
        } 
        #cliente {
            top: 150px;
            left: 100px;
            position: absolute;;      
        } 
        .col-direccion {
            top: 210px;
            position: absolute;
        } 
        #direccion {
            top: 210px;
            left: 100px;
            position: absolute;
        } 
        .col-profesional {
            top: 260px;
            position: absolute;
        } 
        #profesional {
            top: 260px;
            left: 100px;
            position: absolute;
        } 
        .col-obra {
            top: 310px;
            position: absolute;
        } 
        #obra {
            top: 310px;
            left: 100px;
            position: absolute;
        } 
        .col-observacion {
            top: 260px;
            left: 520px; 
            position: absolute;
        } 
        #observacion {
            top: 260px;
            left: 650px;
            position: absolute;
        } 
        #imagen {
            top: 2000px;
            position: absolute;
        } 
        </style>
  <body> 
    <div id="presupuesto">
        <h1 class="display-4">Pedido</h1>
        <em style="margin-right: 100px;">Comprobante (x) no válido como factura</em>
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
        <img src="http://190.105.234.121/marmoleria/public/imagen/icono.png" alt="" class="icono">
    </div>
    <div id="col-numero">
            <h6 style=" font-weight: bold;">Número:</h6> 
    </div>
    <div id="numero">
        <input type="text" class="form-control" style=" width: 80px;  font-weight: bold;" value="{{ $solicitud->sol_id}}">    
    </div>
    <div class="col-colvendedor">
        <strong>Vendedor:</strong> 
    </div>
    <div id="vendedor">   
      <input type="text" class="form-control" value="{{ $solicitud->vendedor }}">
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
        <input type="text" id="clienteInput" class="form-control" style=" width: 600px;"  value="{{ $solicitud->Cliente->nombre }}-{{ $solicitud->Cliente->telefono1}}">
    </div>
    <div class="col-direccion">
        <strong>Direccion:</strong> 
    </div>
    <div id="direccion">
        <input type="text" class="form-control" style=" width: 300px;" value="{{ $solicitud->Cliente->direccion}}-{{ $solicitud->Cliente->localidad  }}">
    </div>
    <div class="col-profesional">
        <strong>Profesional:</strong> 
    </div>
    <div id="profesional">
        @if ($solicitud->profesional != null)
        <input type="text" class="form-control" style=" width: 400px;" value="{{ $solicitud->Profesional->nombre }}-{{ $solicitud->Profesional->telefono}}-{{ $solicitud->Profesional->email }}">
        @else
        <input type="text" class="form-control" style=" width: 400px;">
        @endif
    </div>
    <div class="col-obra">
        <strong>Obra:</strong> 
    </div>
    <div id="obra">
        <input type="text" class="form-control" value="{{ $solicitud->obra }}">
    </div>
    <div class="col-observacion">
        <strong>Observacion:</strong> 
    </div>
    <div id="observacion">
        <textarea class="form-control" rows="3"  style=" width: 450px;">{{ $solicitud->observacion }}</textarea>
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
                    <td>$$total</td>
                    <td class='total' style='display:none;'>$producto[3]</td>
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
                <td>@php
                    $descuento =  $solicitud->totalPed / 100 * $solicitud->descuento;
                   echo "$".$descuento;
                @endphp</td>
                </tr>
                <tr>
                <th>Saldo del Pedido:</th>
                <td>$@php echo number_format($solicitud->saldo,2,",",".");@endphp</td>
                </tr>
        </table>
        <h6 id="leyenda">LEYENDA:</h6>
        <p id="leyendatext">*Presupuesto válido por 10 días | Presupuesto: sujeto a medición definitiva en obra | No incluye: acarreo por escalera ni izaje por exterior | Condiciones de venta: Seña por anticipo del 60% y saldo a contra entrega | Stock: a confirmar en el momento del anticipo | Formas de pago: Efectivo,cheques,transferencia,tarjeta de débito y crédito*.</p>
        <div id="firmas">
        <h6 id="confirmacion">Conformidad Del Cliente:</h6>
        <h6 id="firma">FIRMA:</h6>
        <h6 id="aclaracion">ACLARACION:</h6>
        </div>
        @if ($solicitud->imagen)
        <img id="imagen" src="{{ $solicitud->imagen }}" alt="" style="width:100%;"> 
        @endif   
  </body>
</html>
<script>
        $(document).ready(function(){
            window.addEventListener("afterprint", function(){
                this.close();
            }, false);
        });
    </script>