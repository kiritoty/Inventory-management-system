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
		var div = document.getElementById("comment");
		var input = document.createElement("input");
		var date = document.createElement("input");
		input.className = "commentTextArea";
		input.readOnly = true;
		input.maxLength = "255";
		input.value = comments[i][0] + ". " + comments[i][1];
		date.className = "date";
		date.textalign = "right";
		date.readOnly = true;
		date.value = "date:" + comments[i][2] + "/" + comments[i][3] + "/" + comments[i][4];
		div.appendChild(input);
		div.appendChild(date);
	}
}