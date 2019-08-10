var uname = document.getElementById("uname");
var pass = document.getElementById("pass");

function finalValidation(form)
{
	if(uname.value.length === 0)
	{
		uname.focus();
		uname.style.background = "rgba(255,0,0,0.2)";
		return false;
	}
	
	else if(pass.value.length === 0)
	{
		pass.focus();
		pass.style.background = "rgba(255,0,0,0.2)";
		return false;
	}
	
	else
	{
		return true;
	}
}