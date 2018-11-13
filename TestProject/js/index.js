function todo_list(){
	var arr = [];
	var arr_text = localStorage.getItem("todo");
	 if (arr_text !== null){
		 arr = JSON.parse(arr_text);
	 }
	  return arr;
}

function add(){
	var arr = todo_list();
	var input = document.getElementById("input_name");
	var input_text = input.value;
	 if(input_text == ""){
		 alert("Please enter the input value")
	 }else if(arr.indexOf(input_text) == 0){
		 alert("input text is already exist!")
	 }else{
		 arr.push(input_text);
		 localStorage.setItem("todo",JSON.stringify(arr));
		 input.value = "";
	 }
	 	 
	 show();//
	 return false;//
}

function remove(){
	var id = this.getAttribute("id");
	var arr = todo_list();
	arr.splice(id,1);
	localStorage.clear();
	localStorage.setItem("todo",JSON.stringify(arr));
	
	
	show();//
	return false;//
}

function show(){
	var arr = todo_list();
	var html = "<ul id='my_list' class='list-group'>";
	var span_text = "\u00D7";
	
	for (var i=0; i<arr.length; i++){
		html += "<li class='list-group-item' id='li'>" + arr[i] + "<span class='clos_e'>" + span_text + "</span>"+"</li>";
	}
		html += "</ul>";
	
	document.getElementById("todo").innerHTML = html;
		
	var close = document.getElementsByClassName("clos_e");
     for (var i=0; i<close.length; i++){
		 close[i].addEventListener('click', remove);
	 }
   	 
	var list = document.querySelectorAll("li");
     for (var i=0; i<list.length; i++){
		 list[i].addEventListener('click', function(e){
			 e.target.classList.toggle("checked");
		 },false);
	 }	
}

document.getElementById("add").addEventListener('click', add);
show();