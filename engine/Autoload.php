<?php

namespace app\engine;

class Autoload
{


    public function loadClass($className)
    {
        //  var_dump($className);
        $fileName = realpath(str_replace(['app', '\\'], [ROOT_DIR, DS], $className) . ".php");

        //var_dump($fileName);
        if (file_exists($fileName)) {
            include $fileName;

        }


    }

}