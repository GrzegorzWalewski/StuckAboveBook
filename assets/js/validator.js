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
			case "title":
			var regExp = new RegExp("[0-9a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]{2,30}");
			break;
			case "number":
			var regExp = new RegExp("[0-9]{1,5}");
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
	hiddenValidate(event,category,book)
	{
		var categoryInput = document.getElementById("categoryInput");
		var bookInput = document.getElementById("bookInput");
		if(category.value==""||book.value=="")
		{	
			document.getElementById("categoryBookReminder").classList+="uk-text-danger";
			if(category.value==""&&book.value=="")
			{
				bookInput.classList+=" uk-form-danger";
				categoryInput.classList+=" uk-form-danger";
			}
			else if(category.value=="")
			{
				categoryInput.classList+=" uk-form-danger";
				bookInput.classList+=" uk-form-success";
				book.className.replace("uk-form-danger","");
			}
			else if(book.value=="")
			{
				categoryInput.className.replace("uk-form-danger","");
				bookInput.classList+=" uk-form-danger";
				categoryInput.classList+=" uk-form-success";
			}
			event.preventDefault();
		}
		else
		{
			categoryInput.className.replace("uk-form-danger","");
			book.className.replace("uk-form-danger","");
			categoryInput.classList+=" uk-form-success";
			bookInput.classList+=" uk-form-success";

		}
	}
}
