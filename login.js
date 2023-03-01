const form = document.getElementById('login-form');

form.addEventListener('submit', function(e) {
  e.preventDefault();

  const username = form.elements['username'].value;
  const password = form.elements['password'].value;

  // Check that both fields have been filled out
  if (username.trim() === '' || password.trim() === '') {
    alert('Please enter a valid username and password');
    return;
  }

  // If validation passes, submit the form
  form.submit();
});
