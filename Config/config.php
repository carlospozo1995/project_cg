<?php

    define("BASE_URL", "http://localhost/carlos/project_cg/");
    // define('RUTA_INCLUDES', 'C:/laragon/www/carlos/project_cg/Libraries/');

    // VAR A CONEXION BASE DE DATOS
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'project_cg');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_PORT', 3306);
    define('DB_CHARSET', 'utf8');

    // ZONA HORARIA
    date_default_timezone_set('America/Guayaquil');
    
    // DELEIMITADORES DECIMAL Y MILLAR
    const SPD = ",";
    const SPM = ".";   

    // SIMBOLO DE LA MONEDA
    const SMONEY = "$";

    
    // DATOS DE ENVIO DE EMAIL
    define('NOMBRE_EMPRESA', 'Project_cg');
    define('WEB_EMPRESA', BASE_URL);

    define('MAIL_HOST', 'smtp.gmail.com');
    define('MAIL_USERNAME', 'carlospozo95@gmail.com');
    define('MAIL_PASSWORD', 'yxxlljautvthwecm');

    // --------------------------------------------
    // define('NOMBRE_REMITENTE', 'Proyecto');
    // define('EMAIL_REMITENTE', 'carlos@carlos.com');
    // define('NOMBRE_PROYECTO', 'Proyecto');
    // define('SITIO_WEB', 'wwe.carlos.com');
    // --------------------------------------------

    // --------------------------------------------
    // define('MAIL_PORT', '465');
    // define('MAIL_HOST', 'smtp.gmail.com');
    // define('MAIL_USERNAME', 'carlospozo95@gmail.com');
    // define('MAIL_PASSWORD', 'yxxlljautvthwecm');
    // define('MAIL_CORREO', 'carlospozo95@gmail.com');
    // define('MAIL_NOMBRE', 'Carlos');
    // --------------------------------------------


    // LLAMAR SLIDER CATEGORIAS-PRODUCTOS
    define("CAT_SLIDER", "1,26");
    define("PROD_SLIDER", "2");
?>