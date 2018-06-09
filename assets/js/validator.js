class My_Validator
{
	mail(my_mail){
		var mailValidate = new RegExp("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$");
		return mailValidate.test(my_mail);
	}
	password(my_pass){
		var passValidate = new RegExp(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9\S]{8,})$/);
		return passValidate.test(my_pass);
	}
	username(my_username)
	{
		var usernameValidate = new RegExp("[0-9a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]{6,10}");
		return usernameValidate.test(my_username);
	}
}
