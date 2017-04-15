id_count = (getCookie("elem_nb") == "") ? 0 : parseInt(getCookie("elem_nb"));

// Duree du cookie
var d = new Date();
d.setTime(d.getTime() + (10*24*60*60*1000));
var expires = "expires="+ d.toUTCString();

function newElem() {

	var text_elem = prompt("Quoi de prevu ajd ?");
	if (text_elem == null)
	 	return ;
	var div_elem = document.createElement('div');
	var ftlist_elem = document.getElementById('ft_list');
	div_elem.innerHTML = "<span onclick='delElem(" + id_count + ")'>" + text_elem + "</span>";
	div_elem.id = id_count;
	createCookie(id_count, text_elem, expires);
	createCookie("elem_nb", id_count, expires);
	id_count++;
	ftlist_elem.insertBefore(div_elem, ftlist_elem.children[3]);
}

function delElem(id_elem) {
	if (confirm("Sur de voitre choix ?")) {
		var elem = document.getElementById(id_elem);
		elem.parentNode.removeChild(elem);
		createCookie(id_elem, "", 0);
	}
}

function createCookie(name,value,expires) {
	document.cookie = name + "=" + value + ";" + expires;
}

window.addEventListener('load', function() {
	for(i = 0; i <= id_count; i++) {

		var text_elem = getCookie(i);
		if (text_elem != "") {
		console.log(i + "  " + text_elem);
		var div_elem = document.createElement('div');
		var ftlist_elem = document.getElementById('ft_list');
		div_elem.innerHTML = "<span onclick='delElem(" + i + ")'>" + text_elem + "</span>";
		div_elem.id = i;
		ftlist_elem.insertBefore(div_elem, ftlist_elem.children[3]);
		}
	}
});

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
