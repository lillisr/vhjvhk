window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2";

window.backendUrl = "https://online-lectures-cs.thi.de/chat/" + window.collectionId;
window.tokenTom = eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNzAwMzE3OTI2fQ.2UZULSA09LF6V2U1ytda7mIW8MxDUrPcon-ha6ODRZw;
window.tokenJerry = eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3MDAzMTc5MjZ9.SWYRS4BiIO-uZi07wGuSUuNd_uV-Ub5NE_5yFsrfUJc;


function validateForm(){
    var username = document.getElementById("uname").value;
    var password = document.getElementById("pw").value;
    var password2 = document.getElementById("cPw").value;
    var error = document.getElementById("error");

    var isValid = true;

    
    var xmlhttp = new XMLHttpRequest();

    //checks, if user already exists
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4) {
            if(xmlhttp.status == 204) {
                console.log("Exists");
            } else if(xmlhttp.status == 404) {
                console.log("Does not exist");
            }
        }
    };
    xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/83f86739-4684-4e80-acec-7f640d5eded2/user/Tom", true);
    xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/83f86739-4684-4e80-acec-7f640d5eded2/user/Jerry", true);
    xmlhttp.send();
    //checks, if username is longer than 3 characters
    if (username.length < 3){
        document.getElementById('uname').classList.add('invalid');
        error.innerText = 'The username must be at least 3 characters long';
        isValid = false;

    //checks, if password is longer than 8 characters
    }else if (password.length < 8){
        document.getElementById('pw').classList.add('invalid');
        error.innerText = 'The Password must be at least 8 characters long';
        isValid = false;

    //checks, if password contains capital letter
    }else if(!/[A-Z]/.test(password)){
        document.getElementById('pw').classList.add('invalid');
        error.innerText = 'The Password must contain at least one capital letter';
        isValid = false;

    //checks, if password contains special character
    }else if(!/[! # $ % ( ) * + , - . / : ; = ? @ [ ] ^ _ { | } ~]/.test(password)) {
        document.getElementById('pw').classList.add('invalid');
        error.innerText = 'The Password must be contain at least one special character';        isValid = false;
        isValid = false;
    //checks, if password confirmation matches password
    }else if (password !== password2) {
        document.getElementById('cPw').classList.add('invalid');
        error.innerText = 'Password do not match!';
        isValid = false;
    }
    if(isValid){
        return true;
    } else{
        return false;
    }

}
