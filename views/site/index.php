<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<script src="/js/system.js" type="text/javascript"></script>
<div>
    <label>Chat</label>
    <div id="chat_box" class="col-md-4" style="width: 300px; height: 200px;border: solid 1px black;overflow-y: scroll;">

    </div>
    <input type="text" id="chat">
</div>
<div>
    <label>Twitter</label>
    <div id="twitter">
        <?php
        foreach ($trends->channel->item as $trend) {
            echo $trend->description;
        }
        ?>
    </div>
</div>
<div>
    <label>News</label>
    <div id="News"></div>
</div>
<div>
    <label>Chat</label>
    <div id="Chat"></div>
</div>
<script>
    $(document).ready(function () {
        wilnewsSystem.initialize();
    });
</script>
