


var btnAttack = document.getElementById('btn-attack');
var btnAttack1 = document.getElementById('btn-attack1');
var btnPkmn = document.getElementById('btn-pkmn');
var btnPkmn1 = document.getElementById('btn-pkmn1');
var btnPkmn2 = document.getElementById('btn-pkmn2');
var btnQuit = document.getElementById('btn-quit');
var btnBack1 = document.getElementById('btn-back1');
var btnBack2 = document.getElementById('btn-back2');
var btnBack3 = document.getElementById('btn-back3');

var menuArena1 = document.getElementById('menu-arena-1');
var menuArena2 = document.getElementById('menu-arena-2');
var menuArena3 = document.getElementById('menu-arena-3');
var menuArena4 = document.getElementById('menu-arena-4');

var pkmn1 = document.getElementById('menu-arena-1');
var pkmn2 = document.getElementById('menu-arena-2');





var popUP = document.getElementById('popup');


btnAttack.addEventListener("click", function () {
    menuArena1.classList.add('d-none');
    menuArena2.classList.remove('d-none');

}); 

btnBack1.addEventListener("click", function () {
    menuArena2.classList.add('d-none');
    menuArena1.classList.remove('d-none');
}); 


btnPkmn.addEventListener("click", function () {
    menuArena1.classList.add('d-none');
    menuArena3.classList.remove('d-none');
}); 

btnBack2.addEventListener("click", function () {
    menuArena3.classList.add('d-none');
    menuArena1.classList.remove('d-none');
    
}); 

btnQuit.addEventListener("click", function () {
    menuArena1.classList.add('d-none');
    menuArena4.classList.remove('d-none');
}); 

btnBack3.addEventListener("click", function () {
    menuArena4.classList.add('d-none');
    menuArena1.classList.remove('d-none');
}); 

btnAttack1.addEventListener("click", function () {
    menuArena1.classList.add('d-none');
    menuArena2.classList.add('d-none');
    menuArena3.classList.add('d-none');
    menuArena4.classList.add('d-none');

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector('#test').innerHTML = this.responseText;
    };
    xhttp.open("GET", "send_request_ajax.php?action=attack1", true);
    xhttp.send();
}); 


btnPkmn1.addEventListener("click", function () {
    menuArena1.classList.add('d-none');
    menuArena2.classList.add('d-none');
    menuArena3.classList.add('d-none');
    menuArena4.classList.add('d-none');


    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector('#test').innerHTML = this.responseText;
    };
    xhttp.open("GET", "send_request_ajax.php?action=pkmn1", true);
    xhttp.send();
}); 

btnPkmn2.addEventListener("click", function () {
    menuArena1.classList.add('d-none');
    menuArena2.classList.add('d-none');
    menuArena3.classList.add('d-none');
    menuArena4.classList.add('d-none');


    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector('#test').innerHTML = this.responseText;
    };
    xhttp.open("GET", "send_request_ajax.php?action=pkmn2", true);
    xhttp.send();
}); 