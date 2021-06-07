<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro del Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>
        
        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i>Datos del Cliente</strong>
        </h1>
       
    </header>
        <h4 style="text-align: center;">Registro del cliente</h4>
        
        <table class="display table table-striped table-hover add-row nowrap">
            <tr>
                <th> Cliente:</th>
                <td colspan="3">{{ $cliente->nombre }}-{{ $cliente->apellido }}</td>
                <th>Provincia-Cantón:</th>
                <td colspan="1">{{ $cliente->canton->provincia->name }}-{{ $cliente->canton->name }}
                </td>
            </tr>
            <tr>
                <th>Contacto 1:</th>
                <td>{{ $cliente->contacto }}</td>
                <th><strong>Contacto 2:</strong></th>
                <td> {{ $cliente->contacto1 }}</td>
                <th><strong>Correo electronico:</strong></th>
                <td> {{ $cliente->email }}</td>
            </tr>
            <tr>
              
                <th>Cdla o Recinto:</th>
                <td>{{ $cliente->cdaorecinto }}</td>
                <th>Dirección:</th>
                <td colspan="3">{{ $cliente->direccion }}
                </td>
            </tr>
            <tr>
                <th>
                    GPS:
                </th>
                <td>
                    <a class="" data-toggle="tooltip"
                        data-original-title="Abrir Ubicación del cliente GPS" target="_blank"
                        href="{{ $cliente->gps }}"><i class="fas fa-external-link-alt"></i> Abrir
                        Ubicación</a>
                </td>
                <th colspan="2">
                    Servicio de Radio o fibra:
                </th>
                <td colspan="3">
                    @if ($cliente->servicio==1)Radio
                    @endif  @if ($cliente->servicio==0)Fibra @endif
                </td>
            </tr>
         
        </table>
    <footer>
        <p>
            <strong> Derechos rersevados</strong>
        </p>
        
    </footer>
    
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(370, 570, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>

</body>
</html>