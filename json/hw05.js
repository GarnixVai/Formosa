var flower = [{"景點":"雪霸休閒農場","花季":"1月,2月,3月,4月,5月,6月,7月,8月,9月,11月,12月","地點":"新竹縣五峰鄉","特色花":"梨花展顏"},{"景點":"衡山村茶亭古道","花季":"1月,4月,5月,11月,12月","地點":"新竹縣橫山鄉","特色花":"桐花雪"},{"景點":"五指山","花季":"2月,3月,4月,5月","地點":"新竹縣橫山鄉","特色花":"浪漫桐花小徑"},{"景點":"觀霧國家國家公園","花季":"2月,3月,4月,5月,9月,11月,12月","地點":"新竹縣五峰鄉","特色花":"杜鵑花季"},{"景點":"新竹十八尖山","花季":"3月,4月,5月,8月,9月","地點":"新竹市","特色花":"賞花月"},{"景點":"三民公園","花季":"3月,4月,5月","地點":"新竹市","特色花":"艷麗木棉道"},{"景點":"風城賞椿","花季":"1月,2月,12月","地點":"新竹市","特色花":"新竹茶花季"}];
var shop = [{"景點":"花花屋花坊","聯絡電話":"03 559 2531","地點":"新竹縣湖口鄉新興路356號","部落格":"https://www.greenidea.com.tw"},{"景點":"菩提園藝材料行","聯絡電話":"03 551 3691","地點":"新竹縣竹北市福德街73號","部落格":"https://j122603497.pixnet.net"},{"景點":"綠點子花藝生活館","聯絡電話":"03 559 2531","地點":"新竹縣湖口鄉新興路356號","部落格":"https://www.greenidea.com.tw"},{"景點":"吉祥創藝花坊","聯絡電話":"03 595 1088","地點":"新竹縣竹東鎮東峰路112號","部落格":"https://plus.google.com/108737853144722068885/about"},{"景點":"濱江花市竹北店","聯絡電話":"03 558 4499","地點":"新竹縣竹北市縣政九路","部落格":"https://035584499.blogspot.com"},{"景點":"芙蘿拉時尚花苑","聯絡電話":"03 667 6631","地點":"新竹縣竹北市成功三路21號","部落格":"https://plus.google.com/117868144320670733635/about?gl=tw&hl=zh-TW"},{"景點":"東林花店","聯絡電話":"03 594 2988","地點":"新竹縣竹東鎮東峰路89號","部落格":"https://t212.tftd.org.tw"}];
var bus = [{"路線名稱":"1路火車站-竹中","編號":"1","站名":"火車站","地址":"新竹市民族路16號"},{"路線名稱":"1路火車站-竹中","編號":"2","站名":"東門市場","地址":"新竹市中正路84號"},{"路線名稱":"1路火車站-竹中","編號":"3","站名":"親仁里","地址":"新竹市中央路１４３號"},{"路線名稱":"1路火車站-竹中","編號":"4","站名":"東門國小","地址":"新竹市東大路10號"},{"路線名稱":"1路火車站-竹中","編號":"5","站名":"公園","地址":"新竹市公園路公園大門"},{"路線名稱":"1路火車站-竹中","編號":"6","站名":"學園商場","地址":"新竹市東山街與食品街交叉口"},{"路線名稱":"1路火車站-竹中","編號":"7","站名":"東山文教院","地址":"新竹市東山街64號"},{"路線名稱":"1路火車站-竹中","編號":"8","站名":"新竹高中","地址":"新竹市學府路36號新竹高中大門邊(改為候車亭)"},{"路線名稱":"1路火車站-竹中","編號":"9","站名":"新竹高商","地址":"新竹市學府路３０９號"},{"路線名稱":"1路火車站-竹中","編號":"10","站名":"水源地","地址":"新竹市學府路365號"},{"路線名稱":"1路火車站-竹中","編號":"11","站名":"學府路口","地址":"新竹市學府路393 - 1號(改為候車亭)"},{"路線名稱":"1路火車站-竹中","編號":"12","站名":"工研院光復院區","地址":"新竹市光復路二段３２１號(改為候車亭)"},{"路線名稱":"1路火車站-竹中","編號":"13","站名":"馬偕醫院","地址":"新竹市光復路二段257號"},{"路線名稱":"1路火車站-竹中","編號":"14","站名":"海軍新村","地址":"新竹市光復路二段163號"},{"路線名稱":"1路火車站-竹中","編號":"15","站名":"光復中學","地址":"新竹市光復路二段１５３號(改為候車亭)"},{"路線名稱":"1路火車站-竹中","編號":"16","站名":"清華大學","地址":"新竹市光復路二段354號"},{"路線名稱":"1路火車站-竹中","編號":"17","站名":"金城新村口","地址":"新竹市光復路二段182號"},{"路線名稱":"1路火車站-竹中","編號":"18","站名":"過溝","地址":"新竹市光復路二段66號"},{"路線名稱":"1路火車站-竹中","編號":"19","站名":"科學園區","地址":"新竹市光復路一段台電變電所對面"},{"路線名稱":"1路火車站-竹中","編號":"20","站名":"和平","地址":"新竹市光復路一段６５９號"},{"路線名稱":"1路火車站-竹中","編號":"21","站名":"光武國中","地址":"新竹市光復路一段５７１號"},{"路線名稱":"1路火車站-竹中","編號":"22","站名":"科學園區別墅","地址":"新竹市光復路一段５０５號"},{"路線名稱":"1路火車站-竹中","編號":"23","站名":"日光燈","地址":"新竹市光復路一段421號"},{"路線名稱":"1路火車站-竹中","編號":"24","站名":"仙水","地址":"新竹市光復路一段３２７號"},{"路線名稱":"1路火車站-竹中","編號":"25","站名":"世界高中","地址":"新竹市光復路一段２５５號"},{"路線名稱":"1路火車站-竹中","編號":"26","站名":"關東橋","地址":"新竹市光復路一段１３９巷"},{"路線名稱":"1路火車站-竹中","編號":"27","站名":"關東新村","地址":"新竹市光復路一段33號"},{"路線名稱":"1路火車站-竹中","編號":"28","站名":"竹中口","地址":"新竹市竹中路３８號"},{"路線名稱":"1路火車站-竹中","編號":"29","站名":"竹中","地址":"新竹市竹中路135號"}];
var season = [{"1":"櫻花、茶花、香水垂梅、鬱金香","2":"櫻花、李花、鬱金香","3":"小葉楓、杜鵑","4":"小葉楓、梨花、牡丹花、玫瑰","5":"玫瑰、繡球花、西施花、愛情花","6":"玫瑰、繡球花、西施花、愛情花","7":"玫瑰","8":"鳳仙花","9":"鳳仙花","10":"","11":"楓葉","12":"楓葉、茶花"},{"1":"大波斯菊、向日葵","2":"","3":"","4":"桐花","5":"桐花","6":"","7":"","8":"","9":"","10":"","11":"大波斯菊、向日葵","12":"大波斯菊、向日葵"},{"1":"","2":"櫻花","3":"櫻花","4":"桐花","5":"桐花","6":"","7":"","8":"","9":"","10":"","11":"","12":""},{"1":"","2":"櫻花","3":"櫻花","4":"杜鵑","5":"杜鵑","6":"","7":"","8":"鳳仙花","9":"鳳仙花","10":"","11":"楓葉","12":"楓葉"},{"1":"","2":"","3":"杜鵑、情人菊、玫瑰、鳳仙花、繡球花","4":"杜鵑","5":"杜鵑","6":"","7":"","8":"鼠尾草、繡球花","9":"鼠尾草、繡球花","10":"鼠尾草、大波斯菊","11":"茶花","12":"茶花"},{"1":"","2":"羊蹄甲","3":"羊蹄甲、木棉花","4":"羊蹄甲、木棉花","5":"刺桐花","6":"","7":"","8":"","9":"","10":"","11":"","12":""},{"1":"茶花","2":"茶花","3":"","4":"","5":"","6":"","7":"","8":"","9":"","10":"","11":"","12":"茶花"}];
var icon = [{"櫻花":"1","茶花":"2","香水垂梅":"3","鬱金香":"4","李花":"5","小葉楓":"6","杜鵑":"7","梨花":"8","牡丹花":"9","玫瑰":"10","繡球花":"11","西施花":"12","愛情花":"13","鳳仙花":"14","楓葉":"15","向日葵":"16","桐花":"17","情人菊":"18","大波斯菊":"19","鼠尾草":"20","羊蹄甲":"21","刺桐花":"22","木棉花":"23"}];

