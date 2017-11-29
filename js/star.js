window.onload = SetStarts;

function SetStarts(){
	var list = "";
	var x;
	var y;
	var color = "#fff";
	var px = "px ";
	var max = 1500;
	// stars
	for (var i = 0; i < max; i++) {
		x = Math.floor((Math.random() * 2000) + 1);
		y = Math.floor((Math.random() * 2000) + 1);
    	if(i == max - 1){
    		list += x + px + y + px + color;
    	}else{
    		list += x + px + y + px + color + ",";
    	}
	}
	document.getElementById("stars").style.boxShadow = list;
	
	// stars2
	list = "";
	max = 250;
	for (var i = 0; i < max; i++) {
		x = Math.floor((Math.random() * 2000) + 1);
		y = Math.floor((Math.random() * 2000) + 1);
    	if(i == max - 1){
    		list += x + px + y + px + color;
    	}else{
    		list += x + px + y + px + color + ",";
    	}
	}
	document.getElementById("stars2").style.boxShadow = list;
	
	// stars3
	list = "";
	max = 125;
	for (var i = 0; i < max; i++) {
		x = Math.floor((Math.random() * 2000) + 1);
		y = Math.floor((Math.random() * 2000) + 1);
    	if(i == max - 1){
    		list += x + px + y + px + color;
    	}else{
    		list += x + px + y + px + color + ",";
    	}
	}
	document.getElementById("stars3").style.boxShadow = list;
	
}