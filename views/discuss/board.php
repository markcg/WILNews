<script src="/js/system.js" type="text/javascript"></script>
<div class="container-fluid">
    <div class="row" style="text-align: center;">
        <!-- TWITTER
    ================================================== -->
        <div class="fl-left side-bar">
            <!-- /WEATER
            ================================================== -->
            <div><img src="/img/weatherbanner.png" alt=""></div>
            <div id="weather"></div>
            <div style="text-align: center;"><input type="text" name="city" placeholder="Search for city weather"></div>
            <div><img src="/img/twitterbanner.png" alt=""></div>
            <div class="text-left" style="padding: 5px 0;border-bottom: solid 1px black;">
                <?php
                if (empty($trends[0]->trends)) {
                    echo "No result found";
                } else {
                    foreach ($trends[0]->trends as $trend) {
                        ?>
                        <a class="tweet-link" style="padding: 0 5px;" data-tweet="<?php echo $trend->name ?>"><?php echo $trend->name ?></a> 
                        <?php
                    }
                }
                ?>
            </div>
            <div id="tweetBox" class="text-left">
                <?php
                if (empty($tweets->statuses)) {
                    echo "No result found";
                } else {
                    foreach ($tweets->statuses as $status) {
                        ?>
                        <div class="tweet"><strong><?php echo $status->user->name; ?></strong>: <?php echo $status->text; ?></div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="news-bar">
            <!-- NEWS FEEDS 
================================================== -->
            <div class="content-right">
                <div style="text-align: center; margin-bottom: 15px;"><img src="/img/discussbanner.png" alt=""></div>
                <div>
                    <div style="text-align: center;"><input style='width: 40%;'type="text" id="inputBox" size="255" placeholder="wanna say something?"></div>
                    <div id="chatBox" style='border-radius: 6px; background-color: #EEE; color: inherit; padding: 30px; '>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container -->
<script>
    $(document).ready(function () {
        wilnewsSystem.initialize();
        wilnewsSystem.startChat();
    });
</script>
