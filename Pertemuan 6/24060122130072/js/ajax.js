function getXMLHttpRequest() {
    if (window.XMLHttpRequest) {
        //code for modern browser
        return new XMLHttpRequest();
    } else {
        //code for old IE browser
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}


function callAjaxPost(url, inner, data) {
    let xmlhttp = getXMLHttpRequest();
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader("Content-type", "application/json");

    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
            document.getElementById(inner).innerHTML = xmlhttp.responseText;
        }
        return false;
    }

    xmlhttp.send(data);
}

// TODO 3 : LENGKAPI FUNCTION UNTUK MENGISI OPSI BLOOD TYPES MENGGUNAKAN AJAX
function hidrateBloodTypes() {
    var xmlHTTP = getXMLHttpRequest();
    var url = "get_blood_types.php";
    var inner = "blood_type_id";

    // open xmlhttp
    xmlHTTP.open("GET", url, true);
    xmlHTTP.onreadystatechange = function() {
        document.getElementById(inner).innerHTML = "LOADING AJAX";
        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200) {
            document.getElementById(inner).innerHTML = xmlHTTP.responseText;
        }
    };
    xmlHTTP.send(null);
}

// TODO 3 : LENGKAPI FUNCTION UNTUK MENGISI OPSI HOBBIES MENGGUNAKAN AJAX
function hidrateHobbies() {
    var xmlHTTP = getXMLHttpRequest();
    var url = "get_hobbies.php";
    var inner = "hobby_id";

    // open xmlhttp
    xmlHTTP.open("GET", url, true);
    xmlHTTP.onreadystatechange = function() {
        document.getElementById(inner).innerHTML = "LOADING AJAX";
        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200) {
            document.getElementById(inner).innerHTML = xmlHTTP.responseText;
        }
    };
    xmlHTTP.send(null);
}

// TODO 6 : LENGKAPI FUNCTION UNTUK MENDAPATKAN DAFTAR CLASS BERDASARKAN PILIHAN RACE MENGGUNAKAN AJAX
function validatePhoneNumber(phone_number) {
    var xmlHTTP = getXMLHttpRequest();
    var url = "get_validate_phone_number.php?phone_number="+phone_number;
    var inner = "message_phone_number";

    xmlHTTP.open("GET", url, true);
    xmlHTTP.onreadystatechange = function() {
        document.getElementById(inner).innerHTML = "LOADING AJAX";
        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200) {
            document.getElementById(inner).innerHTML = xmlHTTP.responseText;
        }
    };
    xmlHTTP.send(null);
}

// bonus untuk send request post
function addProfileBook() {
    let inner = 'message_id';
    let data = JSON.stringify({
        name: document.getElementById('name').value,
        nickname: document.getElementById('nickname').value,
        address: document.getElementById('address').value,
        phone_number: document.getElementById('phone_number').value,
        blood_type_id: document.getElementById('blood_type_id').value,
        hobby_id: document.getElementById('hobby_id').value,
        best_three_1: document.getElementById('best_three_1').value,
        best_three_2: document.getElementById('best_three_2').value,
        best_three_3: document.getElementById('best_three_3').value,
    });

    console.log(data);

    callAjaxPost('add_profile_book.php', inner, data);
}