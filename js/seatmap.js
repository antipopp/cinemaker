var seatmap = document.getElementById('seatmap');
var screening = document.getElementById('screening_id').value;
loadHall(screening);

function makeMap(nRow, nCol, letter, blocked) {
    for (var i = 0; i < nRow; i++) {
        var row = document.createElement('div');
        row.classList.add('seats');
        seatmap.appendChild(row);
        for (var j = 0; j < nCol; j++) {
            var seatsRow = document.getElementsByClassName('seats');
            var seat = document.createElement('input');
            seat.setAttribute('type', 'checkbox');
            seat.setAttribute('name', 'seats[]');
            seat.setAttribute('value', j+1+nextChar(letter));
            var isBlocked = blocked.indexOf(j+1+nextChar(letter));
            if (isBlocked != -1) {
                seat.setAttribute('disabled', ''); 
            }
            seatsRow[i].appendChild(seat);
        }
        letter = nextChar(letter);
    }
    
    var sendBtn = document.createElement('button');
    sendBtn.setAttribute('type', 'submit');
    sendBtn.setAttribute('name', 'book');
    sendBtn.textContent = 'PRENOTA';
    seatmap.appendChild(sendBtn);
}

function loadHall(screening) {  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                var hall = JSON.parse(this.responseText);
                var nRow = hall.rows;
                var nCol = hall.cols;
                var blocked = hall.blocked;
                var letter = '@';
                makeMap(nRow, nCol, letter, blocked);
            }
        }
    }
    xhttp.open("GET", "../php/seatmap.php?screening="+screening, true);
    xhttp.send();
};

function nextChar(c) {
    return String.fromCharCode(c.charCodeAt(0) + 1);
}