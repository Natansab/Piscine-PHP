var id_count = 5;

function newElem() {
	var text_elem = prompt("Quoi de prevu ajd ?");
	var ftlist_elem = document.getElementById('ft_list');
	if (text_elem == null)
	 	return ;
	var div_elem = document.createElement('div');
	div_elem.innerHTML = "<span onclick='delElem(" + id_count + ")'>" + text_elem + "</span>";
	div_elem.id = id_count;
	id_count++;

	ftlist_elem.insertBefore(div_elem, ftlist_elem.children[3]);
	console.log(text_elem);
}

// function delElem(id_elem) {
// 	if (confirm("Sur de voitre choix ?")) {
// 		var elem = document.getElementById(id_elem);
// 		elem.parentNode.removeChild(elem);
// 	}
//
// }
//
// function createCookie(name,value,days) {
// 	if (days) {
// 		var date = new Date();
// 		date.setTime(date.getTime()+(days*24*60*60*1000));
// 		var expires = "; expires="+date.toGMTString();
// 	}
// 	else var expires = "";
// 	document.cookie = name+"="+value+expires+"; path=/";
// }
//
//
// function readCookie(name) {
// 	var nameEQ = name + "=";
// 	var ca = document.cookie.split(';');
// 	for(var i=0;i < ca.length;i++) {
// 		var c = ca[i];
// 		while (c.charAt(0)==' ')
// 			c = c.substring(1,c.length);
// 		if (c.indexOf(nameEQ) == 0)
// 			return c.substring(nameEQ.length,c.length);
// 	}
// 	return null;
// }
//
//
// createCookie("elem1","shopping",100);
// console.log(readCookie("elem1"));
