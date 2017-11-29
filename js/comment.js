window.onload = comment;
var callOne = true;

function one() {
   	document.getElementById("side-navagate-bar").classList.toggle('active');
	document.getElementById("main-area").classList.toggle('active');
	document.getElementById("main-area").style.width = "120%";
}

function two() {
	document.getElementById("side-navagate-bar").classList.toggle('active');
	document.getElementById("main-area").classList.toggle('active');
   	document.getElementById("main-area").style.width = "100%";
}

function toggleSideBar(){
   	if(callOne){
   		one();
   	}else{
   		two();
   	}
  	callOne = !callOne;
}

function main(){
	document.getElementById("main-area").classList.toggle('active');
}

function comment() {
	for(var i = 0; i < comments.length; i++) {
		var div = document.getElementById("main-area");
		var input = document.createElement("textarea");
		var button = document.createElement("button");
		input.name = "post";
		input.maxLength = "5000";
		input.cols = "80";
		input.rows = "40";
		div.appendChild(input); //appendChild
		div.appendChild(button);
	}
}