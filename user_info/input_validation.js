let registerBtn = document.querySelector(".form-container__register-button");
let loginBtn = document.querySelector(".form-container__login-button");
let strengthMeter = document.querySelector(".strength-meter");
let passwordInput = document.querySelector("#password");

function enableSubmitBtnIfFormIsValid() {
  if (isRegisterPhoneValid && isPasswordValid) {
    registerBtn.disabled = false;
    loginBtn.disabled = false;
  }
}

let isRegisterPhoneValid = false;
let isPasswordValid = false;

function validateRegisterPhone() {
  let registerPhone = document.querySelector("#registerPhone").value;
  let infoText = document.querySelector(".registerPhoneValidationText");

  if (registerPhone.length === 0) {
    infoText.innerHTML = "OBS! Obligatoriskt fält";
  } else if (new RegExp("[a-öA-Ö]").test(registerPhone)) {
    infoText.innerHTML = "OBS! Inga bokstäver tillåtna";
  } else if (isValidRegisterPhone(registerPhone)) {
    infoText.innerHTML = "OBS! Ogiltigt mobilnummer";
  } else {
    infoText.innerHTML = "";
    isRegisterPhoneValid = true;
    enableSubmitBtnIfFormIsValid();
    return;
  }
  registerBtn.disabled = true;
  isRegisterPhoneValid = false;
}

function isValidRegisterPhone(registerPhone) {
  let re = /[^0-9\s-]/;
  return re.test(String(registerPhone));
}

function calculatePasswordStrength(password) {}
