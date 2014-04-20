var data = {

};

var appregister = function() {
  dust.render("appregister", {

    }, function(err, out) {
        $('#inner-page').html(out);


        $('#done').click(function() {
            $.post('/superfreak/welcome/app_register_post', $('#appregister').serialize(), function(data) {
                if (!data.success) {
                    alert('There was a problem registering!');
                } else {
                    $('#inner-page').append('Your token is: ' + data.token);
                }
            }, "json");
        });

    });
};

var startpg2 = function() {
  dust.render("startpg2", {

    }, function(err, out) {
        $('#inner-page').html(out);


        $('#done').click(function() {
            $.post('/superfreak/welcome/register_post', $('#register').serialize(), function(data) {
                if (!data.success) {
                    alert('There was a problem registering!');
                } else {
                    alert('registered success! ' + JSON.stringify(data));
                }


            }, "json");
        });

    });
};
var startpg1 = function() {
  dust.render("startpg1", {

    }, function(err, out) {
        $('#inner-page').html(out);

        $('.male').click(function() {
            data['gender'] = 'male';
            startpg2();
        });

        $('.female').click(function() {
            data['gender'] = 'female';
            startpg2();
        });
    });
};

var home = function() {
    dust.render("home", {

    }, function(err, out) {
        $('#inner-page').html(out);

        $('#startbtn').click(function() {
            startpg1();
        });

    });
};

$(function() {
    home();
    $('.api-ln').click(appregister);
    $('.home-ln').click(appregister);
});