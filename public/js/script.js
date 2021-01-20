function openModal() {
    document.getElementById("backdrop").style.display = "block";
    document.getElementById("exampleModal").style.display = "block";
    document.getElementById("exampleModal").className += " show fade";
}

function closeModal() {
    document.getElementById("backdrop").style.display = "none";
    document.getElementById("exampleModal").style.display = "none";
    document.getElementById("exampleModal").className = "modal fade";
}
// Get the modal
var modal = document.getElementById('exampleModal');

function addWorker() {
    document.getElementById("workers").innerHTML += '<p style="margin-top:10px; margin-bottom:2px">Dane pracownika</p><input type="text" class="col-md-6" style="padding:5px; margin-bottom:3px; " placeholder="Imię" name="forename[]" required><input type="text" class="col-md-6" style="padding:5px; margin-bottom:3px" placeholder="Nazwisko" name="surname[]" required><input type="text" class="col-md-6" style="padding:5px; margin-bottom:3px" placeholder="Email" name="email[]" required><input type="text" class="col-md-6" style="padding:5px; margin-bottom:3px" placeholder="Telefon" name="phone[]">';
}

document.getElementById("buttonDisplayForm").addEventListener("click", function(event) {
    openModal();
});

let form = document.forms.namedItem("formToSend");
form.addEventListener('submit', ev => {
    ev.preventDefault();
    document.getElementById("requestInformation").innerHTML = "<center>Trwa wysyłanie...</center>";
    let oData = new FormData(form);
    let oReq = new XMLHttpRequest();
    oReq.open("POST", "./api/add", true);
    oReq.onload = function(oEvent) {
        if (oReq.status == 200) {
            document.getElementById("requestInformation").innerHTML = "<center>Dane zostały wysłane</center>";
        } else {
            document.getElementById("requestInformation").innerHTML = "<center>ERROR</center>";
        }
    };

    oReq.send(oData);

}, false);