<?php
require_once "../second_header_extern.php";
require_once "../config/db.php";
?>

</header>
<main>

<section id="login-form" class="form-container login-container">

<h1 class="page-title heading-text">Logga in</h1>


<form name="loginForm" action="" method="POST" id=login-form" class="form-container">

  <!--Input-fält som kunden fyller i-->
  <div class="login_field-email form-container__box">
    <label for="email">E-post:</label><br>
    <input type="text" name="email" id="email" onblur="validateEmail()" class="form-container__box-input" placeholder="exempel@test.com" required>
    <br>
    <span class="emailValidationText"></span>
  </div>


  <div class="login_field-password form-container__box">
    <label for="password">Lösenord:</label><br>
    <input type="password" name="password" id="loginPassword" onblur="" class="form-container__box-input" required>
    <br>
    <span class=""></span>
  </div>

  <div class="form-container__submit">
    <input type="submit" value="Logga in" class="form-container__login-button" id="form-container__login-button">

  </div>

  <p>Är du inte medlem hos oss? <a href="register.php"><strong>Registrera dig här!</strong></a></p>
</form>

</section>

<?php
require_once '../footer.php';
?>