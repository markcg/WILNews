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
                <div class="alert alert-info" role="alert">CLICK AT THESE LINK TO VIEW THE NEWS</div>
                <?php
                if (empty($trends[0]->trends)) {
                    echo "No result found";
                } else {
                    foreach ($trends[0]->trends as $trend) {
                        ?>
                        <a class="tweet-link" style="padding: 0 5px; cursor: pointer;" data-tweet="<?php echo $trend->name ?>"><?php echo $trend->name ?></a> 
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
                <div style="text-align: center;"><img src="/img/newsbanner.png" alt=""></div>
                <div id="newsBox"style='border-radius: 6px; background-color: #EEE; color: inherit; padding: 15px; margin-top: 15px;'>
                    <?php
                    if (empty($news->channel->item)) {
                        echo "No result found";
                    } else {
                        foreach ($news->channel->item as $new) {
                            ?>
                            <div><?php echo $new->description; ?></div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container -->
<script>
    $(document).ready(function () {
        wilnewsSystem.initialize();
    });
</script>
