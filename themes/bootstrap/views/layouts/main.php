<html lang="en" class="gr__getbootstrap_com"><head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/ico/favicon.png">
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
    <div id="myCarousel" class="carousel slide">
        <div class="item active">
          <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="">
          <div class="container header-container">
              <!-- LOGO -->
                <h1>WIL NEWS.</h1>
                <p>A real‐time weather forecasting, fetch tweets from Twitter of Hashtag or Trends to display as twitter feed, and provide news feed from all thai news.</p>
              </div><!-- LOGO -->
            </div>
          </div>
        </div>    
    </div><!-- /.carousel -->



    <!-- MAIN CONTAINER 
    ================================================== -->
    <div class="container-fluid">
      <div class="row">
        
        <div class="span4 content-left">

          <!-- /WEATER
          ================================================== -->
          <div class="row">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/weatherbanner.png" alt="">
            <p>Content of weather</p>
          </div>
         
          <!-- TWITTER
          ================================================== -->
          <div class="row">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/twitterbanner.png" alt="">
            <p>Content of twiiter</p>
          </div>
        </div><!-- /.span4 -->


          <!-- NEWS FEEDS 
          ================================================== -->
          <div class="span8 content-right">
             <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/newsbanner.png" alt="">
             <p>Content of nes feed</p>
          </div>

      </div>
    </div><!-- /.container -->


   <!-- FOOTER
   ================================================== -->
      <footer>
        <p><font size="3px">©</font> 2015 WIL NEWS Company, Inc.</p>
        <p>WIL Project,College of Art, Media, and technology.</p>
        <p><a herf="#">Thairath</a> · <a herf="#">Dailynews</a> · <a herf="#">Thai PBS</a> · <a herf="#">Sanook news</a> · <a herf="#">Komchadluek online</a> · <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/rss-round.png" height="25px" width="25px"></p>
      </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-transition.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-alert.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-modal.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-tab.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-popover.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-button.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-collapse.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-carousel.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-typeahead.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/holder/holder.js"></script>
  

</body>
  <span class="gr__tooltip">
    <span class="gr__tooltip-content"></span>
    <i class="gr__tooltip-logo"></i>
    <span class="gr__triangle"></span>
</span>
</html>