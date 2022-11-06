<?php

    // RETORNA LA URL DEL PROYECTO
    function base_url(){
        return BASE_URL;
    }

    // RETORNA URL MEDIA
    function media(){
        return BASE_URL."Assets/";
    }

    // RETORNA FECHA Y HORA
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

    // REEMPLAZAR TILDES Y CARACTERES

    function deleteAcent($string){
		
		//Reemplazamos la A y a
		$string = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$string
		);

		//Reemplazamos la E y e
		$string = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$string );

		//Reemplazamos la I y i
		$string = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$string );

		//Reemplazamos la O y o
		$string = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$string );

		//Reemplazamos la U y u
		$string = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$string );

		//Reemplazamos la N, n, C y c
		$string = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$string
		);
		
		return $string;
	}
    // RETORNA LOS DIFERENTES TEMPLATES

    function headerAdmin($data=""){
        $view_header = "Views/Template/header_admin.php";
        require_once($view_header);
    }

    function footerAdmin($data=""){
        $view_footer = "Views/Template/footer_admin.php";
        require_once($view_footer);
    }

    function headerStore($data=""){
        require_once("Views/Template/header_store.php");
    }

    function footerStore($data=""){
        require_once("Views/Template/footer_store.php");
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

    function getPermisos(int $idModulo){
        require_once 'Models/PermisosModel.php';
        $objPermisos = new PermisosModel();

        $idRol = $_SESSION['userData']['idrol'];
        $arrPermisos = $objPermisos->permisosModulo($idRol);  

        $permisos = "";
        $permisosMod = "";

        if (count($arrPermisos) > 0) {
            $permisos = $arrPermisos;
            $permisosMod = isset($arrPermisos[$idModulo]) ? $arrPermisos[$idModulo] : "";
        }

        $_SESSION['permisos'] = $permisos;
        $_SESSION['permisosMod'] = $permisosMod;
          
    }

    function sessionUser (int $idUser){
        require_once 'Models/LoginModel.php';
        $objLogin = new LoginModel();
        $request = $objLogin->sessionLogin($idUser);
        return $request;
    }

     // TIEMPO QUE EL USUARIO PERMANECE LOGEADO
    function sessionStart(){
        session_start();
        $timeInactive  = 7200;
        if (isset($_SESSION['timeout'])){
            $session_in = time() - $_SESSION['inicio'];
            if ($session_in > $timeInactive) {
                header("Location: ".BASE_URL."logout");
            }
        }else{
            header("Location: ".BASE_URL."logout");
        }
    }

    // AGREGAR LA IMAGEN A UPLOAD
    function uploadImage(array $data, string $name){
        $url_temp = $data['tmp_name'];
        $destino = 'Assets/images/uploads/'.$name;
        $move = move_uploaded_file($url_temp, $destino);
        return $move;
    }

    // ELIMINAR IMAGEN SELECIONADA DEL UPLOAD
    function deleteFile(string $name){
        unlink('Assets/images/uploads/'.$name);
    }

    // OBTENCION DE CATEGORIAS PARA EL SELECT
    function addCategorias($arrCategorias){
        $htmlOptions = "";
        $optionStatic = '<option value="0">-- CATEGORIA SUPERIOR --</option>';
        foreach ($arrCategorias as $key => $value) {
            if ($value['status'] == 1 && $value['categoria_father_id'] == "") {
                $htmlOptions .= '<option value="'.$value['idcategoria'].'">'.$value['nombre'].'</option>'; 
                $htmlOptions .= subCategorias($value['idcategoria'], 1, $arrCategorias);
            }
        }
        echo $optionStatic.$htmlOptions;
    }

    function subCategorias($fatherId, $level, $arrCategorias){
        $return ="";
        foreach ($arrCategorias as $key => $value) {
            if ($value['status'] == 1 && $value['categoria_father_id'] == $fatherId) {
                $return .= '<option value="'.$value['idcategoria'].'">'.str_repeat('- ', $level).$value['nombre'].'</option>';
                $return.= subCategorias($value['idcategoria'], $level + 1,$arrCategorias);
            }
        }
        return $return;
    }
    // ----------------------------------------------


    // OBTENCION DE LOS HIJOS DE UNA CATEGORIA PADRE (DELETE CATEGORIA)
    function childrensCategoria($arrCategorias, $intCategoria){
        $return = array();
        foreach ($arrCategorias as $key => $value) {
            if($value['categoria_father_id'] == $intCategoria){
                $return[] = $value;
                recursiveChildrens($value['idcategoria'], $arrCategorias, $return);
            }
        }
        return $return;
    }

    function recursiveChildrens($idFather, $arrCategorias, &$return){
        foreach ($arrCategorias as $key => $value) {
            if ($value['categoria_father_id'] == $idFather) {
                $return[] = $value;
                recursiveChildrens($value['idcategoria'], $arrCategorias, $return);
            }
        }
    }
    // -----------------------------------------------------

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