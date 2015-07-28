<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com"><head>
        <meta charset="utf-8">
        <title>WIL NEWS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/bootstrap-responsive.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="/ico/favicon.png">
        <style id="holderjs-style" type="text/css">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}</style>

    </head>

    <body>



        <!-- NAVBAR
        ================================================== -->
        <div class="navbar-wrapper">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">WIL NEWS</a>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">MAIN</a></li>
                        <li><a href="#board">BOARD</a></li>
                    </ul>               
                </div><!--/.nav-collapse -->
            </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

    </div><!-- /.navbar-wrapper -->



    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" style="margin: 0;">
        <div class="item active">
            <img src="/img/logo.png" alt="">
            <div class="container header-container">
                <!-- LOGO -->
                <h1>WIL NEWS.</h1>
                <p>A real‐time weather forecasting, fetch tweets from Twitter of Hashtag or Trends to display as twitter feed, and provide news feed from all thai news.</p>
            </div><!-- LOGO -->
        </div>
    </div>
</div>    
</div><!-- /.carousel -->


<?php $this->beginBody() ?>
<!-- MAIN CONTAINER 
================================================== -->
<?= $content ?>
<?php $this->endBody() ?>

<!-- FOOTER
================================================== -->
<footer>
    <p><font size="3px">©</font> 2015 WIL NEWS Company, Inc.</p>
    <p>WIL Project,College of Art, Media, and technology.</p>
    <p><a herf="#">Thairath</a> · <a herf="#">Dailynews</a> · <a herf="#">Thai PBS</a> · <a herf="#">Sanook news</a> · <a herf="#">Komchadluek online</a> · <img src="/img/rss-round.png" height="25px" width="25px"></p>
</footer>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery.js"></script>
<script>
    !function ($) {
        $(function () {
            // carousel demo
            $('#myCarousel').carousel()
        })
    }(window.jQuery)
</script>
<script src="/js/holder/holder.js"></script>


</body>
<span class="gr__tooltip">
    <span class="gr__tooltip-content"></span>
    <i class="gr__tooltip-logo"></i>
    <span class="gr__triangle"></span>
</span>
</html>
<?php $this->endPage() ?>
