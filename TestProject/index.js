function add_list(){
	let form = document.querySelectorAll('form');
	let ul = document.getElementById("my_list");
	let li = document.createElement("li");
	let input_id = document.getElementById("input_name");
	let input_txt = input_id.value;
	//let text = document.createTextNode(input_txt);
	let span = document.createElement("span");
	let span_txt = "\u00D7"; // cancle mark.
	let clos_e = document.getElementsByClassName("clos_e");
	let i;
	let itemsArray = localStorage.getItem('items') ? JSON.parse(localStorage.getItem('items')) : [];
    
	
	localStorage.setItem('items', JSON.stringify(itemsArray));
	let data = JSON.parse(localStorage.getItem('items'));
	
	
	
	let liMaker = (text) =>{		
	li.append(text);
	li.className = "list-group-item";
	ul.appendChild(li);
	
	
	
	};
	
	// data.forEach(item => {
	// liMaker(item);
// });
   for(var j=0; j<data.length;j++){
	   liMaker(data[j]);
	   
	   //return false;
   }
	
	if (input_txt == ""){
		  alert("Enter your todo list !");
	 }else{
		 itemsArray.push(input_txt);
		 localStorage.setItem('items', JSON.stringify(itemsArray));
		 JSON.parse(localStorage.getItem('items'));
		 liMaker(input_txt);
		 input_id.value = "";
		 //return true;
	 };
	
	 
	span.className = "clos_e";
	//span.className = "list-group-item";
	span.append(span_txt);
	li.appendChild(span);
	
	for (i = 0; i < clos_e.length; i++){
		 clos_e[i].onclick = function(){
			 let div = this.parentElement;
			 div.style.display = "none";
		 };
	}
	
	
//localStorage.clear();

}

// function run(){
		// localStorage.setItem('items', JSON.stringify(itemsArray));
	// let data = JSON.parse(localStorage.getItem('items'));
		// data.forEach(item => {
	// liMaker(item);
// });
// alert(123)
	// }
// window.addEventListener('onload',run());
	