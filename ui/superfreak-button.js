var onSuperFreakAuth = function(user_token) {

};

function superfreakauth() {
    var app_token = document.getElementById('superfreak-app-token').value;
    window.location = 'http://ec2-54-254-252-98.ap-southeast-1.compute.amazonaws.com/superfreak/welcome/userauth?redirect=' + encodeURI(window.location.href) + '&token=' + app_token;
}

function superfreakinit() {
    var app_token = document.getElementById('superfreak-app-token').value;
    var user_token = window.location.search.replace( "?token=", "");
    if (user_token.length === 64) {
        onSuperFreakAuth(user_token);
        document.getElementById('superfreakbtn').innerHTML = '<iframe src="http://ec2-54-254-252-98.ap-southeast-1.compute.amazonaws.com/superfreak/welcome/userinfo?app_token='+app_token+'&user_token=' + user_token + '"></iframe>';
    } else {
        document.getElementById('superfreakbtn').innerHTML = '<button onclick="javascript:superfreakauth();"><img src="http://ec2-54-254-252-98.ap-southeast-1.compute.amazonaws.com/ui/img/ICON.png"></button>';
    }
}
document.addEventListener('DOMContentLoaded', superfreakinit, false);