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
    var xhr = new XMLHttpRequest(); 
    xhr.open("GET", "get_blood_types.php?", true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("blood_type_id").innerHTML = xhr.responseText; // Update the class dropdown
        }
    };

    xhr.send();

}

// TODO 3 : LENGKAPI FUNCTION UNTUK MENGISI OPSI HOBBIES MENGGUNAKAN AJAX
function hidrateHobbies() {
    var xhr = new XMLHttpRequest(); 
    xhr.open("GET", "get_hobbies.php?", true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("hobby_id").innerHTML = xhr.responseText; // Update the class dropdown
        }
    };

    xhr.send();
}

// Function to validate phone number using AJAX (fetch)
function validatePhoneNumber(phone_number) {
    const messageContainer = document.getElementById('message_phone_number');
    fetch(`get_validate_phone_number.php?phone_number=${encodeURIComponent(phone_number)}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'exists') {
                messageContainer.innerHTML = '<span style="color: red;">Nomor telepon sudah terdaftar</span>';
                document.getElementById('phone_number').classList.add('is-invalid');
            } else if (data.status === 'available') {
                messageContainer.innerHTML = '<span style="color: green;">Nomor telepon tersedia</span>';
                document.getElementById('phone_number').classList.remove('is-invalid'); 
                document.getElementById('phone_number').classList.add('is-valid'); 
            }
        })
        .catch(error => {
            console.error('Error validating phone number:', error);
            messageContainer.innerHTML = '<span style="color: red;">Phone number is use by someone else =!</span>';
        });
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