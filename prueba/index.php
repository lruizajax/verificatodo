<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sin título</title>
        <script src="js/jquery-1.5.1.min.js.js" type="text/javascript"></script>
        <script type="text/javascript">
            function goback(){
                $('step_1').show();
                $('step_2').hide();
            }
            function searchby(){
                $('step_1').hide();
                $('step_2').show();
            }
			function message(){
				$('#html_email').show('slow', function() {
					 $('#html_details').hide('slow', function() {
						// Animation complete.
					  });
				  });
			}
			function message_hide(){				
				$('#html_email').hide('slow', function() {
						$('#html_details').show('slow', function() {
						// Animation complete.
					  });
				  });
			}
        </script>
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
                height:1250px;
                width:800px;
                margin:auto;
                padding:auto;
                background-color:#FFF;
            }
            #header{
                height:40px;
                width:100%;
                padding-top:60px;
            }

            .labe1{
                font-family:Verdana, Geneva, sans-serif;
                font-size:11px;
                font-weight:normal;
                text-transform: lowercase;
                text-align:center;
                cursor: pointer;
            }

            .labe2{
                color:red;
                font-family:Verdana, Geneva, sans-serif;
                font-size:10px;
                font-weight:bold;
                text-transform: lowercase;
                text-align:center;
                cursor: pointer;
            }
            .labels{
                font-family:Verdana, Geneva, sans-serif;
                font-size:16px;
                font-weight:bold;
                text-transform: lowercase;
            }
            .labelss{
                font-family:Verdana, Geneva, sans-serif;
                font-size:17px;
                font-weight:normal;
                padding-bottom:20px;
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
        </style>
    </head>

    <body>
        <div id="step_1" style="display:none;">
            <div id="header" align="right"><label class="logo">VERIFICA<font class="bold">TODO</font></label></div>
            <table width="800" border="0" cellspacing="5" cellpadding="4" align="center" style="background-color:#000;">
                <tr>
                    <td colspan="9" align="right" style="background-color:#FFF">

                    </td>
                </tr>
                <tr>
                    <td><label class="labelss">Amigo, un favor ...</label></td>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td><label class="labelss">me puedes verificar un</label></td>
                    <td><input name="options" type="radio" /></td>
                    <td><label class="labels">AUTO</label></td>
                    <td><input name="options"  type="radio" /></td>
                    <td><label class="labels">CASA/APA</label></td>
                    <td><input name="options"  type="radio" /></td>
                    <td><label class="labels">PUESTO</label></td>
                    <td><input name="options"  type="radio" /></td>
                    <td><label class="labels">CLINICA</label></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><label class="labelsss">Esta bien....tranquilo,</label><br><label class="labelsss red bold">entra la placa aqui ></label></td>
                    <td colspan="8"><input type="text" id="search" name="search" onkeypress="javascript:if(getKeyCode(event)==13){ searchby();}"/> </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
        <div id="step_2">
            <table width="800" border="0" cellspacing="5" cellpadding="4" align="center" style="background-color:#000;">
                <tr>
                    <td colspan="4" align="right" style="background-color:#FFF">
                        <div id="header" align="right"><label class="logo">VERIFICA<font class="bold">TODO</font></label></div>
                    </td>
                </tr>
                <tr>
                    <td width="570"><div class="labelss">Estas con suerte...tenemos la hoja de verificacion para [<span id="id_placa" class="red"> xxx </span> ]</div></td>
                    <td width="70"  align="center"><img src="images/img_6.png" class="hand" height="70"/></td>
                    <td width="70"  align="center"><img src="images/img_5.png" class="hand" height="70" onclick="message()" /></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td width="70"  align="center"><font class="labe2"> Download</font></td>
                    <td width="70"  align="center"><font class="labe2">E-Mail now</font></td>
                    <td >&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4"><label class="labelsss red bold hand" onclick="goback()" >< regresa y busca otra vez</label></td>
                </tr>
            </table>
            <div style="margin:40px 40px 0px 40px; width:720px; border:1px solid #808080; height:80px;color:#4c4c4c;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td width="30%">logo</td>
                        <td width="40%"><b>AUTO</b> REPORT</td>
                        <td width="30%">municipalida de lima</td>
                    </tr></table>
            </div>
            <div id="html_email" style="margin:0px 40px 0px 40px; overflow:auto; height:200px; width:718px; border:solid 2px #FF0000;display:block;z-index:9999999999; display: none;">
            <form name="send_email" id="send_email" method="post" action="send_email.php">
              <table width="100%" border="0" cellspacing="2" cellpadding="2" style="color:#000;">
                <tr>
                  <td width="22%">&nbsp;</td>
                  <td width="3%" align="center">&nbsp;</td>
                  <td width="44%">&nbsp;</td>
                  <td width="31%" align="right"><span style="cursor:pointer;" onclick="message_hide()">[ X ]</span></td>
                </tr>
                <tr>
                  <td align="right"><label for="de">De</label></td>
                  <td align="center">:</td>
                  <td><input style="height:20px; width:300px; padding-left:20px; border:1px solid #F00; text-align:center; font-size:12px; color:#808080;" type="text" id="de" name="de" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><label for="para">Para</label></td>
                  <td align="center">:</td>
                  <td><input style="height:20px; width:300px; padding-left:20px; border:1px solid #F00; text-align:center; font-size:12px; color:#808080;" type="text" id="para" name="para" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><label for="asunto">Asunto</label></td>
                  <td align="center">:</td>
                  <td><textarea style="width:300px; border:1px solid #F00; padding-left:20px; text-align:justify; font-size:12px; color:#808080;resize:none;"  id="asunto" name="asunto" cols="20" rows="2"></textarea></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                  <td align="right"><input type="submit" value="Enviar Email"  id="sendemail" /></td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              </form>
            </div>
      <div id="html_details" style="margin:0px 40px 0px 40px; width:720px;height:772px;color:#4c4c4c; background-image:url(images/fondo.png); background-repeat:repeat;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td width="30%">
                            <div style="border-right:1px solid #808080; padding-top:20px;border-bottom:1px solid #808080; height:150px; width:250px; color:#4c4c4c;">
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
                                <div align="center" style="color:#000; font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:24px;height:30px; padding-top:5px;">01/15/2012</div>
                                <div align="center" style="color:#808080; font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:20px;height:25px; padding-top:5px;">Sobre el Auto</div>
                            </div>
                        </td>
                        <td width="70%">
                            <div style="border-bottom:1px solid #808080;width:470px; height:210px;">
                            <div align="right" style="padding-right:5px; color:#808080; font-family:Verdana, Geneva, sans-serif; font-size:22px; padding-top:15px; font-style:normal; font-weight:bold;">Infraciones</div>

                            </div>
                            <div style="border-bottom:1px solid #808080;width:470px; height:210px;">
							<div align="right" style="padding-right:5px; color:#808080; font-family:Verdana, Geneva, sans-serif; font-size:22px; padding-top:15px; font-style:normal; font-weight:bold;">Impuestos</div>
                            </div>
                            <div style="border-bottom:1px solid #808080;width:470px; height:350px;">
<div align="right" style="padding-right:5px; color:#808080; font-family:Verdana, Geneva, sans-serif; font-size:22px; padding-top:15px; font-style:normal; font-weight:bold;">Otros Datos</div>
                            </div>
                        </td>
                    </tr></table>
            </div>
            <div align="center" style="background-color:#000; color:#F00; font-family:Verdana, Geneva, sans-serif; font-size:20px; font-weight:normal; height:35px; padding-top:8px;width:722px; margin:0px 40px 0px 40px;">ATENCION: <span style="font-size:14px; color:#FFF; font-weight:normal;"> Es recomendo la confirmacion de estos datos con la Municipalidad de Lima</span></div>
        </div>
    </body>
</html>
