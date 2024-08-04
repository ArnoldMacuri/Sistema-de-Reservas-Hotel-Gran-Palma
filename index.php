<?php
require_once 'config/config.php';
require_once 'helpers/funciones.php';
//VERIFICAR SI EXISTE LA RUTA ADMIN
$isAdmin = strpos($_SERVER['REQUEST_URI'], '/' . ADMIN) !== false;
//COMPROBAR SI EXISTE GET PARA CREAR URLS AMIGABLES
$ruta = empty($_GET['url']) ? 'principal/index' : $_GET['url'];
//CREAR UN ARRAY A PARTIR DE LA RUTA
$array = explode('/', $ruta);
//VALIDAR SI NOS ENCONTRAMOS EN LA RUTA
if ($isAdmin && (count($array) == 1 
|| (count($array) == 2 && empty($array[1]))) 
&& $array[0] == ADMIN) {
    //CREAR CONTROLADOR
    $controller = 'Login';
    $metodo = 'index';
} else {
    $indiceUrl = ($isAdmin) ? 1 : 0;
    $controller = ucfirst($array[$indiceUrl]);
    $metodo = 'index';
}
//VALIDAR METODOS
$metodoIndice = ($isAdmin) ? 2 : 1;
if (!empty($array[$metodoIndice]) && $array[$metodoIndice] != '') {
    $metodo = $array[$metodoIndice];
}
//VALIDAR PARAMETROS
$parametro = '';
$parametroIndice = ($isAdmin) ? 3 : 2;
if (!empty($array[$parametroIndice]) && $array[$parametroIndice] != '') {
    for ($i = $parametroIndice; $i < count($array); $i++) { 
        $parametro .= $array[$i] . ',';
    }
    $parametro = trim($parametro, ',');
}
//LLAMAR AUTOLOAD
require_once 'config/app/Autoload.php';
//VALIDAR DIRECTORIO DE CONTROLADORES
$dirControllers = ($isAdmin) ? 'controllers/admin/' . $controller . '.php' : 'controllers/principal/' . $controller . '.php';
if (file_exists($dirControllers)) {
    require_once $dirControllers;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro);
    } else {
       header('Location: ' . RUTA_PRINCIPAL . 'errors');
    }
    
} else {
    header('Location: ' . RUTA_PRINCIPAL . 'errors');
}
?>