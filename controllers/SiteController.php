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

    /* Return Index page */

    public function actionIndex() {
        $connection = new TwitterOAuth(SiteController::CONSUMER_KEY, SiteController::CONSUMER_SECRET, SiteController::ACCESS_TOKEN, SiteController::ACCESS_SECRET); //Connect to Twitter OAuth
        $content = $connection->get("account/verify_credentials"); //Verify credential for using any Tweet
        $trends = $connection->get("trends/place", array("id" => SiteController::COUNTRY)); //Acquire twitter trends base on location
        $query = (is_array($trends) ? $trends[0]->trends : $query = $trends->trends); //Query informaton into variable
        $hashtag = "";
        if ($query[0]->name[0] == "#") {
            $hashtag = substr($query[0]->name, 1); //Twitter giving us a trends hashtag, so we need to subtract that hash tag off
        }
        $rss = $this->rssCompiler($hashtag); //Call Twitter compiler to acquire news.
        $tweet = $this->twitterCompiler($hashtag); //Call Twitter compiler to acquire tweets.
        return $this->render('index', [
                    "trends" => $trends,
                    "news" => $rss,
                    "tweets" => $tweet,
        ]);
    }

    /* API Section */

    public function actionTrends() { //Getting lastest top 10 trends
        $connection = new TwitterOAuth(SiteController::CONSUMER_KEY, SiteController::CONSUMER_SECRET, SiteController::ACCESS_TOKEN, SiteController::ACCESS_SECRET);
        $content = $connection->get("account/verify_credentials");
        $trends = $connection->get("trends/place", array("id" => SiteController::COUNTRY));
        $query = $trends[0]->trends;
        return json_encode($query); // Return result in a json form
    }

    public function actionTweets() { //Getting lastest top 10 tweets related to keyword
        $request = Yii::$app->request;
        $query = $request->get('q');
        if (empty($query)) {
            return json_encode(["status" => "failed"]);
        }
        $tweet = $this->twitterCompiler($query); //Call to static funtion to process all tweets
        return json_encode($tweet);
    }

    public function actionNews() { //Getting lastest top 10 news related to keyword
        $request = Yii::$app->request;
        $keyword = $request->get("k");
        if (empty($keyword)) {
            return json_encode(["status" => "failed"]);
        } else if ($keyword[0] == "#") {
            $keyword = substr($keyword, 1);
        }
        $rss = $this->rssCompiler($keyword); //Call to static funtion to process all News
        return json_encode($rss);
    }

    public static function rssCompiler($query) { //Funtion to calling google API to retrieve news
        $cUrl = new cURL(); //cURL class ue for contacting other web using php system, This class is free on GIT
        $cUrl->get("http://news.google.com/news", [
            "q" => $query,
            "output" => "rss",
        ]);
        $cUrl->close();
        return $cUrl->response; //cURL will automatically encode or decode any incoming data into native php object or array
    }

    public static function twitterCompiler($query) { //Funtion to calling google API to retrieve tweets
        $connection = new TwitterOAuth(SiteController::CONSUMER_KEY, SiteController::CONSUMER_SECRET, SiteController::ACCESS_TOKEN, SiteController::ACCESS_SECRET);
        $content = $connection->get("account/verify_credentials");
        $trends = $connection->get("search/tweets", array("q" => $query)); // Tweet provide us a system to directly call and retrieve tweets according to trends
        return $trends; //return trends objects
    }

}
