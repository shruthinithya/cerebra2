var check=false, name=false, phone=false, pass=false, email=false, access_token=false;
function validatename(key)
{
	var name=key.value;
	if (!name.match(/^[a-zA-Z. ]{2,50}$/))
	{
		key.style.borderColor="red";
		window.name = false;
	}
	else
	{
		key.style.borderColor="green";
		window.name = true;
	}
	key.style.borderWidth="1px";
}
function validatephone(key) {      
	var phone = key.value;				
	if((phone.match(/^[0-9]+$/) == null) || phone.length != 10)
	{
		window.phone = false;
		key.style.borderColor="red";
	}	
	else
	{
		key.style.borderColor="green";
		window.phone = true;
	}
	key.style.borderWidth="1px";
} 
function validatepass(key) {      
	var pass = key.value;
	if(pass.length<8)
	{
		window.pass = false;
		key.style.borderColor="red";
	}	
	else
	{
		key.style.borderColor="green";
		window.pass = true;
	}
	key.style.borderWidth="1px";
}
function validatemail(key) { 
	var x = key.value;
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
	{
		window.email = false;
		key.style.borderColor="red";
	}
	else
	{
		key.style.borderColor="green";
		window.email = true;
	}			
	key.style.borderWidth="1px";		
}
function Validate(formid)
{
	if(check)
	{		
		var degree = $('#degree-select');
		if (degree.val() === '') 
		{
			alert("Invalid");
            //$('#selBooks').focus();
        }

		/*if($('#degree-select').val()=="")
		{
			alert("Invalid")
		}*/
		else
		{
			formid.method = "post";
			formid.action = "register.php";
		}
	}
	/*if(check)
	{
		formid.method = "post";
		formid.action = "register.php";
	}
	else
		alert("Invalid")*/
}
function validateAccessToken(key)
{
	var access_token=key.value;
	if (!access_token.match(/^[a-zA-Z0-9]{10,50}$/))
	{
		key.style.borderColor="red";
		window.access_token = false;
	}
	else
	{
		key.style.borderColor="green";
		window.access_token = true;
	}
	key.style.borderWidth="1px";
}

function returnCheck()
{
	return (window.name && window.phone && window.email && window.pass);
}

function returnCheckForLogin()
{
	
	return (window.email && window.pass);

}

function returnEmail()
{
	
	return window.email;

}

function returnPasswordReset()
{
	return (window.access_token && window.pass);

}

function returnWorkshopRegistration()
{
		return (window.email && window.phone);
}