var sites = [
	new google.maps.LatLng(24.31390, 121.06258),
	new google.maps.LatLng(24.709383, 121.145348),
	new google.maps.LatLng(24.641873, 121.092523),
	new google.maps.LatLng(24.516124,121.119032),
	new google.maps.LatLng(24.792534,120.984595),
	new google.maps.LatLng(24.82234,120.985222),
	new google.maps.LatLng(24.809486,120.959644),
	
	new google.maps.LatLng(24.835347, 121.007797),
	new google.maps.LatLng(24.835320, 121.009420),
	new google.maps.LatLng(24.873509, 121.000888),
	new google.maps.LatLng(24.820079, 121.022517),
	new google.maps.LatLng(24.824753, 121.008269),
	new google.maps.LatLng(24.819924, 121.022603),
	new google.maps.LatLng(24.721571, 121.097533),	
]; 
var pathSites = [
	new google.maps.LatLng(24.803265, 120.97204099999999), new google.maps.LatLng(24.805287, 120.96999700000003),	
	new google.maps.LatLng(24.807678, 120.97148600000003),	new google.maps.LatLng(24.8039584, 120.97668210000006),	
	new google.maps.LatLng(24.8034357, 120.97998710000002),	new google.maps.LatLng(24.7974547, 120.97891119999997),	
	new google.maps.LatLng(24.7971981, 120.97924590000002),	new google.maps.LatLng(24.7952718, 120.98049519999995),	
	new google.maps.LatLng(24.7968041, 120.98395989999995),	new google.maps.LatLng(24.7986694, 120.9860023),	
	new google.maps.LatLng(24.8001929, 120.98657709999998),	new google.maps.LatLng(24.8006579, 120.98770590000004),	
	new google.maps.LatLng(24.800078, 120.990650),	new google.maps.LatLng(24.7991719, 120.99240800000007),	
	new google.maps.LatLng(24.7983869, 120.99405639999998),	new google.maps.LatLng(24.7964255, 120.99767010000005),	
	new google.maps.LatLng(24.7938891, 121.00085999999999),	new google.maps.LatLng(24.7920627, 121.00332700000001),	
	new google.maps.LatLng(24.788649, 121.008128),	new google.maps.LatLng(24.7870271, 121.01013319999993),	
	new google.maps.LatLng(24.7892382, 121.00723040000003),	new google.maps.LatLng(24.7863155, 121.01119670000003),	
	new google.maps.LatLng(24.783694, 121.01588500000003),	new google.maps.LatLng(24.782569, 121.01848700000005),	
	new google.maps.LatLng(24.78197, 121.02006499999993),	new google.maps.LatLng(24.78096, 121.02250960000003),	
	new google.maps.LatLng(24.781035, 121.025485),	new google.maps.LatLng(24.780717, 121.02851199999998),	
	new google.maps.LatLng(24.7812687, 121.03041510000003),	
];
var markers = [], infowindow, num = [],size = [7,7,29];
var infowindow = new google.maps.InfoWindow();
var geocoder = new google.maps.Geocoder();
var iterator = 0, exist = [0,0,0], accu, path,now=0;
var map;
var jsonArray0=[];
var jsonArray=[];
var jsonString;
var jsonSize;
var indexx=0;

