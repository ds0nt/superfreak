var onSuperFreakAuth = function(user_token) {
    alert(user_token);
};
function superfreakauth() {
    window.location = 'http://ec2-54-254-252-98.ap-southeast-1.compute.amazonaws.com/superfreak/welcome/userauth?redirect=' + encodeURI(window.location.href) + '&token=' + token;
}
function superfreakinit() {
    var app_token = document.getElementById('superfreak-app-token').value;
    var user_token = window.location.search.replace( "?token=", "");
    if (user_token.length === 64) {
        onSuperFreakAuth(user_token);
        document.getElementById('superfreakbtn').innerHTML = '<iframe src="http://ec2-54-254-252-98.ap-southeast-1.compute.amazonaws.com/superfreak/welcome/userinfo?app_token='+token+'&user_token=' + user_token + '"></iframe>';
    } else {
        document.getElementById('superfreakbtn').innerHTML = '<button onclick="javascript:superfreakauth();">AUTH ME WITH SUPERFREAK</button>';
    }
}
document.addEventListener('DOMContentLoaded', superfreakinit, false);
