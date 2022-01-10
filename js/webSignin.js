const username1 = document.querySelector('#username');
const email1 = document.querySelector('#email');
const phone1 = document.querySelector('#phone');
const password1 = document.querySelector('#password');
const confirmPassword1 = document.querySelector('#confirmPassword');

const form = document.querySelector('#signup')
console.log(form);
const isRequired = value => value === '' ? false: true;

const isBetween = (length, min, max) => length < min || length >max ? false:true;

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};
const isPhoneValid = (phone) => {
    const re = /^(?:\+88|01)?(?:\d{11}|\d{13})$/;
    return re.test(phone);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};

const showError = (input, message) => {
	const formfield = input.parentElement;
	formfield.classList.remove('success');
	formfield.classList.add('error');

	const error = formfield.querySelector('small');
	error.textContent = message;
}

const showSuccess = (input, message) => {
	const formfield = input.parentElement;
	formfield.classList.remove('error');
	formfield.classList.add('success');

	const error = formfield.querySelector('small');
	error.textContent = '';
}

const checkUsername = () => 
{
	let valid = false;
	const min=6;
	const max = 20;
	const username = username1.value.trim();

	if (!isRequired(username))
	{
		showError(username1, 'Username Cannot be blank.' );
	}

	else if(!isBetween(username.length, min, max))
	{
		showError(username1, `Username must be between ${min} and ${max} characters.` );
	}

	else{
		showSuccess(username1);
		valid = true;
	}
	return valid;
}

const checkemail = () => 
{
	let valid = false;
	const email = email1.value.trim();

	if (!isRequired(email))
	{
		showError(email1, 'Email Cannot be blank.' );
	}

	else if(!isEmailValid(email))
	{
		showError(email1, 'Email is not valid' );
	}

	else{
		showSuccess(email1);
		valid = true;
	}
	console.log(valid)
	return valid;
}
const checkphone = () => 
{
	let valid = false;
	const phone = phone1.value.trim();

	if (!isRequired(phone))
	{
		showError(phone1, 'Phone Cannot be blank.' );
	}

	else if(!isPhoneValid(phone))
	{
		showError(phone1, 'Phone is not valid' );
	}

	else{
		showSuccess(phone1);
		valid = true;
	}
	console.log(valid)
	return valid;
}
const checkPassword = () => 
{
	let valid = false;
	const password = password1.value.trim();

	if (!isRequired(password))
	{
		showError(password1, 'Pasword Cannot be blank.' );
	}

	else if(!isPasswordSecure(password))
	{
		showError(password1, 'Password is not valid' );
	}

	else{
		showSuccess(password1);
		valid = true;
	}
	return valid;
}

const checkconfirmPassword = () => 
{
	let valid = false;
	const confirmPassword = confirmPassword1.value.trim()
	const password = password1.value.trim();

	if (!isRequired(confirmPassword))
	{
		showError(confirmPassword1, 'Pasword Cannot be blank.' );
	}

	else if(password !== confirmPassword)
	{
		showError(confirmPassword1, 'Password doesnot match' );
	}

	else{
		showSuccess(confirmPassword1);
		valid = true;
	}
	return valid;
}


form.addEventListener('submit', function(e)
{
	e.preventDefault();

	let isUsernameValid = checkUsername();
	let isEmailValid = checkemail();
	let isPhoneValid = checkphone();
	let isPasswordValid = checkPassword();
	let isconfirmPasswordValid = checkconfirmPassword();
	console.log(isconfirmPasswordValid)

	let isFormValid = isUsernameValid && isEmailValid && isPhoneValid && isPasswordValid && isconfirmPasswordValid;
	if(isFormValid)
	{
		window.alert("Hello " + username1.value +" welcome to our website");
	}




})