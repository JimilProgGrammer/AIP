function showSignUp() {
    var signUpDiv = document.getElementById("signUpDiv");
    if (signUpDiv.style.display === "none") {
        signUpDiv.style.display = "block";
    } else {
        signUpDiv.style.display = "none";
    }
}

function renderBackground() {
    document.body.style.background = "linear-gradient(to right, #43c6ac, #f8ffae)";
}

function validator(inputtxt) {
    console.log(inputtxt);
    if (inputtxt.length >= 1) {
        var letters = /^[A-Za-z]+$/;
        if(inputtxt.match(letters)) {
            return true;
        } else {
            return false;
        }
    }
}

function nameFieldsValidator(input_field) {
    console.log(input_field);
    if (!validator(input_field.value)) {
        alert(input_field.name + " value should have only characters");
        input_field.value = "Characters";
        input_field.focus();
    }
}

function formValidator(form_to_validate) {
    if(!form_to_validate.checkValidity()) {
        if(form_to_validate.reportValidity) {
            form_to_validate.reportValidity();
        }
    } else {
        alert("Validation Success");
    }
    // fnameValidateResult = validator(form_to_validate.fnameField.value);
    // lnameValidateResult = validator(form_to_validate.lnameField.value);
    // if(fnameValidateResult && lnameValidateResult) {
    //     alert("Validation Successfull!");
    // } else {
    //     if(fnameValidateResult == false) {
    //         alert("First Name Validation failed!");
    //     } else if(lnameValidateResult == false) {
    //         alert("Last Name Validation failed!");
    //     } else {
    //         alert("First Name and Last Name validation failed!");
    //     }
    // }
}

function applyPwdRegex(field_to_apply_regex) {
    field_to_apply_regex.pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}";
    field_to_apply_regex.title = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
}