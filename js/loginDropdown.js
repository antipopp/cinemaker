var loginBtn = document.getElementsByClassName("login-button");
var loginForm = document.getElementsByClassName("login-form");
loginBtn[0].addEventListener("click", function(){
    loginForm[0].classList.toggle("open");
});
