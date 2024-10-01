function getXMLHTTPRequest() {
    if (window.XMLHttpRequest) {
        // Modern browsers
        return new XMLHttpRequest();
    } else {
        // Old browswes
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

function get_server_time() {
    var xmlhttp = getXMLHTTPRequest();
    var page = 'get_server_time.php';
    xmlhttp.open("GET", page, true);
    xmlhttp.onreadystatechange = function() {
        document.getElementById('showtime').innerHTML = '<img src=".../images/ajax_loader.png"/>';
        
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
            document.getElementById('showtime').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}
