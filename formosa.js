/*連結*/
function goTo(type){
	switch(type){
		case 0:window.location.href = "login.php"; break;
		case 1:window.location.href = "logout.php"; break;
		case 2:window.location.href = "user.php"; break;
		case 3:window.location.href = "gallery.php"; break;
		case 4:window.location.href = "index.php"; break;
		case 5:window.location.href = "user_admin.php"; break;
		case 6:window.location.href = "makerhome.php"; break;
		default:window.location.href = "index.php"; break;
	}
}
function goBack(){
	window.history.back();
}
function openTheme(id){
	window.location.href = "theme.php?themeID="+id;
}
function openDiary(id){
	window.location.href = "diary.php?map="+id;
}
function openTrip(id){
	window.location.href = "trip.php?map="+id;
}
function sort(item,type){
	var url;
	if(type){
		url = "gallery.php?category="+type+"&sort="+item;
	}
	else{
		url = "gallery.php?sort="+item;
	}
	window.location.href = url;
}


/*修改DB資料*/
function likeTheme(id,num,backtype){
	if(backtype==0) window.location.href = "gallery.php?num="+num+"&id="+id;
	else window.location.href = "theme.php?themeID="+id+"&num="+num+"&id="+id;
}
function deleteMap(id){
	$(function() {
		$( "#dialog-confirm" ).dialog({
		  resizable: false,
		  height:230,
		  modal: true,
		  buttons: {
			"Delete": function() {
			  $( this ).dialog( "close" );
			  window.location.href = "user.php?delete="+id;
			},
			Cancel: function() {
			  $( this ).dialog( "close" );
			}
		  }
		});
	  });
	/*var r = confirm("Sure to delete this map?");
	if (r == true) {
		window.location.href = "user.php?delete="+id;
	}*/
}

/*畫面呈現*/
function showAlert(type){
	if(type==0){
		$(function() {
			$( "#dialog-confirm" ).dialog({
			  resizable: false,
			  height:230,
			  modal: true,
			  buttons: {
				"OK": function() {
				  $( this ).dialog( "close" );
				  window.location.href = "login.php";
				}
			  }
			});
		  });
	}
	else if(type==1){
		$(function() {
			$( "#dialog-confirm1" ).dialog({
			  resizable: false,
			  height:230,
			  modal: true,
			  buttons: {
				"OK": function() {
				  $( this ).dialog( "close" );
				}
			  }
			});
		  });	
	}
	else if (type==2){
		$(function() {
			$( "#dialog-confirm2" ).dialog({
			  resizable: false,
			  height:230,
			  modal: true,
			  buttons: {
				"OK": function() {
				  $( this ).dialog( "close" );
				}
			  }
			});
		});		
	}
}
function swap_bar() {
    var elmnt = document.getElementById("mydiv");
	var bar1 = document.getElementById("bar1");
	var bar2 = document.getElementById("bar2");
	var menu = document.getElementById("cssmenu");
	if(elmnt.scrollTop>200){
		bar1.style.display="none";
		bar2.style.display="block";
	}
	else{
		bar2.style.display="none";
		bar1.style.display="block";		
	}
}
var isOpen=0;
function openoption(){
    var tri = document.getElementById("tri");
    var option = document.getElementById("option");
	if(isOpen==1){
		option.style.height="0px";
		tri.className="down";
		isOpen=0;
	}
	else{
		option.style.height="120px";
		tri.className="up";		
		isOpen=1;
	}
}
function moreresponse(){
    var elmnt = document.getElementById("recentresponse");
    var more = document.getElementById("more");
	elmnt.style.height="auto";
	more.innerText="";
}
function showSite(id){
    var elmnt = document.getElementById(id);
	elmnt.style.display="block";
}
function seeDetail(){
    var elmnt = document.getElementById("cover");
	elmnt.style.display="block";	
}
function hideDetail(){
    var elmnt = document.getElementById("cover");
	elmnt.style.display="none";	
}
function resize(){
	var elmnt = document.getElementById("recentresponse");
	elmnt.style.height="auto";
}
function hideLoad(){
	var elmnt = document.getElementById("load");
	elmnt.style.display="none";
}


 var scrollHeight=500,offsetHeight=500;
 var isStretch=0,isWrite=0;
(function($){
$(document).ready(function(){
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 1000) {
			$('.top').fadeIn();
			if(isWrite==0){
				$('.msgwindow').fadeIn();
			}
		} else {
			$('.top').fadeOut();
			if(isWrite==0){
				$('.msgwindow').fadeOut();
			}
		}
	});
	
	//Click event to scroll to top
	$('.top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	//Click to open
	$('.msgbtn0').click(function(){
		$(".msgwindow").animate({top : 100},600);
		$(".msgwindow").css("display", "block");
		isWrite=1;
		return false;
	});
	//Click to open
	$('.msgbtn').click(function(){
		$(".msgwindow").css("display", "block");
		$(".msgwindow").animate({top : 100},600);
		isWrite=1;
		return false;
	});
	//Click to close
	$('#closemsg').click(function(){
		$(".msgwindow").css("display", "none");
		$(".msgwindow").css("top", "91.5%");
		if($(window).scrollTop() > 1000){
			$(".msgwindow").css("display", "block");
		}
		isWrite=0;
		return false;
	});
	//Click to close
	$('.close').click(function(){
		$(".siteblock").css("display", "none");
		return false;
	});
	//Key Press
	$("#site").keypress(function(event){       
        if (event.keyCode == 13) $("#searchform").submit();
    });
});
})(jQuery);