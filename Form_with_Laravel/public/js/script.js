function validateForm() {
    let full_name = document.getElementById("full_name").value;
    let user_name = document.getElementById("user_name").value;
    let birthdate = document.getElementById("birthdate").value;
    let phone = document.getElementById("phone").value;
    let address = document.getElementById("address").value;
    let password = document.getElementById("password").value;
    let confirm_password = document.getElementById("confirm_password").value;
    let email = document.getElementById("email").value;
    let user_image = document.getElementById("user_image").value;
    
    let email_regex = /^\S+@\S+\.\S+$/;
    let phone_regex = /^\d{11}$/;
    
    if (full_name.trim() === "" ||
        user_name.trim() === "" ||
        birthdate.trim() === "" ||
        phone.trim() === "" ||
        address.trim() === "" ||
        password.trim() === "" ||
        confirm_password.trim() === "" ||
        email.trim() === "" ||
        user_image.trim() === "") {
      alert("Please fill in all fields.");
      return false;
    } else if (password !== confirm_password) {
      alert("Passwords do not match.");
      return false;
    } else if (!email_regex.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    } else if (!phone_regex.test(phone)) {
      alert("Please enter a valid phone number.");
      return false;
    } else {
      return true;
    }
  }
  