<?php
session_start();
include("mysqlInc.php");
?>

<html>
<head>
	<meta charset="UTF-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="shortcut icon" href="../favicon.ico"> 
	<script type="text/javascript" src="formosa.js"></script>
	<link rel=stylesheet type="text/css" href="formosa.css">
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />	
	<title>漫遊formosa</title>
    <style>
        body{
		background-image:url("pic/wall.jpg");
		background-attachment:fixed;
		 
		}
	.view-first img {
   -webkit-transition: all 0.2s linear;
   -moz-transition: all 0.2s linear;
   -o-transition: all 0.2s linear;
   -ms-transition: all 0.2s linear;
   transition: all 0.2s linear;
}
.mask{
	position:absolute;
	top:25%;
	left:0%;
	right:0%;
	width:100%;
	-moz-border-radius:100px;
	-webkit-border-radius:100px;


}
.view-first .mask {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   background-color: rgba(255, 255, 204,0.6);
   -webkit-transition: all 0.4s ease-in-out;
   -moz-transition: all 0.4s ease-in-out;
   -o-transition: all 0.4s ease-in-out;
   -ms-transition: all 0.4s ease-in-out;
   transition: all 0.4s ease-in-out;

   
   
}
.view-first h2 {

   -webkit-transform: translateY(-100px);
   -moz-transform: translateY(-100px);
   -o-transform: translateY(-100px);
   -ms-transform: translateY(-100px);
   transform: translateY(-100px);
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   -webkit-transition: all 0.2s ease-in-out;
   -moz-transition: all 0.2s ease-in-out;
   -o-transition: all 0.2s ease-in-out;
   -ms-transition: all 0.2s ease-in-out;
   transition: all 0.2s ease-in-out;
}
.view-first p {

   -webkit-transform: translateY(100px);
   -moz-transform: translateY(100px);
   -o-transform: translateY(100px);
   -ms-transform: translateY(100px);
   transform: translateY(100px);
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   -webkit-transition: all 0.2s linear;
   -moz-transition: all 0.2s linear;
   -o-transition: all 0.2s linear;
   -ms-transition: all 0.2s linear;
   transition: all 0.2s linear;
   font-size:15px;
}
.view-first:hover img {
   -webkit-transform: scale(1.1,1.1);
   -moz-transform: scale(1.1,1.1);
   -o-transform: scale(1.1,1.1);
   -ms-transform: scale(1.1,1.1);
   transform: scale(1.1,1.1);
}
.view-first a.info {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   -webkit-transition: all 0.2s ease-in-out;
   -moz-transition: all 0.2s ease-in-out;
   -o-transition: all 0.2s ease-in-out;
   -ms-transition: all 0.2s ease-in-out;
   transition: all 0.2s ease-in-out;
}
.view-first:hover .mask {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
   filter: alpha(opacity=100);
   opacity: 1;
}
.view-first:hover h2,
.view-first:hover p,
.view-first:hover a.info {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
   filter: alpha(opacity=100);
   opacity: 1;
   -webkit-transform: translateY(0px);
   -moz-transform: translateY(0px);
   -o-transform: translateY(0px);
   -ms-transform: translateY(0px);
   transform: translateY(0px);
}
.view-first:hover p {
   -webkit-transition-delay: 0.1s;
   -moz-transition-delay: 0.1s;
   -o-transition-delay: 0.1s;
   -ms-transition-delay: 0.1s;
   transition-delay: 0.1s;
}
.view-first:hover a.info {
   -webkit-transition-delay: 0.2s;
   -moz-transition-delay: 0.2s;
   -o-transition-delay: 0.2s;
   -ms-transition-delay: 0.2s;
   transition-delay: 0.2s;
}

.view {

   position: relative;
   text-align: center;
   cursor: default;
 
}
.view .mask,.view .content {
   position: absolute;
   overflow: hidden;
  
}
.view img {
   display: block;
   position: relative;
}
.view h2 {
   text-transform: uppercase;
   color: #fff;
   text-align: center;
   position: relative;
   font-size: 17px;
   padding: 10px;
   background: rgba(128, 26, 0, 0.8);
   margin: 20px 0 0 0;
}
.view p {
   font-family: Georgia, serif;
   font-style: italic;
   font-size: 12px;
   position: relative;
   color:#400D00;
   padding: 10px 20px 20px;
   text-align: center;
}
.view a.info {
   display: inline-block;
   text-decoration: none;
   padding: 7px 14px;
   background: rgba(128, 26, 0, 0.7);
   color: #fff;
   text-transform: uppercase;
   -webkit-box-shadow: 0 0 1px #000;
   -moz-box-shadow: 0 0 1px #000;
   box-shadow: 0 0 1px #000;
}
.view a.info: hover {
   -webkit-box-shadow: 0 0 5px #000;
   -moz-box-shadow: 0 0 5px #000;
   box-shadow: 0 0 5px #000;
}
  label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
