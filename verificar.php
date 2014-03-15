<?php
require_once("config.php");

function get_inner_html($node)
{
    $innerHTML = '';
    $children = $node->childNodes;
    foreach ($children as $child) {
        $innerHTML .= $child->ownerDocument->saveXML($child);
    }

    return $innerHTML;
}

function obtenerReferenciaAutos($marca, $modelo, $anio)
{
    $html = file_get_contents("http://neoauto.clasificados.pe/venta/" . strtolower($marca) . "-" . strtolower($modelo) . "?precio_min=1&precio_max=1000000&a%C3%B1o=" . ($anio + 1) . '-' . $anio . "&ord_year=0");
    $doc = new DomDocument;
    ini_set('display_errors', 0);
    $doc->loadHTML($html);
    ini_set('display_errors', 1);
    $referencias = '<link href="http://s.neoauto.e3.pe/f/css/0km/screen.css?v=32" media="screen" rel="stylesheet" type="text/css" />
        <link href="http://s.neoauto.e3.pe/f/css/0km/print.css?v=32" media="media" rel="stylesheet" type="text/css" />
        <link href="http://s.neoauto.e3.pe/f/css/0km/adaptacion0km.css?v=32" media="screen" rel="stylesheet" type="text/css" />
        <link href="http://s.neoauto.e3.pe/f/css/concesionario.css?v=32" media="screen" rel="stylesheet" type="text/css" />  
        <div style="width: 750px">
            <div class="main_rs" id="result_search">
                ' . get_inner_html($doc->getElementById('rs_search')) . '
            </div>
        </div>';
    return $referencias;
}

