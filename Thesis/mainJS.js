
var item = document.getElementById('active').className;
var i=0;
var classes;

while(classes =item.split(" ")){
	if(classes[i] == "green"){
		document.getElementById("main").innerHTML = "greennnnn";
	}else if(classes[i] == "blue"){
		document.getElementById("main").innerHTML += "blue";
	}else if(classes[i] == "red"){
		document.getElementById("main").innerHTML += "red";
	}else if(classes[i] == "orange"){
		document.getElementById("main").innerHTML += "orange";
	}else{
		document.getElementById("main").innerHTML += classes+"<br />";
	}
	i++;
}