<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use app\models\cURL;
use yii\helpers\Url;
use yii\db\Connection;

define('CONSUMER_KEY', "EorNgCjkDzi8dVpyUOYv0z5M0");
define('CONSUMER_SECRET', "PkcNn3AEZ7nf4GMy83QsZNUK1VIs9Tk6xayz6zxQV0D1HiHEEa");
define('ACCESS_TOKEN', "252093232-TJmJ7wXuKOtZPo12h7qGUWmBTFqctM5WhhAjbb60");
define('ACCESS_SECRET', "A2NNcE9r1fgib7yR8BoEvckIX9NORRfkxhW4s6fG5Bn25");

class DiscussController extends Controller {

    public function actionAll() {
        $db = new Connection(Yii::$app->db);
        $posts = $db->createCommand('SELECT * FROM `discuss` ORDER BY `id` ASC LIMIT 100')
                ->queryAll();
        return json_encode($posts);
    }

    public function actionGet($id) {
        $db = new Connection(Yii::$app->db);
        $posts = $db->createCommand("SELECT * FROM `discuss` ORDER BY `id` ASC LIMIT 100 OFFSET $id")
                ->queryAll();
        return json_encode($posts);
    }

}
