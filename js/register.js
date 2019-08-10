var uname = document.getElementById("username"); //notEmpty
var password = document.getElementById("password"); //notEmpty
var cpassword = document.getElementById("cpassword"); //notEmpty and confirmPass
var name = document.getElementById("name"); //notEmpty
var contact_number = document.getElementById("contact_number"); //notEmpty


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function notEmpty(elem, minorCall, formalArg1)
{
	if(elem.value.length === 0)
	{
		elem.style.background = "rgba(255,0,0,0.2)";
		return false;
	}
	
	else
	{
		if(typeof minorCall == "undefined")
		{
			minorCall = 0;
		}
		
		switch(minorCall)
		{
			case 0:
				elem.style.background = "rgba(0,255,0,0.2)";
				break;
			
			case 1:
				if(!isNumeric(elem)) return false;
				else break;
			
			case 2:
				if(!isAlphabet(elem)) return false;
				else break;
				
			case 3:
				if(!isAlphanumeric(elem)) return false;
				else break;
			
			case 4:
				if(!confirmPass(elem, formalArg1)) return false;
				else break;

				
			default:
				document.writeln("Live Validation Error @ minorCall!");
				document.writeln("Last read minorCall value = " + minorCall);
		}
		return true;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function checked(elem)
{
	if(elem.checked)
	{
		elem.style.background = "rgba(0,255,0,0.2)";
		return true;
	}
	
	else
	{
		elem.style.background = "rgba(255,0,0,0.2)";
		return false;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function isNumeric(elem)
{
	var numericExpression = /^[0-9]+$/;
	
	if(elem.value.match(numericExpression))
	{
		elem.style.background = "rgba(0,255,0,0.2)";
		return true;
	}
	
	else
	{
		elem.style.background = "rgba(255,0,0,0.2)";
		return false;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function isAlphabet(elem)
{
	var alphaExp = /^[a-zA-Z]+$/;
	
	if(elem.value.match(alphaExp))
	{
		elem.style.background = "rgba(0,255,0,0.2)";
		return true;
	}
	
	else
	{
		elem.style.background = "rgba(255,0,0,0.2)";
		return false;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function isAlphanumeric(elem)
{
	var alphaExp = /^[0-9a-zA-Z]+$/;
	
	if(elem.value.match(alphaExp))
	{
		elem.style.background = "rgba(0,255,0,0.2)";
		return true;
	}
	
	else
	{
		elem.style.background = "rgba(255,0,0,0.2)";
		return false;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function confirmPass(cpass, pass)
{
	if(pass.value != cpass.value) //if don't match
	{
		cpass.style.background = "rgba(255,0,0,0.2)";
		return false;
	}
	
	else //if match
	{
		cpass.style.background = "rgba(0,255,0,0.2)";
		return true;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function finalValidation(form)
{
	if(!notEmpty(uname))
	{
		uname.focus();
		return false;
	}
	
	else if(!notEmpty(password))
	{
		password.focus();
		return false;
	}
	
	else if(!notEmpty(cpassword, 4, password))
	{
		cpassword.focus();
		return false;
	}
	
	else if(!notEmpty(name))
	{
		name.focus();
		return false;
	}
	
	else if(!notEmpty(contact_number))
	{
		contact_number.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}