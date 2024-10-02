/**
 * Nama         : Zikry Alfahri Akram
 * NIM          : 24060122120033
 * Tanggal      : Rabu, 2 Oktober 2024
 * Nama File    : ajax.js
 */

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
    let inner = "blood_type_id"; // The element to update
    let url = 'get_blood_types.php'; // The URL to get blood types

    callAjaxPost(url, inner, null); // No data needed for this request
}


// TODO 3 : LENGKAPI FUNCTION UNTUK MENGISI OPSI HOBBIES MENGGUNAKAN AJAX
function hidrateHobbies() {
    let inner = "hobby_id"; // The element to update
    let url = 'get_hobbies.php'; // The URL to get hobbies

    callAjaxPost(url, inner, null); // No data needed for this request
}

// TODO 6 : LENGKAPI FUNCTION UNTUK MENDAPATKAN DAFTAR CLASS BERDASARKAN PILIHAN RACE MENGGUNAKAN AJAX
function validatePhoneNumber(phone_number) {
    let inner = "message_phone_number"; // The element to update with validation message
    let url = 'get_validate_phone_number.php'; // The URL to validate the phone number

    let data = JSON.stringify({ phone_number: phone_number }); // Send the phone number as a POST request
    callAjaxPost(url, inner, data);
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