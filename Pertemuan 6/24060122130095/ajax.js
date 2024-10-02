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

function callAjax(url, inner) {
    // TODO 4: Lengkapilah fungsi callAjax()
    var xmlhttp = getXMLHttpRequest();
    xmlhttp.open("GET", url, true);
    xmlhttp.onreadystatechange = function () {
        document.getElementById(inner).innerHTML = "Loading...";
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
            document.getElementById(inner).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}


// TODO 3 : LENGKAPI FUNCTION UNTUK MENGISI OPSI BLOOD TYPES MENGGUNAKAN AJAX
function hidrateBloodTypes() {
    let inner = 'blood_type_id';
    let url = 'get_blood_types.php';
    console.log(url);
    console.log(inner);
    callAjax(url, inner);
    

}

// TODO 3 : LENGKAPI FUNCTION UNTUK MENGISI OPSI HOBBIES MENGGUNAKAN AJAX
function hidrateHobbies() {

    let inner = 'hobby_id';
    let url = 'get_hobbies.php';
    console.log(url);
    console.log(inner);
    callAjax(url, inner);



}

// TODO 6 : LENGKAPI FUNCTION UNTUK MENDAPATKAN DAFTAR CLASS BERDASARKAN PILIHAN RACE MENGGUNAKAN AJAX
function validatePhoneNumber(phone_number) {

    console.log(phone_number);

    let inner = 'message_phone_number';
    let url = 'get_validate_phone_number.php?phone_number=' + phone_number;
    console.log(url);
    // console.log(inner);

    var xmlhttp = getXMLHttpRequest();
    xmlhttp.open("GET", url, true);
    xmlhttp.onreadystatechange = function () {
        document.getElementById(inner).innerHTML = "Loading...";
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let response = JSON.parse(xmlhttp.responseText);
            if(response = 'sudah'){
                alert('Nomor telepon sudah terdaftar');
            }else{
                alert('Nomor telepon belum terdaftar');
            }
        }
        return false;
    }
    

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