.style1 .ui-dialog-titlebar {
        background:#f5deb3;
		opacity:0.9;
		border:0 none;
		color:#8b4513;
}
.style1 .ui-widget {
   font-family: Cursive,Georgia, serif;
    font-size: .8em;
}
.style1 .ui-widget-content {
    background:#f5deb3;
	opacity:0.9;
    color: #222222;
}
.style1 .ui-dialog .ui-dialog-content {
    background: none repeat scroll 0 0 transparent;
    border: 0 none;
    overflow: auto;
    position: relative;
    
}
.style1 .ui-state-focus {
	border:solid #f5deb3;
}
.style1 {
background-color:#f5deb3;
opacity:0.9;
}
label {
	 font-family:Cursive, Georgia, serif;
	 color:#8b4513;
}

div.down{
	position:absolute;
	bottom:40%;
	right:0%;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 10px 10px 0 10px;
	border-color: #fff transparent transparent transparent;
	cursor:hand;
}
input.searchbar{
	border: 2px solid #808080;
	border-radius: 15px;
	outline: none;
	height:30px;
	width:40%;
}
html, body {
	padding: 0; margin: 0;
}
div.word{
	 float:left;
	 position:relative;
	 top:10px;
}
div.item{
	position:relative;
	width:100%;
	height:50px;
	text-align:center;
	top:5px;
	 cursor:hand;
}
div.item:hover{
	background:rgba(0,0,0,0.1);
}
h1.first-Title{
 color:#FF9966;
text-shadow: rgb(122, 122, 122) 4px 3px 0px;
font-family:cursive;
font-size:40pt;
}
h1.second-Title{
text-shadow: rgb(122, 122, 122) 4px 3px 0px;	
font-family:cursive;
font-size:20pt;
color:#FF6666;
position:relative;
left:40%;
}
		
    </style>
 <script>
  $(function() {
    var dialog, form;
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
     // emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
    dialog = $( "#dialog-form" ).dialog({
	dialogClass:'style1',
      autoOpen: false,
      height: 500,
      width: 350,
      modal: true,
      buttons: [
                {
                    text: "Okay",
                    click: function(){
                        //window.location.href = 'forum_1.php';
                        addUser();
                        //form.submit();
                        //return false;
                    },
                    type: "submit",
                    form: "fooform"

                },
                {
                    text: "Cancel",
                    click: function() {
                        dialog.dialog( "close" );
                    }
                },
            ],
      close: function() {
        form[ 0 ].reset();
       // allFields.removeClass( "ui-state-error" );
      }
    });
    form = dialog.find( "form" ).on( "submit", function( event ) {
   //   event.preventDefault();
   //   addUser(); 
    });
 
    $( "#make" ).button().removeClass("ui-button ui-widget ui-state-default ui-state-active").on( "click", function() {
      dialog.dialog( "open" );    });
  });
  
   $(function() {
    var editlist;
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
     // emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
    editlist = $( "#edit-list" ).dialog({
	dialogClass:'style1',
      autoOpen: false,
      height: 500,
      width: 500,
      modal: true,
      buttons: [
                {
                    text: "Cancel",
                    click: function() {
                        editlist.dialog( "close" );
                    }
                },
            ],
      close: function() {
       // allFields.removeClass( "ui-state-error" );
      }
    });

 
    $( "#edit" ).button().removeClass("ui-button ui-widget ui-state-default ui-state-active").on( "click", function() {
      editlist.dialog( "open" );    });
  });
  
   $(function() {
    var collectionlist;
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
     // emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
    editlist = $( "#collection-list" ).dialog({
	dialogClass:'style1',
      autoOpen: false,
      height: 500,
      width: 300,
      modal: true,
      buttons: [
                {
                    text: "Cancel",
                    click: function() {
                        collection.dialog( "close" );
                    }
                },
            ],
      close: function() {
        //allFields.removeClass( "ui-state-error" );
      }
    });

 
    $( "#collection" ).button().removeClass("ui-button ui-widget ui-state-default ui-state-active").on( "click", function() {
      editlist.dialog( "open" );    });
  });
  
  
  
  </script>
</head>


