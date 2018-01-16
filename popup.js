function showPopup(event) {
    event.preventDefault();
    document.getElementById('popup').style.display = 'block';
}

function showPopupNots(event) {
    event.preventDefault();
    document.getElementById('popup_nots').style.display = 'block';
}

function showPopup2(event) {
    event.preventDefault();
    document.getElementById('popup2').style.display = 'block';
}
function showPopup3(event, number) {
    event.preventDefault();
    document.getElementById('popup'+number).style.display = 'block';
}

function showPopup4(event) {
    event.preventDefault();
    document.getElementById('popup4').style.display = 'block';
}
function showPopupAdd(event) {
    event.preventDefault();
    document.getElementById('popup_add').style.display = 'block';
}

document.querySelector('#popup_add .close').onclick = function (event) {
    event.preventDefault();
    document.getElementById('popup_add').style.display = 'none';
}
document.querySelector('#popup .close').onclick = function (event) {
    event.preventDefault();
    document.getElementById('popup').style.display = 'none';
}

document.querySelector('#popup2 .close').onclick = function (event) {
    event.preventDefault();
    document.getElementById('popup2').style.display = 'none';
}

document.querySelector('#popup3 .close').onclick = function (event) {
    event.preventDefault();
    document.getElementById('popup3').style.display = 'none';
}

document.querySelector('#popup4 .close').onclick = function (event) {
    event.preventDefault();
    document.getElementById('popup4').style.display = 'none';
}

document.querySelector('#popup_nots .close').onclick = function (event) {
    event.preventDefault();
    document.getElementById('popup_nots').style.display = 'none';
}

function hidePopup(event) {
    event.preventDefault();
    document.getElementById('popup').style.display = 'none';
}

function hidePopup2(event) {
    event.preventDefault();
    document.getElementById('popup2').style.display = 'none';
}