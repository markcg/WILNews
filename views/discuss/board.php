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
        <div class="news-bar full-width">
            <!-- NEWS FEEDS 
================================================== -->
            <div class="content-right">
                <div style="text-align: center;font-size: 30px;padding: 10px 0;">CHAT</div>
                <div>
                    <div style="text-align: center;"><input type="text" id="inputBox" size="255"></div>
                    <div id="chatBox">
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
