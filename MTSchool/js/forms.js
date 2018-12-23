function formhash(form){
//	alert("OK");
 var btn_id = document.getElementById("btn_submit");
form.submit();
btn_id.setAttribute("data-dissmiss", "modal");

}

/*
function formhash(form, password){
	// Create a new element input, this will be our hashed password field.
	var p = document.createElement("input");
	
	//Add the new element to our form.
	form.appendChild(p);
	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(password.value);
	
	//make sure the planetext password doesn't get sent.
	password.value = "";
	form.submit();
}

function reg_formhash(form, uid, email, password, conf){
	//check all field have a value.
	if (uid.value == '' || email.valu == '' || password.value == '' || conf.value == ''){
		alert("All field are required!");
		return false;
	}
	//check the username field.
	re = /^\w+$/;
	if (!re.test(form.username.value)){
		alert('username must contain only letter, number and underscore! Please try again.')
		form.username.focus();
		return false;
	}
	if (password.value.length < 6){
		alert('Password must be at least 6 character long. Please try again.');
		form.password.focus();
		return false;
	}
	// At least one number, one lowercase and one uppercase letter 
    // At least six characters 
	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	if (!re.test(password.value)){
		alert("Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again");
		return false;
	}
	if (password.value != conf.value){
		alert('Your password and confermation are not matched. Please try again');
		form.password.focus();
		return false;
	}
	 // Create a new element input, this will be our hashed password field. 
	 var p = document.createElement("input");
	 
	 form.appendChild(p);
	 p.name = "p";
	 p.type = "hidden";
	 p.value =hex_sha512(password.value);
	 password.value = "";
	 conf.value = "";
	 form.submit();
	 return true;
}
*/
