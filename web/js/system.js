var wilnewsSystem = {
    interval: 5000,
    chatBox: '#chat_box',
    inputBox: '#chat',
    currentId: 0,
    initialize: function () {
        $.ajax({
            url: "/api/chat/get/all",
            method: "GET",
            dataType: "json",
        }).done(function (data) {
            wilnewsSystem.currentId = data[0].id;
            $.each(data, function (index, element) {
                $(wilnewsSystem.chatBox).append("<div>"
                        + element.comment
                        + "</div>");
            });
        });
        $(wilnewsSystem.chatBox).animate({
            scrollTop: $(wilnewsSystem.chatBox).get(0).scrollHeight
        }, 1500);
        //window.setInterval(this.getDiscuss(), 5000);
    },
    getDiscuss: function () {

    },
    postDiscuss: function () {

    }
};


