<?php
require_once "../second_header_extern.php";
require_once "../config/db.php";
?>

</header>
<main>

<section id="register-form" class="form-container register-container">

<h1 class="page-title heading-text">Registrera dig</h1>


<form name="registerForm" action="send_registration.php" method="POST" id="contact-form" class="form-container">

  <!--Input-fält som kunden fyller i-->
  <div class="register_field-name form-container__box">
    <label for="name">För- och efternamn:</label><br>
    <input type="text" name="name" id="name" onblur="validateName()" class="form-container__box-input" required>
    <br>
    <span class="nameValidationText"></span>
  </div>

  <div class="register_field-email form-container__box">
    <label for="email">E-post:</label><br>
    <input type="text" name="email" id="email" onblur="validateEmail()" class="form-container__box-input" placeholder="exempel@test.com" required>
    <br>
    <span class="emailValidationText"></span>
  </div>

  <div class="register_field-phone form-container__box">
    <label for="phone">Mobilnummer:</label><br>
    <input type="text" name="phone" id="registerPhone" onblur="validateRegisterPhone()" class="form-container__box-input" placeholder="(ex. 0701234567)" required>
    <br>
    <span class="registerPhoneValidationText"></span>
  </div>

  <div class="register_field-street form-container__box">
    <label for="street">Gatuadress:</label><br>
    <input type="text" name="street" id="street" onblur="validateStreet() " class="form-container__box-input" required>
    <br>
    <span class="streetValidationText"></span>
  </div>

  <div class="register_field-postalcode form-container__box">
    <label for="zip">Postnr:</label><br>
    <input type="text" name="zip" id="zip" oninput="validateZipcode()" placeholder="(ex. 123 45)" class="form-container__box-input" required>
    <br>
    <span class="zipcodeValidationText"></span>
  </div>

  <div class="register_field-city form-container__box">
    <label for="city">Ort:</label><br>
    <input type="text" name="city" id="city" onblur="validateCity()" class="form-container__box-input" required>
    <br>
    <span class="cityValidationText"></span>
  </div>


  <div class="register_field-password form-container__box">
    <label for="password">Lösenord:</label><br>
    <input type="password" name="password" id="registerPassword" class="form-container__box-input" required>
    <br>
    <div class="strength-meter"></div>
    <span class="passwordValidationText"></span>
  </div>

  <div class="form-container__submit">
    <input type="submit" value="Registrera mig" class="form-container__register-button" id="form-container__register-button">

  </div>
</form>

</section>

<?php
require_once '../footer.php';
?>