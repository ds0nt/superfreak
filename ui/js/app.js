
var startpg2 = function() {
  dust.render("startpg2", {

    }, function(err, out) {
        $('#inner-page').html(out);

    });
};
var startpg1 = function() {
  dust.render("startpg1", {

    }, function(err, out) {
        $('#inner-page').html(out);

        $('.male').click(function() {
            startpg2();
        });

        $('.female').click(function() {
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
});