function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(24.700759,121.03317),
		zoom: 11,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
}

$.getJSON('document.json', function(data) {
	jsonArray0=data;
	jsonSize = jsonArray0.length;
	for(var i=0;i<jsonSize;i++){		
		if(jsonArray0[i]['Add'])setTimeout("addressToLatlng("+i+");", i*1500);
			/*jsonArray[i]=jsonArray0[i];
			console.log(i);
			if(jsonArray0[i]['file'] && jsonArray0[i]['file']['img'] && jsonArray0[i]['file']['img'][0]) jsonArray[i]['Picture1']=jsonArray0[i]['file']['img'][0]['__text'];
			else jsonArray[i]['Picture1']="";
			if(jsonArray0[i]['xBody']) jsonArray[i]['Toldescribe']=jsonArray0[i]['xBody'];
			else jsonArray[i]['Toldescribe']="";
			if(!jsonArray0[i]['Tel']) jsonArray[i]['Tel']="";
				if(jsonArray0[i]['Add'].indexOf("嘉義縣")!=-1){
			jsonArray[indexx]=jsonArray0[i];
				//jsonArray[indexx]['Picture1']="";
				indexx++;
				}*/				
	}
 }).fail( function(data, textStatus, error) {
        console.error("getJSON failed, status: " + textStatus + ", error: "+error)
    });;