<body >
<?php
if(!isset($_SESSION['accountID']) || $_SESSION['accountID']==null){
	$_SESSION['from']="1";
	echo "<script>showAlert(0)</script>";
}
if(isset($_POST['startDate'])&&isset($_POST['endDate'])&&isset($_POST['title']))
{	
	if(!isset($_SESSION['accountID']) || $_SESSION['accountID']==null){
		echo "<script>showAlert(0);</script>";
		echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';
	}
	else{
		$place = $_POST['place'];
		$place = substr($place,0,2);
		$_SESSION['place'] = $place;
		$timestamp = date('Y-m-d H:i:s');
		$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];
		
		$date1 = new DateTime($startDate);
		$date2 = new DateTime($endDate);
		
		$total = round(($date2->format('U') - $date1->format('U')) / (60*60*24));
		if($total < 0 ){
			echo "<script>showAlert(2);</script>";		
		}else{	
			$title = mysql_real_escape_string($_POST['title']);
			if($place!=NULL &&$startDate!=NULL && $endDate!=NULL&& $title!=NULL){
				$sql = "INSERT INTO tempsave (title,startdate,enddate,madetime)  VALUES ('$title','$startDate','$endDate','$timestamp')";  
				mysql_query($sql);
				$sq = "SELECT id from tempsave WHERE madetime = '$timestamp'";
				$result = mysql_query($sq);
				 while($row = mysql_fetch_array($result)){
				   $id = htmlspecialchars($row['id']);
				}
				$_SESSION['id'] =  $id;
				echo "<meta http-equiv=REFRESH CONTENT=0;url=make.php>";
			}else{
				echo "<script>showAlert(1)</script>";
			}
			
		}
	}
}
?>


	<div class="bar2" id="bar2" style="display:block;">
		<div class="bartitle">
			<img src="./pics/goback.gif" style="position:relative; bottom:20%; height:60%;" onclick="goBack()">
			<img src="./pics/title3.gif" style="height:100%" onclick="goTo(4)">
		</div>
		<div class="userbar">
			<?php	
				if(!isset($_SESSION['accountID']) || $_SESSION['accountID']==null){
					echo "<div onclick=\"goTo(0)\" class=\"login\">登入/註冊</div>";
				}
				else{
					$user = htmlspecialchars($_SESSION['username']);
					$photoname = htmlspecialchars($_SESSION['photoname']);
					echo "<div class=\"barphoto\"><img src=\"./upload/".$photoname."\" style=\"height:100%;\"></div>";
					echo "<div  onclick=\"goTo(2)\" class=\"login\">".$user."</div>";
					echo "<div class=\"down\" id=\"tri\" onclick=\"openoption()\"></div>";
				}
			?>
		</div>
	</div>
	<div class="option" id="option">
	<div class="op" category="op" style="top:0px;" onclick="goTo(5)"><div class="middle" style="width:100%;">個人資料</div></div>
	<div class="op" category="op" style="top:40px;" onclick="goTo(2)"><div class="middle" style="width:100%;">我的地圖</div></div>
	<div class="op" category="op" style="top:80px;" onclick="goTo(1)"><div class="middle" style="width:100%;">登出</div></div>
</div>
	<div id="dialog-confirm" title="Oops!" style="display:none;">
	  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>You have not logged in yet.</p>
	</div>
	<div id="dialog-confirm1" title="Oops!" style="display:none;">
	  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>All fields are required!</p>
	</div>
	<div id="dialog-confirm2" title="Oops!" style="display:none;">
	  <p style="text-align:center"><span class="ui-icon ui-icon-alert"></span>Please enter the leagel date!</p>
	</div>
	

<div style="left:0;top:0%;  height:70%; background-image:url(pic/c1.jpg); background-size: 100%; background-repeat: no-repeat;">
<div id="title" style="position:absolute;left:10%;top:5%">
<h1 class="first-Title">
Plan Your trip!
</h1>
<h1 class="second-Title">
Make Life colourful
</h1>
</div>

</div>

<div id="select" class="main" style="height:30%;width:90%;position:absolute;top:45%;left:10%" >
		<div class="view view-first" style="position:absolute;left:0%;top:0%;width:27%">
			<img src="pic/circle1.png" width="100%" />
			<div class="mask" >
				<h2>Edit</h2>
				<p>Edit your past works</p>
				<a href="#" class="info" id="edit">Go To Work</a>
			</div>
		</div> 
		<div class="view view-first" style="position:absolute;left:33%;top:0%;width:27%">
                    <img src="pic/circle.png" width="100%"/>
                    <div class="mask">
                        <h2>New Trip</h2>
                        <p>Make new plan</p>
                        <a href="#" class="info" id="make">Go To Work</a>
                    </div>
         </div>  
		 <div class="view view-first" style="position:absolute;left:66%;top:0%;width:27%">
                    <img src="pic/circle3.png" width="100%" />
                    <div class="mask">
                        <h2>Collection</h2>
                        <p>Use the collection as Templates</p>
                        <a href="#" class="info" id="collection">Go To Work</a>
                    </div>
        </div>  		
</div>

