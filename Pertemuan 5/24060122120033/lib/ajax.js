/**
 * Nama                 : Zikry Alfahri Akram
 * NIM                  : 24060122120033
 * Tanggal Pengerjaan   : Kamis, 26 September 2024
 * Nama File            : ajax.js
 */

// Fungsi untuk membuat objek XMLHTTPRequest
function getXMLHTTPRequest() {
    if (window.XMLHttpRequest) {
        // Code for modern browsers
        return new XMLHttpRequest();
    } else {
        // Code for old IE browsers
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

// Fungsi untuk melakukan request ke get_server_time.php melalui ajax
function get_server_time() {
    var xmlhttp = getXMLHTTPRequest();
    var page = "get_server_time.php";
    xmlhttp.open("GET", page, true);
    xmlhttp.onreadystatechange = function () {
        document.getElementById('showtime').innerHTML = '<img src="../images/ajax_loader.png" alt="Loading...">';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
            document.getElementById('showtime').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}

function add_customer_get() {
    var xmlhttp = getXMLHTTPRequest();
    
    // Get input value
    var name = encodeURI(document.getElementById('name').value);
    var address = encodeURI(document.getElementById('address').value);
    var city = encodeURI(document.getElementById('city').value);

    // Validate
    if (name != "" && address != ""  && city != "" && city != "none") {
        // Set url and inner
        var url = "add_customer_get.php?name=" + name + "&address=" + address + "&city=" + city;
        // alert(url);
        var inner = "add_response";
        
        // Open request
        xmlhttp.open("GET", url, true);
        xmlhttp.onreadystatechange = function () {
            document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.png" alt="Loading...">';
            if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(null);
    } else { // Tampilkan pesan alert jika terdapat field form yang belum terisi
        alert("Please fill all the fields");
    }
}

function add_customer_post() {
    var xmlhttp = getXMLHTTPRequest();

    // Get input value
    var name = encodeURI(document.getElementById('name').value);
    var address = encodeURI(document.getElementById('address').value);
    var city = encodeURI(document.getElementById('city').value);

    // Validate
    if (name != "" && address != "" && city != "" && city != "none") {
        // Set url and inner
        var url = "add_customer_post.php";
        var inner = "add_response";

        // Set parameter and open request
        var params = "name=" + name + "&address=" + address + "&city=" + city;
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function () {
            document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.png" alt="Loading...">';
            if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    } else { // Tampilkan pesan alert jika terdapat field form yang belum terisi
        alert("Please fill all the fields");
    }
}

function callAjax(url, inner) {
    var xmlhttp = getXMLHTTPRequest();
    xmlhttp.open("GET", url, true);
    xmlhttp.onreadystatechange = function () {
        document.getElementById(inner).innerHTML = '<img src="../images/ajax_loader.png" alt="Loading...">';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
            document.getElementById(inner).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

function showCustomer(customerid) {
    var inner = "detail_customer";
    var url = 'get_customer.php?id=' + customerid;
    if (customerid == "") {
        document.getElementById(inner).innerHTML = "";
    } else {
        callAjax(url, inner);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById('search');
    var searchResult = document.getElementById('searchResult');

    searchInput.addEventListener('keyup', function () {
        var keyword = searchInput.value;
        var xmlhttp = getXMLHTTPRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                searchResult.innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open('GET', 'get_book.php?keyword=' + keyword, true);
        xmlhttp.send();
    });
});

