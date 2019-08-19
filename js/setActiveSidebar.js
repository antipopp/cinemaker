var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);
var id = filename.replace(/\.[^/.]+$/, ""); // rimuove l'estensione
var activeItem = document.getElementById(id);
activeItem.className += ' active';