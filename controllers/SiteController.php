<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use app\models\cURL;
use yii\helpers\Url;
use yii\db\Connection;

class SiteController extends Controller {

    const CONSUMER_KEY = "EorNgCjkDzi8dVpyUOYv0z5M0";
    const CONSUMER_SECRET = "PkcNn3AEZ7nf4GMy83QsZNUK1VIs9Tk6xayz6zxQV0D1HiHEEa";
    const ACCESS_TOKEN = "252093232-TJmJ7wXuKOtZPo12h7qGUWmBTFqctM5WhhAjbb60";
    const ACCESS_SECRET = "A2NNcE9r1fgib7yR8BoEvckIX9NORRfkxhW4s6fG5Bn25";
    const COUNTRY = 23424960;

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        $connection = new TwitterOAuth(SiteController::CONSUMER_KEY, SiteController::CONSUMER_SECRET, SiteController::ACCESS_TOKEN, SiteController::ACCESS_SECRET);
        $content = $connection->get("account/verify_credentials");
        $trends = $connection->get("trends/place", array("id" => SiteController::COUNTRY));
        $query = (is_array($trends) ? $trends[0]->trends : $query = $trends->trends);
        $hashtag = "";
        if ($query[0]->name[0] == "#") {
            $hashtag = substr($query[0]->name, 1);
        }
        $rss = $this->rssCompiler($hashtag);
        $tweet = $this->twitterCompiler($hashtag);
        return $this->render('index', [
                    "trends" => $trends,
                    "news" => $rss,
                    "tweets" => $tweet,
        ]);
    }

    public function actionTrends() {
        $connection = new TwitterOAuth(SiteController::CONSUMER_KEY, SiteController::CONSUMER_SECRET, SiteController::ACCESS_TOKEN, SiteController::ACCESS_SECRET);
        $content = $connection->get("account/verify_credentials");
        $trends = $connection->get("trends/place", array("id" => SiteController::COUNTRY));
        $query = $trends[0]->trends;
        return json_encode($query);
    }

    public function actionTweets() {
        $request = Yii::$app->request;
        $query = $request->get('q');
        if (empty($query)) {
            return json_encode(["status" => "failed"]);
        }
        $tweet = $this->twitterCompiler($query);
        return json_encode($tweet);
    }

    public function actionNews() {
        $request = Yii::$app->request;
        $keyword = $request->get("k");
        if (empty($keyword)) {
            return json_encode(["status" => "failed"]);
        } else if ($keyword[0] == "#") {
            $keyword = substr($keyword, 1);
        }
        $rss = $this->rssCompiler($keyword);
        return json_encode($rss);
    }

    public function actionForecast() {
        $db = new Connection(Yii::$app->db);
        $posts = $db->createCommand('SELECT * FROM `discuss` ORDER BY `id` ASC LIMIT 100')
                ->queryAll();
        return json_encode($posts);
    }

    public function rssCompiler($query) {
        $cUrl = new cURL();
        $cUrl->get("http://news.google.com/news", [
            "q" => $query,
            "output" => "rss",
        ]);
        $cUrl->close();
        return $cUrl->response;
    }

    public function twitterCompiler($query) {
        $connection = new TwitterOAuth(SiteController::CONSUMER_KEY, SiteController::CONSUMER_SECRET, SiteController::ACCESS_TOKEN, SiteController::ACCESS_SECRET);
        $content = $connection->get("account/verify_credentials");
        $trends = $connection->get("search/tweets", array("q" => $query));
        return $trends;
    }

}
