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
	var d = new Date();
	for(var i = comments.length-1; i > comments.length-6 ; i--) {
		var div = document.getElementById("message");
		var input = document.createElement("a");
		var date = document.createElement("span");
		input.className = "task-list";
		input.innerHTML = comments[i][1];
		date.className = "badge";
		if(comments[i][6] != d.getFullYear()){
			date.innerHTML = d.getFullYear() - comments[i][6] + " year ago";
		}else if(comments[i][5] != (d.getMonth()+1)){
			date.innerHTML = (d.getMonth()+1) - comments[i][5] + " month ago";
		}else if(comments[i][4] != d.getDate()){
			date.innerHTML = d.getDate() - comments[i][5] + " day ago";
		}else if(comments[i][2] != d.getHours()){
			date.innerHTML = d.getHours() - comments[i][2] + " hour ago";
		}else{
			date.innerHTML = d.getMinutes() - comments[i][3] + " minute ago";
		}
		div.appendChild(input);
		input.appendChild(date);
		//document.getElementById("Tasks_Panel-info").style.height = "20px*i"
	}
}