<div id="dialog-form" title="Make Your Plan" style="display:none;">
  <form id='fooform' action="makerhome.php" method="post">
    <fieldset>
      <label for="title" >Name Your Trip</label>
      <input type="text" name="title" id="name" class="text ui-widget-content ui-corner-all">
    	<!--<label for="email">Email</label>
      <input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all">-->
   
	 <label for="startDate">Start date</label>
		<input name='startDate' type='date' name='birthday' size='8' class="text ui-widget-content ui-corner-all">
	 <label for="endDate">End date</label>
		<input  name='endDate' type='date' name='birthday' size='8' class="text ui-widget-content ui-corner-all">
	<label for="Place">Place</label>
		<select name='place' class="text ui-widget-content ui-corner-all">
				<option>00高雄</option>
				<option>01新竹縣</option>
				<option>02新竹市</option>
				<option>03基隆市</option>				
				<option>04台中市</option>	
				<option>05嘉義市</option>
				<option>06台南市</option>
				<option>07宜蘭縣</option>				
				<option>08台北縣</option>
				<option>09台北市</option>
				<option>10桃園縣</option>
				<option>11苗栗縣</option>
				<option>13南投縣</option>
				<option>14彰化縣</option>
				<option>15雲林縣</option>
				<option>16嘉義縣</option>
				<option>18屏東縣</option>
				<option>19台東縣</option>
				<option>20花蓮縣</option>
		</select>
	 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
    <!--  <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">-->
     <!-- <input type="submit" name="submit">-->
    </fieldset>
  </form>
</div>

<div id="edit-list" title="Edit Your Works" style="display:none;" >
 
    <fieldset>
     <?php	/*呈現選項*/					
			function showTheme($row){
				$time = htmlspecialchars($row['madetime']);
				$title = htmlspecialchars($row['title']);
				$id = htmlspecialchars($row['id']);						
				echo "<div class=\"item\" onclick=\"select(".$id.")\">";
				echo "<div style=\"width:50%;\" class=\"word\">".$title."</div>";
				echo "<div style=\"width:30%;\" class=\"word\">".$time."</div></div>";
			}
			if(isset($_SESSION['accountID']) && $_SESSION['accountID']!=null){
					$acc = mysql_real_escape_string($_SESSION['accountID']);
				$sql = "SELECT title,madetime,id from tripplan WHERE account='$acc' ORDER BY madetime DESC";
				$result = mysql_query($sql);
				$num=0;
				while($row = mysql_fetch_array($result)){
					showTheme($row);
					$num++;
				}
				if($num==0) echo "<div class=\"item\" onclick='goTo(6)' style='cursor:hand'><div class='middle' style='width:100%;'>No trip plan now.</div></div>";
			}
			else{
				echo "<div class=\"item\" onclick=\"goTo(0)\">No trip plan available;</div>";
				echo "<script>showAlert(0)</script>";
			}
		?>
    </fieldset>
  
</div>


<div id="collection-list" title="Edit Collection" style="display:none;" >
 
    <fieldset>
     <?php	/*呈現選項*/					
			function showList($row){			
				
				$id = htmlspecialchars($row['tripplan']);	
				$sq = "SELECT map, title from tripplan WHERE id='$id'";
				$res = mysql_query($sq);			
				while($row = mysql_fetch_array($res)){
					$pic = 'upload/map/'.$row['map'];
					$title = $row['title'];
				}
				echo "<div class=\"item\" style='overflow:hidden;position:relative;width:100%;height:50%;'onclick=\"select1(".$id.")\">";
				echo "<div style=\"width:100%;height:10%;position:relative;top:0%;left:10%\" class=\"word\">".$title."</div>";
				echo "<div style=\"width:100%;height:90%;position:relative;top:20%left:10%;\" class=\"word\"><img width=\"100%;\"src='".$pic."'></img></div></div>";
			}
			if(isset($_SESSION['accountID']) && $_SESSION['accountID']!=null){
				$acc = mysql_real_escape_string($_SESSION['accountID']);
				$sql = "SELECT tripplan, time from collection WHERE account='$acc' ORDER BY time DESC";
				$result = mysql_query($sql);
				$num=0;
				while($row = mysql_fetch_array($result)){
					showList($row);
					$num++;
				}
				if($num==0) echo "<div class=\"item\" onclick='goTo(6)' style='cursor:hand'><div class='middle' style='width:100%;'>No trip plan now.</div></div>";
			}
			else{
				echo "<div class=\"item\" onclick=\"goTo(0)\">No collection available;</div>";
				echo "<script>showAlert(0)</script>";
			}
		?>
    </fieldset>
  
</div>
<script>
function select(id){
	window.location.href = "edit.php?map="+id;
}
function select1(id){
	window.location.href = "tempedit.php?map="+id;
}
</script>
</body>




</html>