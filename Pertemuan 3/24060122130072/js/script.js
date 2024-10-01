// Nama   : Qun Alfadrian Setyowahyu Putro 
// NIM    : 24060122130072 
// Tanggal: 17 September 2024 

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }

function EnableElement(element) {
    element.style.display = "block";
}

function DisableElement(element) {
    element.style.display = "none";
}

function ValidateNIS() {
    var nis = document.getElementById("nis").value;
    var nisEmpty = document.getElementById("nisEmpty");
    var nisInvalid = document.getElementById("nisInvalid");

    if (!nis) {
        EnableElement(nisEmpty);
    } else {
        DisableElement(nisEmpty);
    }
    
    if (nis.length != 10) {
        EnableElement(nisInvalid);
    } else {
        DisableElement(nisInvalid);
    }

    if (nis && nis.length == 10) {
        return true;
    }
    return false;
}

function ValidateNama() {
    let nama = document.getElementById("nama").value;
    let namaEmpty = document.getElementById("namaEmpty");   
    
    if (!nama) {
        EnableElement(namaEmpty);
        return false;
    } else {
        DisableElement(namaEmpty);
        return true;
    }
}

function ValidateKelas() {
    var kelas = document.getElementById("kelas").value;
    var ekstrakurikuler = document.getElementById("ekstrakurikuler-group");

    if (kelas == 12) {
        DisableElement(ekstrakurikuler);
        ResetEkstrakurikuler();
    } else {
        EnableElement(ekstrakurikuler);
    }
    return kelas;
}

function ResetEkstrakurikuler() {
    var ekstrakurikuler = document.getElementsByClassName("ekstrakurikuler");
    
    Array.from(ekstrakurikuler).forEach(element => {
        element.checked = false;
    });
}

function ValidateEkstrakurikuler() {
    var ekstrakurikuler = document.getElementsByClassName("ekstrakurikuler");
    var checked = Array.from(ekstrakurikuler).filter(checkbox => checkbox.checked).length;
    var ekstrakurikulerMinErr = document.getElementById("ekstrakurikulerMinErr");
    var ekstrakurikulerMaxErr = document.getElementById("ekstrakurikulerMaxErr");

    if (checked < 1) {
        EnableElement(ekstrakurikulerMinErr);
        DisableElement(ekstrakurikulerMaxErr);
        return false;
    } else if (checked > 3) {
        EnableElement(ekstrakurikulerMaxErr);
        DisableElement(ekstrakurikulerMinErr);
        return false;
    } else {
        DisableElement(ekstrakurikulerMaxErr);
        DisableElement(ekstrakurikulerMinErr);
        return true;
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formInputSiswa").addEventListener("submit", function(event) {
        let isNisValid = ValidateNIS();
        let isNamaValid = ValidateNama();
        let isEkstrakurikulerValid = ValidateEkstrakurikuler();
        let kelas = ValidateKelas();

        if (!isNisValid || !isNamaValid || (!isEkstrakurikulerValid && kelas != 12)) {
            event.preventDefault();
        } else {
            console.log("Form Submitted Successfully");
        }
    })
})