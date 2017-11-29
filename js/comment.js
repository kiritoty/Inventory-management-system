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
		var input = document.createElement("a");
		var date = document.createElement("span");
		input.className = "task-list";
		input.innerHTML = comments[i][1];
		date.className = "badge";
		date.innerHTML = comments[i][2] + ":" + comments[i][3] + " " + comments[i][5] + "/" + comments[i][4] + "/" + comments[i][6];
		div.appendChild(input);
		input.appendChild(date);
		//document.getElementById("Tasks_Panel-info").style.height = "20px*i"
	}
	var scroll = document.getElementById("Tasks_Panel-info");
	scroll.scrollTop = scroll.scrollHeight;
}