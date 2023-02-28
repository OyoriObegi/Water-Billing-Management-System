const form = document.getElementById('login-form');

form.addEventListener('submit', function(e) {
  e.preventDefault();
  const username = form.elements['username'].value;
  const password = form.elements['password'].value;

  // Here you can send an AJAX request to the server for authentication
  // For this example, we will just log the username and password to the console
  console.log(`Username: ${username} Password: ${password}`);

  // Redirect to the dashboard page if login is successful
  window.location.href = 'dashboard.html';
});
