




var last;
var ifval = false;
var ifsearch = false;
var kolvq = 0;
var chek = true;
function readCookie(name) {
	var name_cook = name+"=";
	var spl = document.cookie.split(";");
	for(var i=0; i<spl.length; i++) {
		var c = spl[i];
		while(c.charAt(0) == " ") {
			c = c.substring(1, c.length);
		}
		if(c.indexOf(name_cook) == 0) {
			return c.substring(name_cook.length, c.length);
		}
	}
	return null;
};

var id = readCookie('id');
var element1;
var item = window.location.search.replace( '?', ''); 
var item = item.split("=");
var item = item[1];
function feed(){
	kolvq = 0;
	ifval = true;
	var radios = document.getElementsByName('radios');
	for (var i = 0, length = radios.length; i < length; i++) {
	  if (radios[i].checked) {
		var radiosres = radios[i].value;
		break;
	  }
	}
	var hash = document.getElementById('hash').value;
	var firm = document.getElementById('firm').value;
	$.post("search/search.php", { hash:hash,firm:firm,radiores:radiosres,kolvq:kolvq } ).done(function(data) {
		console.log(data);
		var wid = document.documentElement.clientWidth;
		$.post("gethtmlfeed.php", { array: data , wid:wid }).done(function(data) {
			data = data.split("&&&&");
			document.getElementById("feed").innerHTML=data[0];
			element1 = data[1];
			last = data[2];
		});
	});
}
function getvalues(){
	$.post("getvalues.php", {  }).done(function(data) {
		data = data.split("&&&&");
		document.getElementById("hash").innerHTML=data[0];
		document.getElementById("firm").innerHTML=data[1];
	});
}
getvalues();





if(item === undefined){
	$.post("popularq.php", { id: id }  ).done(function(data) {
		if(data>50){
			
		}else{
			kolvq = 0;
			$.post("popularfeed.php", { id: id ,kolvq:kolvq} ).done(function(data) {
				var wid = document.documentElement.clientWidth;
				console.log(data);
				$.post("gethtmlfeed.php", { array: data , wid:wid }).done(function(data) {
					
					data = data.split("&&&&");
					document.getElementById("feed").innerHTML=data[0];
					element1 = data[1];
					console.log(data[2]);
					last = data[2];
				});
			});
		}
	});
}else{
	ifsearch = true;
	kolvq = 0;
			item = decodeURI(item);
			$.post("search/search.php", { id: id,search:item,kolvq:kolvq } ).done(function(data) {
				var wid = document.documentElement.clientWidth;
				$.post("gethtmlfeed.php", { array: data , wid:wid }).done(function(data) {
					data = data.split("&&&&");
					document.getElementById("feed").innerHTML=data[0];
					element1 = data[1];
					
					last = data[2];
				});
			});
}
function search(){
	var search = document.getElementById("search").value;
	location.href = "../main/index.php?item="+search;
}
function getOffsetRect(elem) {
if(chek){
	chek = false;
	setInterval(function() {
	  chek = true;
	}, 300);
	elem = String(elem);
	elem = elem.replace(/\s+/g, '');
	elem = document.getElementById(elem);

    // (1)
    var box = elem.getBoundingClientRect()

    // (2)
    var body = document.body
    var docElem = document.documentElement

    // (3)
    var scrollTop = window.pageYOffset || docElem.scrollTop || body.scrollTop
    var scrollLeft = window.pageXOffset || docElem.scrollLeft || body.scrollLeft

    // (4)
    var clientTop = docElem.clientTop || body.clientTop || 0
    var clientLeft = docElem.clientLeft || body.clientLeft || 0

    // (5)
    var top  = box.top +  scrollTop - clientTop
    var left = box.left + scrollLeft - clientLeft
	 var bottom =  window.pageYOffset + document.documentElement.clientHeight
    if(bottom > top ){
		if(ifval){
			var radios = document.getElementsByName('radios');
			for (var i = 0, length = radios.length; i < length; i++) {
			  if (radios[i].checked) {
				var radiosres = radios[i].value;
				break;
			  }
			}
			var hash = document.getElementById('hash').value;
			var firm = document.getElementById('firm').value;
			kolvq = kolvq + 1;
			$.post("search/search.php", { hash:hash,firm:firm,radiores:radiosres,kolvq:kolvq } ).done(function(data) {
				var wid = document.documentElement.clientWidth;
				$.post("gethtmlfeed.php", { array: data , wid:wid, last:last }).done(function(data) {
					data = data.split("&&&&");
					document.getElementById("feed").innerHTML=data[0];
					element1 = data[1];
					last = data[2];
				});
			});
		}else{
			if(ifsearch){
				kolvq = kolvq + 1;
				item = decodeURI(item);
			$.post("search/search.php", { id: id,search:item,kolvq:kolvq } ).done(function(data) {
				var wid = document.documentElement.clientWidth;
				$.post("gethtmlfeed.php", { array: data , wid:wid }).done(function(data) {
					data = data.split("&&&&");
					document.getElementById("feed").innerHTML=data[0];
					element1 = data[1];
					
					last = data[2];
				});
			});
				
				
				
				
				
			}else{
			kolvq = kolvq + 1;
			$.post("popularfeed.php", { id: id ,element1:element1,kolvq:kolvq} ).done(function(data) {
				console.log(data);
				var wid = document.documentElement.clientWidth;
				
				$.post("gethtmlfeed.php", { array: data , wid:wid , last:last }).done(function(data) {
					data = data.split("&&&&");
					document.getElementById("feed").innerHTML = document.getElementById("feed").innerHTML+data[0];
					element1 = data[1];
					last = data[2];
				});
			});
			}
		}
	}
}
}
window.addEventListener('scroll', function() {
   getOffsetRect(element1);
});

// Запускаем функцию при прокрутке страницы