if ($_POST) {
    $keyVal = trim($_POST['search']);
    require_once("access_db.php");

    $vehiculosReferenciales = '';
    $dv = null;

    $q = "select PLACA, NOMBRE_MODALIDAD_SERVICIO, NOMBRE_CLASE_VEHICULO, ANO_FABRICACION, NOMBRE_MODELO, NOMBRE_MARCA , NUMERO_SERIE, NUMERO_SERIE_MOTOR, NOMBRE_TIPO_COMBUSTIBLE, PESO_SECO, PESO_BRUTO, LONGITUD, ALTURA, ANCHO, CARGA_UTIL, CAPACIDAD_PASAJERO, NUMERO_ASIENTO, NUMERO_RUEDA, NUMERO_EJE, NUMERO_PUERTA, FECHA_INSCRIPCION_VEHICULO, NOMBRE_TIPO_DOCUMENTO, DOCUMENTO, PROPIETARIO   from directorio_vehiculo where PLACA = '" . $keyVal . "'";
    $r = mysql_query($q);
    if (mysql_num_rows($r) > 0) {
        $dv = mysql_fetch_array($r);
        if ($dv['NOMBRE_MARCA'] != '' && $dv['NOMBRE_MODELO'] != '' && $dv['ANO_FABRICACION'] != '') {
            #$vehiculosReferenciales = obtenerReferenciaAutos($dv['NOMBRE_MARCA'], $dv['NOMBRE_MODELO'], $dv['ANO_FABRICACION']);
        }
    }

    $directorioSanciones = null;

    $q1 = "select FECHA_INFRACCION, NOMBRE_CLASE_INFRACCION, NOMBRE_TIPO_INFRACCION, NUMERO_RS, FLAG_SIN_PLACA, NUM_DOC_INFRACTOR, APELLIDOS_INFRACTOR, NOMBRES_INFRACTOR, ID_DNI_CONCESIONARIA, APELL_RAZON_SOCIAL_PROPIETARIO, RUTA, NOMBRE_VIA_INFRACCION, NOMBRE_DISTRITO, DNI_SUPERVISOR, INSPECTOR  from directorio_sancion where PLACA =  '" . $keyVal . "' ORDER BY FECHA_INFRACCION DESC";
    $rs = mysql_query($q1);


    //Vehículos Afectos al Impuesto al Patrimonio Vehicular
    $impuestoVehicular = null;

    $q1 = "select N_PERSONA, TIPO_PERSONA, TIPO_CONTRIBUYENTE,DISTRITO_DOMIICILIO_FISCAL,PORCENTAJE_PROPIEDAD, PLACA, ANO_FABRICACION, FEC_ADQUISICION_VEHICULO, FEC_1RA_INSCRIPCION_SUNARP, CLASE_VEHICULO, CATEGORIA_VEHICULO, MARCA, MODELO, VALOR_ADQUISICION_US, VALOR_ADQUISICION_S, VALOR_REFERENCIAL_2011_S  from vehiculo_afectado where PLACA =  '" . $keyVal . "' limit 1";
    $iv = mysql_query($q1);
    
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VerificaTodo</title>
<script src="js/jquery-1.5.1.min.js.js" type="text/javascript"></script>
<script type="text/javascript" src="js/ajax_vt.js"></script> 

    <style type="text/css">
	body{
	background-color:#000;
	color:#FFF;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	font-weight:normal;
	}
	#step_1{
		height:500px;
		width:800px;
		margin:auto;
		padding:auto;
		background-color:#FFF;
	}
        #step_2{
		width:800px;
		margin:auto;
		padding:auto;
		background-color:#FFF;
	}
	#header{
	width:100%;
	}
	.labe1{
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	font-weight:normal;
	text-transform: lowercase;
        text-align:center;
        cursor: pointer;
        width: 100%;
	}
	.labels{
	font-family:Verdana, Geneva, sans-serif;
	font-size:16px;
	font-weight:bold;
	text-transform: lowercase;
	}
	.labelss{
	font-family:Verdana, Geneva, sans-serif;
	font-size:16px;
	font-weight:normal;
	}
	.labelsss{
	font-family:Verdana, Geneva, sans-serif;
	font-size:17px;
	font-weight:normal;
	line-height:30px;
	}
	.logo{
	font-family:Verdana, Geneva, sans-serif;
	font-size:30px;
	font-weight:normal;
	color:#000;
	text-transform: lowercase;
	letter-spacing:3px;
	}
	.bold{
	font-weight:bold;
	}
	.red{
	color:red;
	}
	#search{
	height:45px;
	width:530px;
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	font-size:32px;
	color:#808080;
	text-transform:uppercase;
	border-style:solid 1px red;
	}
	#searchz{
	height:45px;
	width:400px;
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	font-size:32px;
	color:#808080;
	text-transform:uppercase;
	border-style:solid 1px red;
	visibility:hidden;
	}
	.hand{
	cursor:pointer;
	}
    .tablaps td {
        padding-bottom: 10px
    }
</style>
</head>

<body>

