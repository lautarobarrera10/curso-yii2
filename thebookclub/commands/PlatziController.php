<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

use app\models\Author;
use app\models\Book;

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
            if(!empty($data[1]) && !empty($data[2])){
                $author = Author::find()->where(['name' => $data[2]])->one();

                if (empty($author)) {
                    $author = new Author;
                    $author->name = $data[2];
                    $author->save();
                }

                $book = new Book;
                $book->title = $data[1];
                $book->author_id = $author->id;
                $book->save();
                printf("%s\n", $book->toString());
            }
        }
        fclose($f);
        return ExitCode::OK;
    }

    public function actionGetAuthor($author_id){
        $author = Author::findOne($author_id);

        if (empty($author)){
            printf("El autor no existe.\n");
            return ExitCode::DATAERR;
        }

        printf("%s\n", $author->toString());
        foreach($author->books as $book){
            printf(" - %s\n", $book->toString());
        }
        return ExitCode::OK;
    }

    public function actionBook($book_id){
        $book = Book::findOne($book_id);

        if (empty($book)){
            printf("El libro no existe.\n");
            return ExitCode::DATAERR;
        }

        printf("%s\n", $book->toString());
        return ExitCode::OK;
    }
}