var data = {

};

var appinstructions = function(data) {
    dust.render("app-instructions", {
        token: data.token,
        tokencode: '<input type="hidden" id="superfreak-app-token" value="' + data.token + '">\n'+
    '<div id="superfreakbtn"></div>\n'+
    '<script type="text/javascript" src="http://ec2-54-254-252-98.ap-southeast-1.compute.amazonaws.com/ui/superfreak-button.js"></script>'
    }, function(err, out) {
        $('#inner-page').html(out);
    });
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
                    appinstructions(data);
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

var authapp = function() {
    dust.render("authapp", {

    }, function(err, out) {
        $('#inner-page').html(out);
        $('#done').click(function() {
            $.post('/superfreak/welcome/app_auth_post', $('#appauth').serialize(), function(data) {
                if (!data.success) {
                    alert('There was a problem registering!');
                } else {
                    $('#inner-page').append('Your token is: ' + data.token);
                }
            }, "json");
        });
    });
};

var stores = function() {
    dust.render("stores", {

    }, function(err, out) {
        $('#inner-page').html(out);

        $.get('/superfreak/welcome/stores_get', function(data) {
            if (!data.success) {
                alert('There was a problem fetching stores!');
                return;
            }

            dust.render("stores-each", {
                stores: data.stores
            }, function(err, out) {
                $('#inner-page').html(out);
            });
        }, "json");
    });
};


$(function() {
    home();
    $('.api-ln').click(appregister);
    $('.home-ln').click(home);
    $('.stores-ln').click(stores);
});