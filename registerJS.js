/*var nameInput = document.querySelector("#uname");
var passwordInput = document.querySelector("#pw");
var password2Input = document.querySelector("#cPw");
var registerButton = document.querySelector("#button");

window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2"; 

nameInput.classList.remove('error-input', 'success-input');
passwordInput.classList.remove('error-input', 'success-input');
password2Input.classList.remove('error-input', 'success-input');

function register(){
    var x = document.getElementById("register");

    let nameValue = nameInput.value;
    let passwordValue = passwordInput.value;
    let password2Value = password2Input.value;

    if(passwordValue.length < 8 || passwordValue !== password2Value) {
        passwordInput.classList.add("error-input");
        password2Input.classList.add("error-input");
    }else{
        passwordInput.classList.add("success-input");
        password2Input.classList.add("success-input");
    }

    if(nameValue.length < 3){
        nameInput.classList.add("error-input");
    } else { 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4) {
                if(xmlhttp.status == 204) {
                    nameInput.classList.add("error-input");
                } else if(xmlhttp.status == 404) {
                    nameInput.classList.add("success-input");
                    if(passwordValue.length >= 8 && passwordValue === password2Value){
                        window.location.href = 'friends.html';
                    }
                }
            }
        };
        xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/user/"+nameValue, true);
        xmlhttp.send();
        nameInput.classList.remove('error-input', 'success-input');
    }
}
function Toggle() {
    var x = document.getElementById("toggle");
    if (x.type === "password") {
      x.type = "password";
    }
  }
*/


/*var usernameToCheck = "der eingegebene Benutzername";
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    // Erfolgreiche Antwort erhalten, das Ergebnis verarbeiten
    if (this.responseText == "USERNAME_AVAILABLE") {
      // Der Benutzername ist verfügbar
    } else if (this.responseText == "USERNAME_NOT_AVAILABLE") {
      // Der Benutzername ist bereits vergeben
    }
  }
};
xhttp.open("GET", "ajax_check_user.php?user=" + usernameToCheck, true);
xhttp.send();
*/
/*
function checkUsername(user){
    if(user.length == 0){
        document.getElementById("ajax_check_user").innerHTML = "";
        return;
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4) {
                if(this.status == 200) {
                document.getElementById("ajax_check_user").innerHTML = "Username available!";
                }else if(this.status == 404) {
                    document.getElementById("ajax_check_user").innerHTML = "Username not available...";
                }
            }
        };
        xmlhttp.open("GET", "ajax_check_user.php?user=" + user, true);
        xmlhttp.send();
    }
}
*/