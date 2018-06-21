class My_Validator
{
	validate(my_input,submitButton,type){

		switch(type)
		{
			case "password":
			var regExp = new RegExp(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9\S]{8,})$/)
			break;
			case "username":
			var regExp = new RegExp("[0-9a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]{6,10}");
			break;
			case "mail":
			var regExp = new RegExp("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$");
			break;
			case "text":
			var regExp = new RegExp("[0-9a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]{6,200}");
			break;
			default:
			alert("Your validator is set wrong!");
			break;
		}
		my_input.className = my_input.className.replace("uk-form-danger","");
		my_input.className = my_input.className.replace("uk-form-success","");

		var inputValue = my_input.value;
		var result = regExp.test(inputValue);
		if(inputValue != "")
		{
			if(result)
			{
				my_input.className += " uk-form-success";
				submitButton.removeAttribute("disabled");
			}
			else
			{
				my_input.className += " uk-form-danger";
				submitButton.setAttribute("disabled","");
			}
		}
	}
	submit(submitButton,form,event)
	{
		for(var i=0;i<form.length;i++)
		{
			if(form[i].value=="")
			{
				form[i].className += " uk-form-danger";
				submitButton.setAttribute("disabled","");
				event.preventDefault();
			}
		}
	}
	passConfirm(passInput,confirmInput,submitButton)
	{
		confirmInput.className = confirmInput.className.replace("uk-form-danger","");
		confirmInput.className = confirmInput.className.replace("uk-form-success","");
		if(passInput.value!==confirmInput.value)
		{
			confirmInput.className += " uk-form-danger";
			submitButton.setAttribute("disabled","");
		}
		else
		{
			confirmInput.className += " uk-form-success";
			submitButton.removeAttribute("disabled");
		}
	}
}
