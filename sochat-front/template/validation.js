function validateEmail(){
	var checkEmail = document.getElementById('mail');
	var emailRGEX = /^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i;
	var emailResult = emailRGEX.test(checkEmail.value);
	if(emailResult == false){
		checkEmail.style.borderColor = "red";
	}
	else {
		checkEmail.style.borderColor = "green";
	}
}

function validateRepeatEmail(){
	var checkEmail = document.getElementById('mail');
	var confirmEmail = document.getElementById('emailRepeat');
	if(checkEmail.value != confirmEmail.value) {
		checkEmail.style.borderColor = "red";
		confirmEmail.style.borderColor = "red";
	}
	else{
		checkEmail.style.borderColor = "green";
		confirmEmail.style.borderColor = "green";
	}
}

function validatePhone(){
	var checkPhone = document.getElementById('phone');
	var phoneRGEX = /^[0-9]*$/;
	var phoneResult = phoneRGEX.test(checkPhone.value);
	if(phoneResult == false){
		checkPhone.style.borderColor = "red";
	}
}

function validatePassword(){
	var checkPassword = document.getElementById('password');
	var confirmPassword = document.getElementById('passwordRepeat');
	console.log(checkPassword);
	var passRGEX = /^(?=.*[0-9])[a-zA-Z0-9]{6,16}$/;
	var passResult = passRGEX.test(checkPassword.value);
	if(passResult == false || checkPassword.value != confirmPassword.value){
		checkPassword.style.borderColor = "red";
		confirmPassword.style.borderColor = "red";
		$("#submit").prop('disabled', true);
		
	}
	else{
		checkPassword.style.borderColor = "green";
		confirmPassword.style.borderColor = "green";
		$("#submit").prop('disabled', false);
	}
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