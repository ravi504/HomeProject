function add_list(){
	let ul = document.getElementById("my_list");
	let li = document.createElement("li");
	let input_txt = document.getElementById("input_name").value;
	let text = document.createTextNode(input_txt);
	let span = document.createElement("span");
	let span_txt = "\u00D7"; // cancle mark.
	let clos_e = document.getElementsByClassName("clos_e");
	let i;
	
	li.append(text);
	
	 if (input_txt == ""){
		  alert("Enter your todo list !");
	 }else{
		 ul.appendChild(li);
	 }
	 
	span.className = "clos_e";
	span.append(span_txt);
	li.appendChild(span);
	
	for (i = 0; i < clos_e.length; i++){
		 clos_e[i].onclick = function(){
			 let div = this.parentElement;
			 div.style.display = "none";
		 };
	}
}