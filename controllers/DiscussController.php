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

    /* Return Index page */

    public function actionIndex() {
        $connection = new TwitterOAuth(SiteController::CONSUMER_KEY, SiteController::CONSUMER_SECRET, SiteController::ACCESS_TOKEN, SiteController::ACCESS_SECRET); //Connect to Twitter OAuth
        $content = $connection->get("account/verify_credentials"); //Verify credential for using any Tweet
        $trends = $connection->get("trends/place", array("id" => SiteController::COUNTRY)); //Acquire twitter trends base on location
        $query = $trends[0]->trends; //Query informaton into variable
        $hashtag = "";
        if ($query[0]->name[0] == "#") { //Twitter giving us a trends hashtag, so we need to subtract that hash tag off
            $hashtag = substr($query[0]->name, 1);
        }
        $tweet = SiteController::twitterCompiler($hashtag); //Call Twitter compiler to acquire tweets.
        return $this->render('board', [
                    "trends" => $trends,
                    "tweets" => $tweet,
        ]);
    }

    /* Return API Section */

    public function actionAll() { //Return all of comment in data base, limit at 100 lastest
        $db = new Connection(Yii::$app->db);
        $posts = $db->createCommand('SELECT * FROM `discuss` ORDER BY `id` DESC LIMIT 100') //Select by decending mean list will start from button
                ->queryAll();
        return json_encode($posts);
    }

    public function actionGet($id) { //Return all of comment in data base, limit at 100 start at specific id
        $db = new Connection(Yii::$app->db);
        $posts = $db->createCommand("SELECT * FROM `discuss` ORDER BY `id` ASC LIMIT 100 OFFSET $id")
                ->queryAll();
        return json_encode($posts);
    }

    public function actionAdd() { //Add new comment into database, both ip and comment are required
        $request = Yii::$app->request;
        $db = new Connection(Yii::$app->db);
        if (!is_null($request)) { //check wheter request exist or not
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

    /* Return API Section End */
}
