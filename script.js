const emailInput = document.getElementById('email');
const emailError = document.getElementById('email-error');

const fromDateInput = document.getElementById('from-date');
const toDateInput = document.getElementById('to-date');
const dateError = document.getElementById('date-error');

const nameInput = document.getElementById('name');
const nameError = document.getElementById('name-error');

const submitBtn = document.getElementById('submit-btn');

const validateEmail = (email) => {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
};

const validateDate = (from, to) => {
  const fromDate = new Date(from);
  const toDate = new Date(to);
  return fromDate < toDate;
};

const validateName = (name) => {
  const re = /^[a-zA-Z ]+ [a-zA-Z ]+$/;  // Allows only alphabets and spaces with two words
  return re.test(name);
};

const validateForm = (event) => {
  event.preventDefault(); // Prevent default form submission

  let isValid = true;

  // Email Validation
  if (!validateEmail(emailInput.value)) {
    emailError.textContent = "Please enter a valid email address.";
    isValid = false;
  } else {
    emailError.textContent = "";
  }

  // Date Range Validation
  if (!validateDate(fromDateInput.value, toDateInput.value)) {
    dateError.textContent = "To date must be after from date.";
    isValid = false;
  } else {
    dateError.textContent = "";
  }

  // Name Validation
  if (!validateName(nameInput.value)) {
    nameError.textContent = "Please enter a valid name (with spaces).";
    isValid = false;
  } else {
    nameError.textContent = "";
  }

  if (isValid) {
    // Submit the form if all validations pass
    submitBtn.disabled = false; // Enable submit button after successful validation
    alert("Form submitted successfully!"); // Simulate form submission (replace with actual submission logic)
  } else {
    submitBtn.disabled = true; // Disable submit button if any validation fails
  }
};

submitBtn.addEventListener('click', validateForm);