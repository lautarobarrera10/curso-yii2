<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Author;

class AuthorController extends Controller {

    public function actionDetail($id){
        $author = Author::findOne($id);
        if (empty($author)){
            Yii::$app->session->setFlash('warning', 'Ese autor no existe');
            return $this->redirect(['author/all']);
        }
        return $author->toString();
    }

    public function actionAll($search = null){
        if ($search) {
            $authors = Author::find()->where(['like', 'name', $search])->all();
        } else {
            $authors = Author::find()->all();
        }

        return serialize($authors);
    }
}