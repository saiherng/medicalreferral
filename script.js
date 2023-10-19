function searchProviders(event) {
  var specialty = document.getElementById("specialty").value;
  var resultsDiv = document.getElementById("results");
  resultsDiv.innerHTML = "";

  fetch("providers.json")
  .then(response => response.json())
  .then(data => {
    var providers = data.providers;
    var filteredProviders = providers.filter(provider => provider.specialty === specialty);

    if (filteredProviders.length === 0) {
      resultsDiv.innerHTML = "<p>No providers found.</p>";
    } else {
      var resultsTable = "<table><tr><th>Name</th><th>Specialty</th><th>Location</th><th>Phone</th><th>Email</th></tr>";
      filteredProviders.forEach(provider => {
        resultsTable += "<tr><td>" + provider.name + "</td><td>" + provider.specialty + "</td><td>" + provider.location + "</td><td>" + provider.phone + "</td><td>" + provider.email + "</td></tr>";
      });
      resultsTable += "</table>";
      resultsDiv.innerHTML = resultsTable;
    }
  })
  .catch(error => {
    resultsDiv.innerHTML = "<p>Error: " + error.message + "</p>";
  });
}


var counter = 0;

function submitScheduleRequestForm(event) {

    event.preventDefault(); 
  
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    var address = document.getElementById("address").value;
    var message = document.getElementById("message").value;
    
    
    var table = document.getElementById("table").getElementsByTagName("tbody")[0];
    var row = table.insertRow(-1);
    row.id = "row" + counter;

    var idCell = row.insertCell(0);
    var nameCell = row.insertCell(1);
    var emailCell = row.insertCell(2);
    var dateCell = row.insertCell(3);
    var timeCell = row.insertCell(4);
    var addressCell = row.insertCell(5);
    var messageCell = row.insertCell(6);
    var actionButtonCell = row.insertCell(7);
  
   
    idCell.innerHTML = counter;
    nameCell.innerHTML = name;
    emailCell.innerHTML = email;
    dateCell.innerHTML = date;
    timeCell.innerHTML = time;
    addressCell.innerHTML = address;
    messageCell.innerHTML = message;


   
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("date").value = "";
    document.getElementById("time").value = "";
    document.getElementById("message").value = "";
  
  
    var buttonContainer = row.cells[7];
    

    var approveButton = document.createElement("button");
    approveButton.innerHTML = "Approve";
    approveButton.className += "btn btn-success";
   

    var denyButton = document.createElement("button");
    denyButton.innerHTML = "Deny"
    denyButton.className += "btn btn-danger";

    approveButton.addEventListener("click", function() {
        alert("Schedule Approved");
      });

    denyButton.addEventListener("click", function() {
        removeRow("row"+counter)
      });
    
    buttonContainer.appendChild(approveButton);
    buttonContainer.appendChild(denyButton);
    
    counter++;

  }

function removeRow(rowID){
    var row = document.getElementById(rowID);
    row.deleteRow();

  }
  

