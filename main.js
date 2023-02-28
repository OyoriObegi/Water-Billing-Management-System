// get the customer information, billing, and payment links
const customerInfoLink = document.querySelector('a#customer-info');
const billingLink = document.querySelector('a#billing');
const paymentLink = document.querySelector('a#payment');

// add event listeners to the links
customerInfoLink.addEventListener('click', checkLogin());
billingLink.addEventListener('click', checkLogin());
paymentLink.addEventListener('click', checkLogin());

// function to check if the user is logged in
function checkLogin(event) {
  // prevent the link from redirecting
  event.preventDefault();

  // check if the user is logged in
  const isLoggedIn = checkLogin();

  if (isLoggedIn) {
    // if logged in, redirect to the link's href
    window.location.href = event.target.href;
  } else {
    // if not logged in, redirect to the login page
    window.location.href = 'login.php';
  }
}
