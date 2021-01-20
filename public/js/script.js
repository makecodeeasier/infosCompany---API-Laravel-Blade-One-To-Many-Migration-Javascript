 const openModal = () => {
     document.getElementById("backdrop").style.display = "block";
     document.getElementById("exampleModal").style.display = "block";
     document.getElementById("exampleModal").className += " show fade";
 }

 const closeModal = () => {
         document.getElementById("backdrop").style.display = "none";
         document.getElementById("exampleModal").style.display = "none";
         document.getElementById("exampleModal").className = "modal fade";
     }
     // Get the modal
 let modal = document.getElementById('exampleModal');

 const addWorker = () => {
     document.getElementById("workers").innerHTML += '<p style="margin-top:10px; margin-bottom:2px">Dane pracownika</p><input type="text" class="col-md-6" style="padding:5px; margin-bottom:3px; " placeholder="Imię" name="forename[]" required><input type="text" class="col-md-6" style="padding:5px; margin-bottom:3px" placeholder="Nazwisko" name="surname[]" required><input type="text" class="col-md-6" style="padding:5px; margin-bottom:3px" placeholder="Email" name="email[]" required><input type="text" class="col-md-6" style="padding:5px; margin-bottom:3px" placeholder="Telefon" name="phone[]">';
 }

 document.getElementById("buttonDisplayForm").addEventListener("click", function(event) {
     openModal();
 });

 let form = document.forms.namedItem("formToSend");
 form.addEventListener('submit', ev => {
     ev.preventDefault();
     document.getElementById("requestInformation").innerHTML = "<center>Trwa wysyłanie...</center>";
     let oData = new FormData();

     oData.append('name', document.getElementById("name").value);
     oData.append('nip', document.getElementById("nip").value);
     oData.append('address', document.getElementById("address").value);
     oData.append('city', document.getElementById("city").value);
     oData.append('postcode', document.getElementById("postcode").value);

     let forename = document.getElementsByName('forename[]');
     let surname = document.getElementsByName('surname[]');
     let email = document.getElementsByName('email[]');
     let phone = document.getElementsByName('phone[]');





     let employees = []

     for (let i = 0; i < forename.length; i++) {


         employees.push({
             "forename": forename[i].value,
             "surname": surname[i].value,
             "email": email[i].value,
             "phone": phone[i].value
         });
     }





     employees = JSON.stringify(employees);

     oData.append('prac', employees);

     // console.log(employees);


     var object = {};
     oData.forEach((value, key) => object[key] = value);
     var json = JSON.parse(JSON.stringify(object));

     console.log(json);


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