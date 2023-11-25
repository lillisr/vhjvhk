/*function checkInputs() {
    const username = document.getElementById('uname').innerHTML;
    const password = document.getElementById('pw').innerHTML;
    const password2 = document.getElementById('cPw').innerHTML;

	// trim to remove the whitespaces
	const usernameValue = uname.value.trim();
	const passwordValue = pw.value.trim();
	const password2Value = cPw.value.trim();
	
	if(usernameValue === '') {
		setErrorFor(uname, 'Username cannot be blank');
	} else if(usernameValue < 3){
		setErrorFor(uname, 'Username mus be at leat 3 characters long');
	}else {
		setSuccessFor(username);
	}
	
	if(passwordValue === '') {
		setErrorFor(pw, 'Password cannot be blank');
	} else if(passwordValue < 8) {
		setErrorFor(pw, 'Password must be at leat 8 characters long');
	}else {
		setSuccessFor(pw);
	}
	
	if(password2Value === '') {
		setErrorFor(cPw, 'Password2 cannot be blank');
	} else if(passwordValue !== password2Value) {
		setErrorFor(cPw, 'Passwords does not match');
	} else{
		setSuccessFor(cPw);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
*/

let nameInput = document.querySelector("#uname");
let passwordInput = document.querySelector("#pw");
let password2Input = document.querySelector("#cPw");
let registerButton = document.querySelector("#button");


window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2"; 

window.tokenTOM = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNzAwNzgwNzM3fQ.HaO_j5PUo71IYVey0fT5tksB61foC_6l0A8SkvrtCm8";
window.tokenJERRY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3MDA3ODA3Mzd9.6D_HuNQvQ7HVxCWsuH7IEwJuYc7BN2HfcvSwkKiIbrM";

nameInput.classList.remove('error-input', 'success-input');
passwordInput.classList.remove('error-input', 'success-input');
password2Input.classList.remove('error-input', 'success-input');


registerButton.addEventListener('click', function() {

    let nameValue = nameInput.value;
    let passwordValue = passwordInput.value;
    let password2Value = password2Input.value;

    if(nameValue.length < 3){
        nameInput.classList.add("error-input");
    }else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4) {
                if(xmlhttp.status == 204) {
                    nameInput.classList.add("error-input");
                } else if(xmlhttp.status == 404) {
                    console.log("Does not exist");
                }
            }
        };
        xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/user/"+nameValue, true);
        xmlhttp.send();
    }

    if(passwordValue.length < 8) {
        passwordInput.classList.add("error-input");
        password2Input.classList.add("error-input");
    }else if(passwordValue !== password2Value){
        passwordInput.classList.add("error-input");
        password2Input.classList.add("error-input");
    }else{
        passwordInput.classList.add("success-input");
        password2Input.classList.add("success-input");

    }
});