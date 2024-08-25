<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Comando para clase de prueba
 */
class PlatziController extends Controller {
    /**
     * Suma los valores de los dos parámetros
     */
    public function actionSuma($a, $b = 17){
        $result = $a + $b;
        printf("%0.2f\n", $result);
        return ExitCode::OK;
    }

    /**
     * Lee un archivo CSV, imprime su contenido y devuelve un código de salida.
     *
     * @param string $file La ruta al archivo CSV que se va a leer.
     *
     * @return int Devuelve ExitCode::OK al finalizar la ejecución correctamente.
     *
     * La función abre un archivo CSV en modo de lectura, lo lee línea por línea 
     * y convierte cada línea en un array utilizando `fgetcsv`. Luego, imprime 
     * cada array en pantalla usando `print_r`. Finalmente, cierra el archivo y 
     * retorna un código de salida que indica éxito.
     */
    public function actionBooks($file){
        $f = fopen($file, "r");
        while(!feof($f)){
            $data = fgetcsv($f);
            print_r($data);
        }
        fclose($f);
        return ExitCode::OK;
    }
}