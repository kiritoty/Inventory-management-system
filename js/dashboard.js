window.onload = comment;
var callOne = true;

function onecli() {
   	document.getElementById("side-navagate-bar").classList.toggle('active');
	document.getElementById("main-area").classList.toggle('active');
	document.getElementById("main-area").style.width = "120%";
}

function twocli() {
	document.getElementById("side-navagate-bar").classList.toggle('active');
	document.getElementById("main-area").classList.toggle('active');
   	document.getElementById("main-area").style.width = "100%";
}

function toggleSideBar(){
   	if(callOne){
   		onecli();
   	}else{
   		twocli();
   	}
  	callOne = !callOne;
}

function main(){
	document.getElementById("main-area").classList.toggle('active');
}

function comment() {
	var d = new Date();
	for(var i = comments.length-1; i > comments.length-6 ; i--) {
		var div = document.getElementById("message");
		var input = document.createElement("a");
		var date = document.createElement("span");	
		var block = document.createElement("div");
		
		input.className = "task-list";
		block.innerHTML = comments[i][1];
			
		date.className = "badge";
		if(comments[i][6] != d.getFullYear()){
			date.innerHTML = d.getFullYear() - comments[i][6] + " year ago";
		}else if(comments[i][5] != (d.getMonth()+1)){
			date.innerHTML = (d.getMonth()+1) - comments[i][5] + " month ago";
		}else if(comments[i][4] != d.getDate()){
			date.innerHTML = d.getDate() - comments[i][4] + " day ago";
		}else if(comments[i][2] != d.getHours()){
			date.innerHTML = d.getHours() - comments[i][2] + " hour ago";
		}else{
			date.innerHTML = d.getMinutes() - comments[i][3] + " minute ago";
		}
		
		div.appendChild(input);
		input.appendChild(block);
		block.appendChild(date);
		
		
	}
}

function openSales() {
	confirm("Total sales: ");
}
function openIncome() {
	confirm("Total Income: ");
}
