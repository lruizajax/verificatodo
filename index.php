<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Verifica Todo</title>
        <link rel="stylesheet" href="css/normalize.css"/> 
        <link rel="stylesheet" href="css/styles.css"/>
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
        </script>
    </head>

    <body>
        <div id="step_1">
            <table width="800" border="0" cellspacing="5" cellpadding="4" align="center" style="background-color:#000;">
                <tr>
                    <td colspan="9" align="right" style="background-color:#FFF">
                        <div id="header" align="right"><img src="images/logo.jpg" /></div>
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
                    <td><input name="options" type="radio" checked /></td>
                    <td><img src="images/img_4.png" /></td>
                    <td><input name="options"  type="radio" /></td>
                    <td><img src="images/img_2.png" /></td>
                    <td><input name="options"  type="radio" /></td>
                    <td><img src="images/img_1.png" /></td>
                    <td><input name="options"  type="radio" /></td>
                    <td><img src="images/ima_3.png" /></td>
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
                    <td><label class="labelsss">Esta bien....tranquilo,</label>
                        <br>
                        <label class="labelsss red bold">entra la placa aqui ></label></td>
                    <td colspan="8">
                        <form name="frmVerifica" id="frmVerifica" method="POST" action="verificar.php" >
                            <input type="text" id="search" placeholder="Numero de placa" name="search" onkeyup="SerchAction(event)"/>
                        </form>
                    </td>
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
        <div id="step_2" style="display:none;" >
            <table width="800" border="0" cellspacing="5" cellpadding="4" align="center" style="background-color:#000;">
                <tr>
                    <td colspan="9" align="right" style="background-color:#FFF">
                        <div id="header" align="right"><label class="logo">VERIFICA<font class="bold">TODO</font></label></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7"><label class="labelss">Estas con suerte...tenemos la hoja de verificacion para [<span id="id_placa" class="red"> xxx </span> ]</label></td>
                    <td width="70" align="center"><img src="images/img_6.png" class="hand" height="40"/></td>
                    <td width="70" align="center"><img src="images/img_5.png" class="hand" height="40" /></td>
                </tr>
                <tr>
                    <td width="290">&nbsp;</td>
                    <td width="283" colspan="6">&nbsp;</td>
                    <td width="70" align="center"><font class="labe1"> Download</font></td>
                    <td width="70" align="center"><font class="labe1">E-Mail now</font></td>
                </tr>
                <tr>
                    <td><label class="labelsss red bold hand" onclick="goback()" >< regresa y busca otra vez</label></td>
                    <td colspan="8"><input type="text" placeholder="Numero de placa" id="searchz" name="searchz"/> </td>
                </tr>
            </table>
        </div>
        <?php require_once 'google_analytics.php'; ?>
    </body>
</html>
