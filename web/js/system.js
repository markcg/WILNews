var geocoder; //Provide a variable for storing geocoder
var wilnewsSystem = { //Create Javascript object which has attributes and functions
    interval: 5000, //Interval for refreshing page
    //Specific element name that will use for refernece
    chatBox: '#chatBox',
    inputBox: '#inputBox',
    newsBox: '#newsBox',
    tweetBox: '#tweetBox',
    //Coordinate base on lattitude and longtitude for tracking system
    coordinate: {
        lat: "",
        lng: ""
    },
    currentId: null,
    userIp: null,
    initialize: function () {    //Function for set up ajax system for this website
        $(".tweet-link").click(function () {
            wilnewsSystem.getTweet($(this).data().tweet);
            wilnewsSystem.getNews($(this).data().tweet);
        });
        $("[name = city]").bind('keyup', function (e) {
            if (e.keyCode === 13) { // 13 is enter key
                cityToGeocoding();
            }
        });
        getLocation();
        addWeather(wilnewsSystem.coordinate.lat, wilnewsSystem.coordinate.lng);
        geocoder = new google.maps.Geocoder();
    },
    startChat: function () {    //Function for set up chat system
        $.ajax({
            url: "/api/chat/get/all",
            method: "GET",
            dataType: "json",
        }).done(function (data) {
            console.log(data[0].id);
            wilnewsSystem.currentId = "" + data[0].id;
            $.each(data, function (index, element) {
                $(wilnewsSystem.chatBox).append("<div>"
                        + element.comment
                        + "</div>");
            });
            $(wilnewsSystem.inputBox).bind('keyup', function (e) {
                if (e.keyCode === 13) { // 13 is enter key
                    wilnewsSystem.postDiscuss();
                }
            });
            $.getJSON("http://jsonip.com/?callback=?", function (data) {
                wilnewsSystem.userIp = data.ip;
            });
            window.setInterval(wilnewsSystem.getDiscuss, 3000);
        });
    },
    //API calling section
    getNews: function (k) {//Ajax news from server and apply to following element
        $.ajax({ // Make an ajax call to server
            url: "/api/news/get",
            method: "GET",
            data: {k: k},
            dataType: "json",
        }).done(function (data) {
            $(wilnewsSystem.newsBox).empty(); // Clear space inside element, make room for new data
            if (data.channel.item !== undefined) {
                if ($.isArray(data.channel.item)) {
                    $.each(data.channel.item, function (index, value) {
                        $(wilnewsSystem.newsBox).append("<div>" + value.description + "</div>");
                    });
                } else {
                    $(wilnewsSystem.newsBox).append("<div>" + data.channel.item.description + "</div>");
                }
            } else {
                $(wilnewsSystem.newsBox).append("No result found");
            }
        });
    },
    getTweet: function (q) {//Ajax tweet from server and apply to following element
        $.ajax({
            url: "/api/tweet/get",
            method: "GET",
            data: {q: q},
            dataType: "json",
        }).done(function (data) {
            $(wilnewsSystem.tweetBox).empty();
            if (data) {
                $.each(data.statuses, function (index, value) {
                    $(wilnewsSystem.tweetBox).append("<div class='tweet'><strong>" + value.user.name + "</strong>:" + value.text + " </div>");
                });
            } else {
                $(wilnewsSystem.tweetBox).append("No result found");
            }

        });
    },
    getDiscuss: function () {//Ajax discuss comment from server and apply to following element
        $.ajax({
            url: "/api/chat/get/" + wilnewsSystem.currentId,
            method: "GET",
            dataType: "json",
        }).done(function (data) {
            if ($.isArray(data)) {
                $.each(data, function (index, element) {
                    $(wilnewsSystem.chatBox).prepend("<div>"
                            + element.comment
                            + "</div>");
                    wilnewsSystem.currentId = element.id;
                });
            } else {
                $(wilnewsSystem.chatBox).prepend("<div>"
                        + data[0].comment
                        + "</div>");
                wilnewsSystem.currentId = data[0].id;
            }
        });
    },
    postDiscuss: function () { // Post new comment into server
        $.ajax({
            url: "/api/chat/post",
            method: "POST",
            data: {ip: wilnewsSystem.userIp, comment: $(wilnewsSystem.inputBox).val()},
            dataType: "html",
            error: function (e) {
                console.log(e);
            },
        }).done(function (data) {
            $(wilnewsSystem.inputBox).val("");
            wilnewsSystem.getDiscuss();
        });
    }
};
var x = document.getElementById("demo");
function getLocation() { // Aquire Geocoder from user using HTML 5 function
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) { //Save lat and lng attribute 
    wilnewsSystem.coordinate.lat = position.coords.latitude;
    wilnewsSystem.coordinate.lng = position.coords.longitude;
}
function addWeather(lat, lng) { // A template for weather field
    $('#weather').append('<div style="width:500px;">'
            + '<iframe id="forecast_embed" '
            + 'type="text/html" frameborder="0" height="245" width="500" '
            + 'src="http://forecast.io/embed/#lat=' + lat + '&lon=' + lng + '&color=#00aaff&font=Georgia&units=uk">'
            + '</iframe></div>');
}
function cityToGeocoding() { // Function to translate city name to Geocoder using Google API
    $.ajax({
        url: "https://maps.googleapis.com/maps/api/geocode/json",
        method: "GET",
        data: {
            // key: "AIzaSyDgGc14rR0B2tGXDYt69ly9IMsWvIw9SCs",
            address: $('[name = city]').val()
        },
    }).done(function (data) {
        //console.log(data.results[0]);
        $('#weather').empty();
        addWeather(data.results[0].geometry.location.lat, data.results[0].geometry.location.lng);
    });
}