<div id="step_2">
    <table width="800" border="0" cellspacing="5" cellpadding="4" align="center" style="background-color:#000;">
        <tr>
            <td colspan="4" align="right" style="background-color:#FFF">
                <div id="header" align="right"><img src="images/logo.jpg" /></div>
            </td>
        </tr>
        <tr>
            <td width="570"><div class="labelss">Estas con suerte...tenemos la hoja de verificacion para [<span id="id_placa" class="red"> <?php echo $keyVal ?> </span> ]</div></td>
            <td width="70"  align="center"><img src="images/img_6.png" class="hand" height="70"  style="cursor: pointer" onclick="parent.location.href='pdf_verifica.php?keyPlaca=<?php echo $keyVal ?>'"/></td>
            <td width="70"  align="center"><img src="images/img_5.png" class="hand" height="70" /></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td width="70"  align="center"><font class="labe2" style="cursor: pointer" onclick="parent.location.href='pdf_verifica.php?keyPlaca=<?php echo $keyVal ?>'"> Download</font></td>
            <td width="70"  align="center"><font class="labe2">E-Mail now</font></td>
            <td >&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4"><label class="labelsss red bold hand" onclick="self.location.href='http://verificatodo.com'" >< regresa y busca otra vez</label></td>
        </tr>
    </table>
    <div style="margin:40px 40px 0px 40px; width:720px; border:1px solid #808080; height:80px;color:#4c4c4c;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="30%"><img src="images/logo_1.png" /></td>
                <td width="40%" style="font-size: 33px"><strong>AUTO</strong> REPORT</td>
                <td width="30%" style="text-align: right"><img src="images/logo_muni_1.png" height="81"  /></td>
            </tr></table>
    </div>
    <div style="margin-left:40px; margin-right:40px; margin-top:0px; width:720px;height:772px;color:#4c4c4c; background-image:url(images/fondo.png); background-repeat:repeat;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="30%" valign="top">
                    <div style="border-right:1px solid #808080; padding-top:20px;border-bottom:1px solid #808080;  width:250px; color:#4c4c4c;">
                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                            <tr>
                                <td align="center"><img src="images/verificado2/check.png" border="0" width="64" style="padding-bottom:10px;"/></td>
                                <td align="center"><img src="images/verificado2/check.png" border="0" width="64" style="padding-bottom:10px;"/></td>
                                <td align="center"><img src="images/verificado2/check.png" border="0" width="64" style="padding-bottom:10px;"/></td>
                            </tr>
                            <tr>
                                <td align="center"><b>1</b></td>
                                <td align="center"><b>0</b></td>
                                <td align="center"><b>0</b></td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size:10px;font-weight:bold;">Dueño</td>
                                <td align="center" style="font-size:10px;font-weight:bold;">Infracciones<br />sin pagar</td>
                                <td align="center" style="font-size:10px;font-weight:bold;">Impuestos<br />sin pagar</td>
                            </tr>
                        </table>
                    </div>
                    <div style="border-right:1px solid #808080;width:250px; height:600px;">
                        <div align="center" style="color:#808080; font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:14px; height:20px; padding-top:5px;">Fecha de reporte</div>
                        <div align="center" style="color:#000; font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:24px;height:30px; padding-top:5px;"><?php echo date('d/m/Y') ?></div>
                        <div style="font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-top:5px;">
                            <table class="tablaps">
                                <tr>
                                    <td><strong>Propietario:</strong> <?php echo $dv['PROPIETARIO'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tipo documento:</strong> <?php echo $dv['NOMBRE_TIPO_DOCUMENTO'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Documento:</strong> <?php echo $dv['DOCUMENTO'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Modalidad Servicio:</strong> <?php echo $dv['NOMBRE_MODALIDAD_SERVICIO'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Modalidad Servicio:</strong> <?php echo $dv['NOMBRE_MODALIDAD_SERVICIO'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha Insc. vehiculo:</strong> <?php echo $dv['FECHA_INSCRIPCION_VEHICULO'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </td>
                <td width="70%" valign="top">
                    <div style="border-bottom:1px solid #808080;width:470px; ">
                        <div align="right" style="padding-right:5px; color:#808080; font-family:Verdana, Geneva, sans-serif; font-size:22px; padding-top:15px; font-style:normal; font-weight:bold;">Sobre el Auto</div>
                        <?php if ($dv): ?>
                        <table class="tablaps">
                            <tr>
                                <td><strong>Clase:</strong> <?php echo $dv['NOMBRE_CLASE_VEHICULO'] ?></td>
                                <td><strong>Año de Fabricación:</strong> <?php echo $dv['ANO_FABRICACION'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Marca:</strong> <?php echo $dv['NOMBRE_MARCA'] ?></td>
                                <td><strong>Modelo:</strong> <?php echo $dv['NOMBRE_MODELO'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Número Serie:</strong> <?php echo $dv['NUMERO_SERIE'] ?></td>
                                <td><strong>Número Serie Motor:</strong> <?php echo $dv['NUMERO_SERIE_MOTOR'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nombre Tipo Combustible:</strong> <?php echo $dv['NOMBRE_TIPO_COMBUSTIBLE'] ?></td>
                                <td><strong>Número puerta:</strong> <?php echo $dv['NUMERO_PUERTA'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Peso Seco:</strong> <?php echo $dv['PESO_SECO'] ?></td>
                                <td><strong>Peso Bruto:</strong> <?php echo $dv['PESO_BRUTO'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Longitud:</strong> <?php echo $dv['LONGITUD'] ?></td>
                                <td><strong>Altura:</strong> <?php echo $dv['ALTURA'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Ancho:</strong> <?php echo $dv['ANCHO'] ?></td>
                                <td><strong>Carga Util:</strong> <?php echo $dv['CARGA_UTIL'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Capacidad pasajero:</strong> <?php echo $dv['CAPACIDAD_PASAJERO'] ?></td>
                                <td><strong>Número Asiento:</strong> <?php echo $dv['NUMERO_ASIENTO'] ?></td>
                            </tr>
                            <tr>
                                <td><strong>Número Rueda:</strong> <?php echo $dv['NUMERO_RUEDA'] ?></td>
                                <td><strong>Número eje:</strong> <?php echo $dv['NUMERO_EJE'] ?></td>
                            </tr>
                            <tr>
                                
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                        <?php endif ?>
                    </div>
                    <div style="border-bottom:1px solid #808080;width:470px; ">
                        <div align="right" style="padding-right:5px; color:#808080; font-family:Verdana, Geneva, sans-serif; font-size:22px; padding-top:15px; font-style:normal; font-weight:bold;">Infraciones</div>
                        <?php if (mysql_num_rows($rs) > 0): ?>
                            <table class="tablaps">
                                <tr>
                                    <th>FECHA</th>
                                    <th>CLASE</th>
                                    <th>TIPO</th>
                                </tr>
                                <?php while ($row = mysql_fetch_array($rs)): ?>
                                    <tr>
                                        <td><?php echo $row['FECHA_INFRACCION'] ?></td>
                                        <td><?php echo $row['NOMBRE_CLASE_INFRACCION'] ?></td>
                                        <td><?php echo $row['NOMBRE_TIPO_INFRACCION'] ?></td>
                                    </tr>
                                <?php endwhile ?>
                            </table>
                        <?php endif ?>
                    </div>
                    <div style="border-bottom:1px solid #808080;width:470px; ">
                        <div align="right" style="padding-right:5px; color:#808080; font-family:Verdana, Geneva, sans-serif; font-size:22px; padding-top:15px; font-style:normal; font-weight:bold;">Impuestos</div>
                        <?php if (mysql_num_rows($iv) > 0): ?>
                            <table class="tablaps">
                                <tr>
                                    <td>TIPO CONTRIBUYENTE</td>
                                    <td>F. INSCRIPCION SUNARP</td>
                                    <td>VALOR ADQUISICION US$</td>
                                    <td>VALOR ADQUISICION SOLES</td>
                                    <td>VALOR REFERENCIAL 2011 SOLES</td>
                                </tr>
                                <?php while ($row = mysql_fetch_array($iv)): ?>
                                    <tr>
                                        <td><?php echo $row['TIPO_CONTRIBUYENTE'] ?></td>
                                        <td><?php echo $row['FEC_1RA_INSCRIPCION_SUNARP'] ?></td>
                                        <td><?php echo $row['VALOR_ADQUISICION_US'] ?></td>
                                        <td><?php echo $row['VALOR_ADQUISICION_S'] ?></td>
                                        <td><?php echo $row['VALOR_REFERENCIAL_2011_S'] ?></td>
                                    </tr>
                                <?php endwhile ?>
                            </table>
                        <?php endif ?>
                    </div>
                    
                </td>
            </tr></table>
    </div>
    <div align="center" style="background-color:#000; color:#F00; font-family:Verdana, Geneva, sans-serif; font-size:20px; font-weight:normal; height:35px; padding-top:8px;width:720px; margin:0px 40px 0px 40px;">ATENCION: <span style="font-size:14px; color:#FFF; font-weight:normal;"> Es recomendo la confirmacion de estos datos con la Municipalidad de Lima</span></div>
</div>
</body>
<?php
echo $vehiculosReferenciales;
exit;
} 

header("Location: http://verificatodo.com");
