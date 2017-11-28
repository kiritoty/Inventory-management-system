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
