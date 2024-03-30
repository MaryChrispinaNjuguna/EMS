// Add custom method to validate only letters
$.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
}, "Please enter letters only");
$.validator.addMethod("customRegNo", function(value, element) {
  // Check if the value contains at least 9 numbers followed by the / symbol and then more numbers
  return /^[0-9]{9,}\/[0-9]+$/.test(value);
}, "Please enter a valid registration number eg 0807/2020");

$.validator.addMethod("strongPassword", function(value, element) {
  // Check if the value meets the password requirements
  return /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
}, "Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character.");

// Example usage:


$("#myform").validate({
  rules: {
    student_fname: {
      required: true,
      minlength: 2,
      lettersonly: true
    },
    student_lname: {
      required: true,
      minlength: 2,
      lettersonly: true
    },
    lec_fname: {
      required: true,
      minlength: 2,
      lettersonly: true
    },
    lec_lname: {
      required: true,
      minlength: 2,
      lettersonly: true
    },
    student_email: {
      required: true,
      email: true
    },
    lec_email: {
      required: true,
      email: true
    },
    reg_no: {
      required: true,
      customRegNo: true
    },
    PF_No: { 
      required: true,
      number: true
    },
    password: {
      required: true,
      strongPassword: true
    }
  },
  messages: {
    student_fname: {
      required: "Please enter your first name",
      minlength: "First name should contain at least 2 characters"
    },
    student_lname: {
      required: "Please enter your last name",
      minlength: "Last name should contain at least 2 characters"
    },
    student_email: {
      required: "Please enter your email",
      email: "Please enter a valid email address"
    },
    lec_fname: {
      required: "Please enter your first name",
      minlength: "First name should contain at least 2 characters"
    },
    lec_lname: {
      required: "Please enter your last name",
      minlength: "Last name should contain at least 2 characters"
    },
    lec_email: {
      required: "Please enter your email",
      email: "Please enter a valid email address"
    },
    reg_no: {
      required: "Please enter your registration number",
      pattern: "Please enter a valid registration number eg 0807/2020"
    },
    PF_No: {
      required: "Please enter your PF number",
      number: "Please enter a valid PF number"
    },
    password: {
      required: "Please enter a password"
    }
  },
  submitHandler: function(form) {
    form.submit();
  }
});
