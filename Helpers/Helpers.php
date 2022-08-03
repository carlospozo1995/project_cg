<?php

    // RETORNA LA URL DEL PROYECTO
    function base_url(){
        return BASE_URL;
    }

    // RETORNA URL MEDIA
    function media(){
        return BASE_URL."Assets/";
    }

    function fecha(){
        $dia = date("d");
        $mes = date("m");
        $año = date("Y");

        $dia_semana = [
            "Monday"=>"Lunes",
            "Tuesday"=>"Martes",
            "Wednesday"=>"Miercoles",
            "Thursday"=>"Jueves",
            "Friday"=>"Viernes",
            "Saturday"=>"Sabado",
            "Sunday"=>"Domingo",
        ];

        $mes_año = [
            "01"=>"Enero",
            "02"=>"Febrero",
            "03"=>"Marzo",
            "04"=>"Abril",
            "05"=>"Mayo",
            "06"=>"Junio",
            "07"=>"julio",
            "08"=>"Agosto",
            "09"=>"Septiembre",
            "10"=>"Octubre",
            "11"=>"Noviembre",
            "12"=>"Diciembre",
        ];

        $fecha_final = $dia_semana[date("l")]." ".$dia." de ".$mes_año[$mes]." del ".$año."<br>".date("g:i a");
        return$fecha_final;
    }

    // RETORNA LOS DIFERENTES TEMPLATES

    function headerPage($data=""){
        $view_header = "Views/Template/header_page.php";
        require_once($view_header);
    }

    function footerPage($data=""){
        $view_footer = "Views/Template/footer_page.php";
        require_once($view_footer);
    }

    // MUESTRA INFORMACION FORMATEADA
    function dep($data){
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }

    function getModal(string $nameModal, $data){
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once($view_modal);
    }

    // // ENVIO DE CORREOS
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($data, $template){
        require 'Libraries/Include/PHPMailer/src/Exception.php';
        require 'Libraries/Include/PHPMailer/src/PHPMailer.php';
        require 'Libraries/Include/PHPMailer/src/SMTP.php';

        $nameUser = $data['nameUser'];
        $mailUser = $data['email'];
        $recovery = $data['url_recovery'];
        $asunto = utf8_decode($data['asunto']);
        
        ob_start();
        require_once("Views/Template/Email/".$template.".php");
        $message = ob_get_clean();

        $mail = new PHPMailer();

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                                            
            $mail->Host       = MAIL_HOST;                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = MAIL_USERNAME;                     
            $mail->Password   = MAIL_PASSWORD;                               
            $mail->SMTPSecure = 'ssl';            
            $mail->Port       = 465;                                    

            //Recipients
            $mail->setFrom(MAIL_USERNAME);
            $mail->addAddress($mailUser, $nameUser);

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = $asunto;
            $mail->Body    = $message;
            // $mail->AltBody = strip_tags();

            return $mail->send();
            
        } catch (Exception $e) {
            echo $mail->ErrorInfo;
        }
    }

    // ELIMINA EXCESOS DE ESPACIOS ENTRE PALABRAS (evitar inyecciones sql)
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("in NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace('LIKE ´',"",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        $string = str_ireplace("-","",$string);
        return $string;
    }

    // GENERA UNA CONTRASEÑA DE 10 CARACTERES
    function passGenerator($length = 10){
        $pass = "";
        $longitudPass = $length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
        $longitudCadena = strlen($cadena);

        for ($i=1; $i <= $longitudPass; $i++) { 
            $pos = rand(0, $longitudCadena-1);
            $pass .= substr($cadena, $pos,1);
        }
        return $pass;
    }

    // GENERAR UN TOKEN (para recuperar contraseña)
    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));

        // $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        $token = $r1.$r2.$r3.$r4;
        return $token;
    }

    // FORMATO PARA VALORES MONETARIOS
    function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }
    
    // ENVIO DE CORREOS

    // --------------------------------------------1
    // // ENVIO DE CORREOS
    // function sendEmail($data, $template){
    //     $asunto = $data['asunto'];
    //     $emailDestino = $data['email'];
    //     $proyecto = NOMBRE_REMITENTE;
    //     $remitente = EMAIL_REMITENTE;

    //     // ENVIO DE CORREO
    //     $de = "MIME-Version: 1.0\r\n";
    //     $de .= "Content-type: text/html; charset=UTF-8\r\n";
    //     $de .= "From: {$proyecto} <{$remitente}>\r\n";
    //     ob_start();
    //     require_once("Views/Template/Email/".$template.".php");
    //     $mensaje = ob_get_clean();
    //     $send = mail($emailDestino, $asunto, $mensaje, $de);
    //     return $send;
    // }
    // --------------------------------------------1

    // --------------------------------------------
    // function sendMail2($to, $subject, $body, $attachments=array()){
    //     require_once 'Libraries/phpMailer/PHPMailerAutoload.php';
    //     $mail = new PHPMailer();
    //     $mail->IsSMTP();
    //     $mail->SMTPAuth = true;
    //     $mail->CharSet = 'UTF-8';
    //     $mail->Port = MAIL_PORT; 
    //     $mail->Host = MAIL_HOST; 
    //     $mail->Username = MAIL_USERNAME; 
    //     $mail->Password = MAIL_PASSWORD;     
    //     $mail->From = MAIL_CORREO; 
    //     $mail->FromName = MAIL_NOMBRE;         
    //     $mail->SMTPAutoTLS = false;   
    //     $mail->SMTPSecure = 'ssl'; 
    //     if(is_array($to) && count($to) > 0){
    //         foreach ($to as $keymail => $valuemail) {
    //         $mail->AddAddress($valuemail);
    //         }
    //     }
    //     else{
    //         $mail->AddAddress($to);
    //     }
    //     $mail->IsHTML(true); 
    //     $mail->Subject = $subject; 
    //     $mail->Body = $body; 
    //     // if (!empty($attachments) && is_array($attachments)){
    //     //     foreach($attachments as $attachment){
    //     //         if (file_exists($attachment["ruta"])){
    //     //             $mail->AddAttachment($attachment["ruta"], $attachment["archivo"]);
    //     //         }
    //     //     }
    //     // }          
    //     return $mail->send();
    // }
    // --------------------------------------------
?>