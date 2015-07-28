<div class="container-fluid">
    <div class="row">

        <div class="span4 content-left">

            <!-- /WEATER
            ================================================== -->
            <div class="row">
                <img src="/img/weatherbanner.png" alt="">
                <p>Content of weather</p>
            </div>

            <!-- TWITTER
            ================================================== -->
            <div class="row">
                <img src="/img/twitterbanner.png" alt="">
                <p>Content of twiiter</p>
            </div>
        </div><!-- /.span4 -->


        <!-- NEWS FEEDS 
        ================================================== -->
        <div class="span8 content-right">
            <div><img src="/img/newsbanner.png" alt=""></div>
            <div id="newsBox">
                <?php foreach ($news["item"] as $new) { ?>
                    <div><?php echo $new->description; ?></div>
                <?php } ?>
            </div>
        </div>

    </div>
</div><!-- /.container -->