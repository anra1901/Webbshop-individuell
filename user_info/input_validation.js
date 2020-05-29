let strengthMeter = document.querySelector(".strength-meter");
let registerPassword = document.querySelector("#registerPassword");
let reasonsContainer = document.querySelector(".passwordValidationText");

let isRegisterPhoneValid = false;

function enableSubmitBtnIfFormIsValid() {
  if (isRegisterPhoneValid) {
    registerBtn.disabled = false;
  }
}

registerPassword.addEventListener("input", updateStrengthMeter);
updateStrengthMeter();

function calculatePasswordStrength(password) {
  let weaknesses = [];
  weaknesses.push(lengthWeakness(password));
  weaknesses.push(lowercaseWeakness(password));
  weaknesses.push(uppercaseWeakness(password));
  weaknesses.push(specialCharactersWeakness(password));
  weaknesses.push(repeatCharactersWeakness(password));
  return weaknesses;
}

function updateStrengthMeter() {
  let weaknesses = calculatePasswordStrength(registerPassword.value);

  let strength = 100;
  reasonsContainer.innerHTML = "";
  weaknesses.forEach((weakness) => {
    if (weakness == null) return;
    strength -= weakness.deduction;
    let messageElement = document.createElement("div");
    messageElement.innerHTML = weakness.message;
    reasonsContainer.appendChild(messageElement);
  });
  strengthMeter.style.setProperty("--strength", strength);
}

function lengthWeakness(password) {
  let length = password.length;

  if (length <= 5) {
    return {
      message: "Ditt lösenord är för kort",
      deduction: 40,
    };
  }

  if (length <= 10) {
    return {
      message: "Lösenordet bör vara längre",
      deduction: 15,
    };
  }
}

function uppercaseWeakness(password) {
  return characterTypeWeakness(password, /[A-Ö]/g, "stora bokstäver");
}

function lowercaseWeakness(password) {
  return characterTypeWeakness(password, /[a-ö]/g, "små bokstäver");
}

function characterTypeWeakness(password, regex, type) {
  let matches = password.match(regex) || [];

  if (matches.length === 0) {
    return {
      message: `Lösenordet bör innehålla ${type}`,
      deduction: 20,
    };
  }
  if (matches.length <= 2) {
    return {
      message: `Lösenordet bör innehålla fler ${type}`,
      deduction: 5,
    };
  }
}

function numberWeakness(password) {
  return characterTypeWeakness(password, /[0-9]/g, "nummer");
}

function specialCharactersWeakness(password) {
  return characterTypeWeakness(password, /[^0-9a-öA-Ö\s]/g, "speciala tecken");
}

function repeatCharactersWeakness(password) {
  let matches = password.match(/(.)\1/g) || [];
  if (matches.length > 0) {
    return {
      message: "Lösenordet har tecken som upprepas",
      deduction: matches.length * 10,
    };
  }
}

function isValidRegisterPhone(registerPhone) {
  let re = /[^0-9\s-]/;
  return re.test(String(registerPhone));
}

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
