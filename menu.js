var pos = 0;
function up(){
	var menu = document.getElementById("menu");
		menu.style.left=(pos+720)+"px";	
		pos+=720;
		console.log("up\n"+menu);
}
function down(){
		menu.style.left=(pos-720)+"px";	
		pos-=720;
		console.log("dwon"+menu);
}