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

    // ENVIO DE CORREOS
    function sendEmail($data, $template){
        $asunto = $data['asunto'];
        $emailDestino = $data['email'];
        $empresa = NOMBRE_REMITENTE;
        $remitente = EMAIL_REMITENTE;

        // ENVIO DE CORREO
        $de = "MIME-Version: 1.0\r\n";
        $de .= "Content-type: text/html; charset=UTF-8\r\n";
        $de .= "From: {$empresa} <{$remitente}>\r\n";
        ob_start();
        require_once("Views/Template/Email/".$template.".php");
        $mensaje = ob_get_clean();
        $send = mail($emailDestino, $asunto, $mensaje, $de);
        return $send;
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

?>