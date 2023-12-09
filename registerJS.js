var nameInput = document.querySelector("#uname");
var passwordInput = document.querySelector("#pw");
var password2Input = document.querySelector("#cPw");
var registerButton = document.querySelector("#button");

window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2"; 

nameInput.classList.remove('error-input', 'success-input');
passwordInput.classList.remove('error-input', 'success-input');
password2Input.classList.remove('error-input', 'success-input');

function register(){
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
    let temp = document.getElementById("typepass");
     
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
}