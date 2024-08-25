<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Book;

class BookController extends Controller {
    public function actionAll(){
        $book = Book::find()->all();
        return serialize($book);
    }

    public function actionDetail($id){
        $book = Book::findOne($id);
        if (empty($book)){
            Yii::$app->session->setFlash('error', 'Ese libro no existe.');
           return $this->goHome();
        }
        return $book->title;
    }
}