// Get all the "Edit" buttons and attach click event listeners to them
var editButtons = document.querySelectorAll("button:nth-of-type(1)");
for (var i = 0; i < editButtons.length; i++) {
  editButtons[i].addEventListener("click", editUser);
}

// Get all the "Delete" buttons and attach click event listeners to them
var deleteButtons = document.querySelectorAll("button:nth-of-type(2)");
for (var i = 0; i < deleteButtons.length; i++) {
  deleteButtons[i].addEventListener("click", deleteUser);
}

// Attach click event listener to "Add User" button
var addUserButton = document.querySelector("button:last-of-type");
addUserButton.addEventListener("click", addUser);

function editUser(event) {
  // Get the row containing the "Edit" button that was clicked
  var row = event.target.parentNode.parentNode;
  
  // Get the username, full name, email, and role from the row
  var username = row.querySelector("td:nth-of-type(1)").textContent;
  var fullName = row.querySelector("td:nth-of-type(2)").textContent;
  var email = row.querySelector("td:nth-of-type(3)").textContent;
  var role = row.querySelector("select[name='role']").value;
  
  // Show a prompt for the user to enter updated information
  var updatedUsername = prompt("Enter updated username:", username);
  var updatedFullName = prompt("Enter updated full name:", fullName);
  var updatedEmail = prompt("Enter updated email:", email);
  var updatedRole = prompt("Enter updated role (admin or user):", role);
  
  // Update the row with the new information
  row.querySelector("td:nth-of-type(1)").textContent = updatedUsername;
  row.querySelector("td:nth-of-type(2)").textContent = updatedFullName;
  row.querySelector("td:nth-of-type(3)").textContent = updatedEmail;
  row.querySelector("select[name='role']").value = updatedRole;
}

function deleteUser(event) {
  // Get the row containing the "Delete" button that was clicked
  var row = event.target.parentNode.parentNode;
  
  // Confirm that the user wants to delete the user
  var confirmation = confirm("Are you sure you want to delete this user?");
  
  // If the user confirms, remove the row from the table
  if (confirmation) {
    row.parentNode.removeChild(row);
  }
}

function addUser() {
  // Show a prompt for the user to enter new user information
  var username = prompt("Enter username:");
  var fullName = prompt("Enter full name:");
  var email = prompt("Enter email:");
  var role = prompt("Enter role (admin or user):");
  
  // Create a new row with the user information
  var newRow = document.createElement("tr");
  var usernameCell = document.createElement("td");
  var fullNameCell = document.createElement("td");
  var emailCell = document.createElement("td");
  var roleCell = document.createElement("td");
  var roleSelect = document.createElement("select");
  var adminOption = document.createElement("option");
  var userOption = document.createElement("option");
  var actionsCell = document.createElement("td");
  var editButton = document.createElement("button");
  var deleteButton = document.createElement("button");
  
  usernameCell.textContent = username;
  fullNameCell.textContent = fullName;
  emailCell.textContent = email;
  adminOption.value = "admin";
  adminOption.textContent = "Admin";
  userOption.value = "user";
  userOption.textContent = "User";
  roleSelect.name = "role";
  roleSelect.appendChild(adminOption);
  roleSelect.appendChild(userOption);
  roleCell.appendChild(roleSelect);
  editButton.textContent = "Edit";
  deleteButton.textContent = "Delete";
  actionsCell.appendChild(editButton);
  actionsCell.appendChild(deleteButton);
  newRow.appendChild(usernameCell);
  newRow.appendChild(fullNameCell);
  newRow.appendChild(emailCell);
  newRow.appendChild(roleCell);
  newRow.appendChild(actionsCell);
  
  // Add the new row to the table
  var tableBody = document.querySelector("table tbody");
  tableBody.appendChild(newRow);
  
  // Clear the input fields
  document.getElementById("username").value = "";
  document.getElementById("fullName").value = "";
  document.getElementById("email").value = "";
  }
  
  // Handle the click event for the Add User button
  document.getElementById("addUserBtn").addEventListener("click", function() {
  showAddUserModal();
  });
  
  // Handle the click event for the Submit button in the Add User modal
  document.getElementById("addUserModalSubmitBtn").addEventListener("click", function() {
  var username = document.getElementById("username").value;
  var fullName = document.getElementById("fullName").value;
  var email = document.getElementById("email").value;
  var roleSelect = document.getElementById("addUserModalRoleSelect");
  var role = roleSelect.options[roleSelect.selectedIndex].value;
  
  // Add the new user to the table
  addUser(username, fullName, email, role);
  
  // Close the Add User modal
  hideAddUserModal();
  });
