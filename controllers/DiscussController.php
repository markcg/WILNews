<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use app\models\cURL;
use yii\helpers\Url;
use yii\db\Connection;
use app\controllers\SiteController;

class DiscussController extends Controller {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        $connection = new TwitterOAuth(SiteController::CONSUMER_KEY, SiteController::CONSUMER_SECRET, SiteController::ACCESS_TOKEN, SiteController::ACCESS_SECRET);
        $content = $connection->get("account/verify_credentials");
        $trends = $connection->get("trends/place", array("id" => SiteController::COUNTRY));
        $query = $trends[0]->trends;
        $hashtag = "";
        if ($query[0]->name[0] == "#") {
            $hashtag = substr($query[0]->name, 1);
        }
        $tweet = SiteController::twitterCompiler($hashtag);
        return $this->render('board', [
                    "trends" => $trends,
                    "tweets" => $tweet,
        ]);
    }

    public function actionAll() {
        $db = new Connection(Yii::$app->db);
        $posts = $db->createCommand('SELECT * FROM `discuss` ORDER BY `id` DESC LIMIT 100')
                ->queryAll();
        return json_encode($posts);
    }

    public function actionGet($id) {
        $db = new Connection(Yii::$app->db);
        $posts = $db->createCommand("SELECT * FROM `discuss` ORDER BY `id` ASC LIMIT 100 OFFSET $id")
                ->queryAll();
        return json_encode($posts);
    }

    public function actionAdd() {
        $request = Yii::$app->request;
        $db = new Connection(Yii::$app->db);
        if (!is_null($request) && !empty($request->post())) {
            $ip = $request->post('ip');
            $comment = $request->post('comment');
            $db->createCommand()->insert('discuss', [
                'ip' => $ip,
                'comment' => $comment,
            ])->execute();
            return json_encode(["status" => "passed"]);
        } else {
            return json_encode(["status" => "failed"]);
        }
    }

}
