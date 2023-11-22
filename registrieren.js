window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2";

window.backendUrl = "https://online-lectures-cs.thi.de/chat/" + window.collectionId;
window.tokenTOM = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNzAwMjI5NTIzfQ.15wcKi2kqllvpeAFIAYVa2UlSUxUUgOrt7FaZS9rrlM";
window.tokenJERRY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3MDAyMjk1MjN9.Jwr1I8pkjh3roG_3uUss3kgcGrays2eepnFzdawNuDA";

function checkUser(username, password, token){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4) {
            if(xmlhttp.status == 204) {
                console.log("Exists");
            } else if(xmlhttp.status == 404) {
                console.log("Does not exist");
            }
        }
    }
}

xmlhttp.open("GET", window.backendUrl + "/user/" + username, true);
xmlhttp.setRequestHeader("Authorization", "Bearer " + token);

xmlhttp.send();

function validateForm(){
    var username = document.getElementById("uname").value;
    var password = document.getElementById("pw").value;
    var password2 = document.getElementById("cPw").value;
    var error = document.getElementById("error");

    var isValid = true;

    checkUser("Tom", "12345678", window.tokenTOM);
    checkUser("Jerry", "87654321", window.tokenJERRY);


    //checks, if user already exists
       
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