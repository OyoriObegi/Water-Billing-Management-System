// Get the navigation links
const navLinks = document.querySelectorAll('nav li a');

// Add an event listener to each link
navLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        // Prevent the link from reloading the page
        event.preventDefault();

        // Get the section that corresponds to the link's href attribute
        const section = document.querySelector(this.getAttribute('href'));

        // Scroll to the section
        section.scrollIntoView({ behavior: 'smooth' });
    });
});

// Get the payment button
const paymentButton = document.querySelector('section:nth-of-type(3) a');

// Add an event listener to the payment button
paymentButton.addEventListener('click', function(event) {
    // Prevent the link from reloading the page
    event.preventDefault();

    // Get the payment form
    const paymentForm = document.createElement('form');
    paymentForm.setAttribute('id', 'payment-form');

    // Create an input field for the payment amount
    const paymentAmountInput = document.createElement('input');
    paymentAmountInput.setAttribute('type', 'number');
    paymentAmountInput.setAttribute('name', 'payment-amount');
    paymentAmountInput.setAttribute('placeholder', 'Enter payment amount');
    paymentAmountInput.setAttribute('required', '');

    // Create a submit button for the payment form
    const paymentSubmitButton = document.createElement('button');
    paymentSubmitButton.setAttribute('type', 'submit');
    paymentSubmitButton.textContent = 'Make Payment';

    // Add the input field and submit button to the payment form
    paymentForm.appendChild(paymentAmountInput);
    paymentForm.appendChild(paymentSubmitButton);

    // Add the payment form to the payment section
    const paymentSection = document.querySelector('#payment');
    paymentSection.appendChild(paymentForm);

    // Focus on the payment amount input field
    paymentAmountInput.focus();
});
