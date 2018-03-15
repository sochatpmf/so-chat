function validateEmail(){
	var checkEmail = document.getElementById('mail');
	var confirmEmail = document.getElementById('emailRepeat');
	var emailRGEX = /^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i;
	var emailResult = emailRGEX.test(checkEmail.value);
	if(emailResult == false || checkEmail.value != confirmEmail.value){
		checkEmail.style.borderColor = "red";
		confirmEmail.style.borderColor = "red";	}
	else {
		checkEmail.style.borderColor = "green";
		confirmEmail.style.borderColor = "green";
	}
}

function vE(){
	var checkEmail = document.getElementById('mail');
	var confirmEmail = document.getElementById('emailRepeat');
	var emailRGEX = /^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i;
	var emailResult = emailRGEX.test(checkEmail.value);
	return emailResult;
}

function validatePhone(){
	var checkPhone = document.getElementById('phone');
	var phoneRGEX = /^[0-9]*$/;
	var phoneResult = phoneRGEX.test(checkPhone.value);
	if(phoneResult == false){
		checkPhone.style.borderColor = "red";
	} else {
		checkPhone.style.borderColor = "green";
	}
}

function vPh(){
	var checkPhone = document.getElementById('phone');
	var phoneRGEX = /^[0-9]*$/;
	var phoneResult = phoneRGEX.test(checkPhone.value);
	return phoneResult;
}

function validatePassword(){
	var checkPassword = document.getElementById('password');
	var confirmPassword = document.getElementById('passwordRepeat');
	var passRGEX = /^(?=.*[0-9])[a-zA-Z0-9]{6,16}$/;
	var passResult = passRGEX.test(checkPassword.value);
	if(passResult == false || checkPassword.value != confirmPassword.value){
		checkPassword.style.borderColor = "red";
		confirmPassword.style.borderColor = "red";
	}
	else{
		checkPassword.style.borderColor = "green";
		confirmPassword.style.borderColor = "green";
	}
}

function vPw(){
	var checkPassword = document.getElementById('password');
	var confirmPassword = document.getElementById('passwordRepeat');
	var passRGEX = /^(?=.*[0-9])[a-zA-Z0-9]{6,16}$/;
	var passResult = passRGEX.test(checkPassword.value);
	return passResult;
}

function validateAge(){
 	var checkAge = document.getElementById('age');
	if(checkAge.value < 8 || checkAge.value > 88){
		checkAge.style.borderColor = "red";
	}
	else {
		checkAge.style.borderColor = "green";
	}
}

function vA(){
 	var checkAge = document.getElementById('age');
	if(checkAge.value < 8 || checkAge.value > 88){
		return false;
	}
	else {
		return true;
	}
}

function validate(){
	if(vPh() && vE() && vA() && vPw()) 
		$("#submit").prop('disabled', false);
	else
		$("#submit").prop('disabled', true);
}

function login(){
	document.getElementById('signup').style.display='none';
	document.getElementById('login').style.display='block';
}