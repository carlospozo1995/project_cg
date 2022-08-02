<?php

    define("BASE_URL", "http://localhost/carlos/project_cg/");

    // VAR A CONEXIO BASE DE DATOS
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'project_cg');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_CHARSET', 'utf8');

    // ZONA HORARIA
    date_default_timezone_set('America/Guayaquil');
    
    // DELEIMITADORES DECIMAL Y MILLAR
    const SPD = ",";
    const SPM = ".";   

    // SIMBOLO DE LA MONEDA
    const SMONEY = "$";
?>