function addressToLatlng(i){
	geocoder.geocode(
		{'address': jsonArray0[i]['Add']} ,
		function(results, status){ /* 查詢完成時執行的函式 */
			if(status == google.maps.GeocoderStatus.OK) {
				jsonArray[indexx]=jsonArray0[i];
				jsonArray[indexx]['Py']=results[0].geometry.location.lat();
				jsonArray[indexx]['Px']=results[0].geometry.location.lng();
				indexx++;
				/*pathSites.push(results[0].geometry.location);  */   
					console.log(i+":   "+results[0].geometry.location.lat()+", "+results[0].geometry.location.lng());
					if(i==jsonSize-1){
						var inform =  document.getElementById('json');
						jsonString = JSON.stringify(jsonArray);
						inform.innerText=jsonString;
					}
			}
			else {
				//alert('Geocode was not successful for the following reason: ' + status+"("+i+")address="+jsonArray[i]['Add']);
					if(i==jsonSize-1){
						var inform =  document.getElementById('json');
						jsonString = JSON.stringify(jsonArray);
						inform.innerText=jsonString;
					}
			}
		}
	);
}

function dropdrop(type){
	if(exist[type]==1){
		document.getElementById("f"+type).style.transform="rotateX(0deg)";
		document.getElementById("b"+type).style.transform="rotateX(180deg)";
		var seasonWindow=document.getElementById("season").style.display="none";
		clearMarker(type); exist[type]=0; return;
	}
	else{exist[type]=1;}

	if(type==0) iterator=0;
	else if(type==1) iterator=7;
	else iterator=14;
	
	for(var i=0;i<size[type];i++){
		accu=0;
		setTimeout("addMarker("+type+");", i*100);
	}
}

function clearMarker(type){
	for(var i=0;i<markers.length;i++){
		if((type==0&&num[i]>=size[0])||(type==1&&(num[i]<size[0]||num[i]>=size[0]+size[1]))||(type==2&&num[i]<size[0]+size[1])){
			continue;	
		}
		else{markers[i].setMap(null);}
	}
	if(type==2) path.setMap(null);
}

function addMarker(type){
	var icon,title;
	switch(type){
		case 0:
			icon='./pics/map/flower.gif';
			title=flower[iterator]['景點'];
			break;
		case 1:
			icon='./pics/map/shop.gif';
			title=shop[iterator-size[0]]['景點'];
			break;
		case 2:
			icon='./pics/map/bus.gif';
			title=bus[iterator-size[0]-size[1]]['站名'];
			break;
	}
	var index=markers.push(
		new google.maps.Marker({
			position: (type==2?pathSites[iterator-size[0]-size[1]]:sites[iterator]),
			map: map, /* 丟到哪張地圖上 */
			draggable: false, /* 可否拖放 */
			animation: google.maps.Animation.DROP, /* 動畫設定 */
			icon: icon, /* 可以自訂 marker 圖案 */
			title: title
		})
	);
	iterator++;	accu++;
	if(accu==size[type]){
		document.getElementById("f"+type).style.transform="rotateX(180deg)";
		document.getElementById("b"+type).style.transform="rotateX(0deg)";
		if(type==2){
			if(path){path.setMap(map);}
			else{
				path = new google.maps.Polyline({
					path: pathSites,
					strokeColor: "#FF0000",
					strokeOpacity: 1.0,
					strokeWeight: 2
				});
				path.setMap(map);
			}
		}
	}
	num[index-1]=iterator-1;
	google.maps.event.addListener(markers[index-1], 'click', function() {
         ShowInfo(map , markers[index-1], num[index-1]);   
    });
}

