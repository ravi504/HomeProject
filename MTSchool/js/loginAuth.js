function submitSinup_form(){
 let msg = "Congrats Your registration have been Completed! Your login details are send to your Email address."
 let fname = document.getElementById("fname").value;
 let lname = document.getElementById("lname").value;
 let email = document.getElementById("email").value;
 let pass = document.getElementById("password").value;
 let mobile = document.getElementById("mobile").value;
 let id = document.getElementById("submit");
 let sin_msg = document.querySelector("sinupMessage");
 let input = document.querySelectorAll("input");
 
 
 function dismiss_form(){
	 id.setAttribute("data-dismiss","modal"); 
		
	setTimeout(function(){
		alert(msg);
		for(var i=0; i<input.length; i++){
		  input[i].value = "";
	  };
	},500);
 }
 
 function store_arr(){
	 let arr = [];
	 let arr_val = localStorage.getItem("valid_details");
	  if (arr_val !== null){
			arr = JSON.parse(arr_val);
	  }
	  return arr;
 }
 
 function store_val(){
	 let arr = store_arr();
	 let obj = {
	  fname : fname,
	  lname : lname,
	  email : email,
	  pass : pass,
	  mobile : mobile,
  }
      arr.push(obj);
	  localStorage.setItem("valid_details",JSON.stringify(arr));
	  
	  
	  return false;
 }
 
 function check_validation(){
 if (fname == ""){
	 alert("Enter your first name");
	 fname.focus();
	 return false;	
 }else if(lname == "" ){
	 alert("Enter your lastname");
	 lname.focus();
	 return false;
 }else if(email == "" ){
	 alert("Enter your email");
	 email.focus();
	 return false;
 }else if(pass == "" ){
	 alert("Enter your password");
	 pass.focus();
	 return false;
 }else if(mobile == "" ){
	 alert("Enter your mobile number");
	 mobile.focus();
	 return false;
 }else{
	 	
	dismiss_form();
	
	 //sin_msg.innerHTML = "Your data is saved !"
	 
	 store_val();
	 //localStorage.clear();
	 
	  
	  
	 return true;
 }
 }
  check_validation(); 
  //alert(arr.length);
  //show_data();
}

function login_form(){
	let user_name = document.getElementById("user_name").value;
	let user_pass = document.getElementById("user_pass").value;
	let id = document.getElementById("submit");
	let login_name = document.getElementById("login");
	
	function get_data(){
		let arr = [];
		let arr_vall = localStorage.getItem("valid_details");
		 if(arr_vall !== null){
			 arr = JSON.parse(arr_vall)
		 }
		 return arr;
	}
	
	 function login_validate(){
		 let arr = get_data();
		 function valid(){
			 if (user_name == ""){
				 alert("Please enter the user name");
				 user_name.focus();
				 return false;
			 }else if(user_pass == ""){
				 alert("enter the password");
				 user_pass.focus();
				 return false;
			 }else{
				 for (let x = 0; x < arr.length; x++){
			  if (user_name == arr[x].fname && user_pass == arr[x].pass){
				  id.setAttribute("data-dismiss","modal");
				  let u_fname = arr[x].fname;
				  let u_lname = arr[x].lname;
				  let wel_msg = "Welcome " + u_fname + " " + u_lname;
				  login_name.textContent = wel_msg;
			  }else{
				  alert("Invalid")
			  };
		 };
				 return true;
			 }
		 }
		 valid();
 };
  login_validate();  
}
