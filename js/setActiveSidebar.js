function setActive() {
    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/')+1);
    var id = filename.replace(/\.[^/.]+$/, ""); // rimuove l'estensione
    if (id == "" && url == "/cinemaker/")
        id = "index";
    var activeItem = document.getElementById(id);
    if (activeItem)
        activeItem.className += ' active';
    else 
        return;
}

setActive();