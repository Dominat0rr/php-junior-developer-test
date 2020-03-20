<?php

    spl_autoload_register('Autoloader');

    function Autoloader($classname) {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $path = "classes/";
        $extention = ".php";

        if ($classname === "Database") {
            $path = "database/";
        }
        else if ($classname === "Template") {
            $path = "lib/";
        }
        else if (strpos($classname, "View")) {
            $path = "classes/views/";   
        }
        else if (strpos($classname, "Controller")) {
            $path = "classes/controllers/";
        }

        if (strpos($url, 'includes')) {
            $path = "../" . $path;
        }
        $fullPath = $path . $classname . $extention;

        if (!file_exists($fullPath)) {
            return false;
        }
        require_once $fullPath;
    }

?>