function ShowInfo(mapObj , markerObj, num){//開啟資訊視窗  
   if (infowindow){
	   infowindow.close();
	   var seasonWindow=document.getElementById("season").style.display="none";
	}
   infowindow = new google.maps.InfoWindow({maxWidth:350});
   infowindow.setContent(InfoContent(markerObj, num));
   infowindow.open(mapObj,markerObj);   
}

function InfoContent(markerObj,num){//設定資訊視窗內容要呈現什麼 
	var html;
	if(num<size[0]){
		now=num;
		html = "<div style=\"height:240; width:300; background-image:url(./pics/map/view"+num+".jpg);\"></div>";
		html += "<div style=\"font-size: 20;\"><span style=\"color: #CCA253;\">" + flower[num]['特色花'] + "</span></div>";
		html += "<div style=\"font-size: 20;\"><span style=\"color: black;\">" + flower[num]['地點']+" "+markerObj.title + "</span></div>";
		html += "<div style=\"font-size: 20;\">花季：<span style=\"color: black;\">" + flower[num]['花季'] + "</span></div>";
		var seasonWindow=document.getElementById("season");
		var seasonSel=document.getElementById("seasonSel");
		var month=document.getElementById("month");
		seasonWindow.style.display="block";
		seasonSel.value="4";
		month.innerText="4月";
		var arr=season[num]['4'].split("、");
		for(var i=0;i<4;i++){
			if(i<arr.length){
				document.getElementById("t"+i).innerText=arr[i];
				if(arr[i]!="")document.getElementById("s"+i).innerHTML="<img height=\"70px\" src=\"./pics/map/ic"+icon[0][arr[i]]+".gif\">";
				else document.getElementById("s"+i).innerHTML="<img height=\"70px\" src=\"./pics/map/none.gif\">";
			}
			else{
				document.getElementById("t"+i).innerText="";
				document.getElementById("s"+i).innerHTML="<img height=\"70px\" src=\"./pics/map/none.gif\">";
			}
		}
	}
	else if(num<size[0]+size[1]){
		html = "<div style=\"height:240; width:300; background-image:url(./pics/map/view"+num+".jpg);\"></div>";
		html += "<div style=\"font-size: 20;\"><span style=\"color: #CCA253;\">" + shop[num-size[0]]['景點'] + "</span></div>";
		html += "<div style=\"font-size: 20;\"><span style=\"color: black;\">" + shop[num-size[0]]['地點']+"</span></div>";
		html += "<div style=\"font-size: 20;\">電話：<span style=\"color: blue;\">" + shop[num-size[0]]['聯絡電話'] + "</span></div>";
		html += "<div style=\"font-size: 20;\">BLOG：<span style=\"color: blue;\">" + shop[num-size[0]]['部落格'] + "</span></div>";
	}
	else{
		html = "<div style=\"font-size: 20;\"><span style=\"color: #CCA253;\">" + bus[num-size[0]-size[1]]['站名'] + "</span></div>";
		html += "<div style=\"font-size: 20;\"><span style=\"color: black;\">" + bus[num-size[0]-size[1]]['地址'] + "</span></div>";
		html += "<div style=\"font-size: 20;\">編號：<span style=\"color: blue;\">" + bus[num-size[0]-size[1]]['編號'] + "</span></div>";
	}
	return html;
}

function updateSeason(s){
	document.getElementById("month").innerText=s+"月";
	var arr=season[now][s].split("、");
	for(var i=0;i<4;i++){
		if(i<arr.length){
			document.getElementById("t"+i).innerText=arr[i];
			if(arr[i]!="")document.getElementById("s"+i).innerHTML="<img height=\"70px\" src=\"./pics/map/ic"+icon[0][arr[i]]+".gif\">";
			else document.getElementById("s"+i).innerHTML="<img height=\"70px\" src=\"./pics/map/none.gif\">";
		}
		else{
			document.getElementById("t"+i).innerText="";
			document.getElementById("s"+i).innerHTML="<img height=\"70px\" src=\"./pics/map/none.gif\">";
		}
	}
}