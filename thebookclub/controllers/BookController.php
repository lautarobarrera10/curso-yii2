<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Book;

class BookController extends Controller {
    public function actionAll(){
        $books = Book::find()->all();
        return $this->render('all.tpl', ['books' => $books, 'titulo' => 1]);
    }

    public function actionDetail($id){
        $book = Book::findOne($id);
        if (empty($book)){
            Yii::$app->session->setFlash('error', 'Ese libro no existe.');
           return $this->goHome();
        }
        return $book->toString();
    }
}