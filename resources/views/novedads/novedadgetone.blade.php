<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pdf Novedad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilopdf.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/quantika.png') }}" alt="navbar brand" class="navbar-brand">
        </div>
        
        <h1 class="nombr">
            <strong><i class="fas fa-wrench"></i> Novedad registrada</strong>
        </h1>
     
    </header>
 
        <h4 style="text-align: center;">Novedad</h4>
        
        <table class="display table table-striped table-hover add-row nowrap">
            <tr>
                <th> #{{ $novedad->id }}</th>
               </tr>
            <tr>
                <th> Cliente:</th>
                <td colspan="2">{{ $novedad->cliente->nombre }}-{{ $novedad->cliente->apellido }}</td>
                <th> Hora de novedad:</th>
                <td colspan="2">{{ $novedad->horainciar }}</td>
            </tr>
            <tr>
                <th>Contacto 1:</th>
                <td>{{ $novedad->cliente->contacto }}</td>
                <th><strong>Contacto 2:</strong></th>
                <td> {{ $novedad->cliente->contacto1 }}</td>
                <th><strong>Correo electronico:</strong></th>
                <td> {{ $novedad->cliente->email }}</td>
            </tr>
            <tr>
                <th>Novedad o percance:</th>
                <td colspan="1">
                    @if ($novedad->novedadopercance === 1)
                        <span class="badge badge-success">Instalación</span>
                    @elseif($novedad->novedadopercance === 2)
                        <span class="badge badge-info">Retiro de Equipo</span>
                    @elseif($novedad->novedadopercance === 3)
                        <span class="badge badge-warning">Reinstalación</span>
                    @elseif($novedad->novedadopercance === 4)
                        <span class="badge badge-danger">Intermitente</span>
                    @elseif($novedad->novedadopercance === 5)
                        <span class="badge badge-info">Lento</span>
                    @elseif($novedad->novedadopercance === 6)
                        <span class="badge badge-warning">Desconf. Router</span>
                    @elseif($novedad->novedadopercance === 7)
                        <span class="badge badge-warning">Cable. Dañado</span>
                    @elseif($novedad->novedadopercance === 8)
                        <span class="badge badge-info">Problema de Equipos</span>
                        @elseif($novedad->novedadopercance === 9)
                        <span class="badge badge-info">Sin servicio</span>
                        @elseif($novedad->novedadopercance === 10)
                        <span class="badge badge-info">Otros</span>
                    @endif
                </td>
                <th>Provincia-Cantón:</th>
                <td>{{ $novedad->cliente->canton->provincia->name }}-{{ $novedad->cliente->canton->name }}
                </td>
                <th>Cdla o Recinto:</th>
                <td>{{ $novedad->cliente->cdaorecinto }}</td>
            </tr>
            <tr>
                <th>
                    GPS:
                </th>
                <td>
                    <a class="" data-toggle="tooltip"
                        data-original-title="Abrir Ubicación del cliente GPS" target="_blank"
                        href="{{ $novedad->cliente->gps }}"><i class="fas fa-external-link-alt"></i> Abrir
                        Ubicación</a>
                </td>
                <th>
                    Dirección:
                </th>
                <td colspan="3">
                    {{ $novedad->cliente->direccion }}
                </td>
            </tr>
            <tr>
                <th>
                    Especificar:
                </th>
                <td colspan="5">
                    {{ $novedad->especificar }}
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