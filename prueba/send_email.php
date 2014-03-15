<?php
ini_set('display_errors', 1);
require_once('mail/config.php');
require_once('mail/class.phpmailer.php');
$de = $_POST['de'];
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host     = MXHOST;
$mail->SMTPAuth = true;
$mail->Username = MXUSER;
$mail->Password = MXPASS;
$mail->From     = "info@vereficatodo.com";
$mail->FromName = "Info Verifica Todo";
$mail->AddAddress($_POST['para'], 'Verifica Todo');
$mail->AddBCC('luis.ruiz@bongous.com', 'Verifica Todo');
$mail->AddBCC('luis.ruiz@bongous.com', 'Verifica Todo');
$mail->IsHTML(true);
$mail->Subject  =  "Verificacion Solicitada";
$body = <<<HTMLSTR
<table width="432" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td  height="30" colspan="2" style="line-height:20px;font-family:Verdana;font-size:13px;"><b><u>Informacion de Envio</u></b></td>
    </tr>
    <tr>
        <td style="font-family:Verdana;font-size:13px;" width="50%" class="fields"><b>De:</b></td>
        <td style="font-family:Verdana;font-size:13px;" width="50%" class="fields">{$_POST['de']}&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" style="font-family:Verdana;font-size:13px;">&nbsp;</td>
    </tr>
    <tr>
        <td  style="font-family:Verdana;font-size:13px;"><b>Para:</b></td>
        <td  style="font-family:Verdana;font-size:13px;">{$_POST['para']}&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2"  style="font-family:Verdana;font-size:13px;">&nbsp;</td>
    </tr>
    <tr>
        <td  style="font-family:Verdana;font-size:13px;"><b>Asunto: </b></td>
        <td  style="font-family:Verdana;font-size:13px;">{$_POST['asunto']}&nbsp;</td>
    </tr>
</table>
HTMLSTR;
$mail->Body     =  $body;
$mail->AltBody  =  $body;
if ($responde = $mail->Send()){
    print_r($responde);
}  else {
    print_r($responde);
};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>VerificaTodo</title>        
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
        <div id="step_1">
          <div id="header" align="right"><label class="logo">VERIFICA<font class="bold">TODO</font></label></div>
            <table width="800" border="0" cellspacing="5" cellpadding="4" align="center" style="background-color:#000;">
                <tr>
                    <td colspan="9" align="right">

                    </td>
                </tr>
                <tr>
                    <td width="184"><label class="labelss">&nbsp;</label></td>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <td>El correo se envio a:</td>
                    <td colspan="8"><?php if($_POST['para']!=""){ echo $_POST['para'];} ?></td>
                </tr>
                <tr>
                    
                    <td colspan="8" align="left"><label class="labelsss" style="display:none;" >Esta bien....tranquilo,</label>
                      <br />
                    <label class="labelsss red bold" onclick="self.location.href='http://verificatodo.com'">< regresa a seguir verificando</label></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td width="217">&nbsp;</td>
                    <td width="38">&nbsp;</td>
                    <td width="38">&nbsp;</td>
                    <td width="38">&nbsp;</td>
                    <td width="38">&nbsp;</td>
                    <td width="38">&nbsp;</td>
                    <td width="38">&nbsp;</td>
                    <td width="49">&nbsp;</td>
                </tr>
            </table>
        </div>
        
    </body>
</html>
