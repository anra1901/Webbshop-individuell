<?php

require_once "../second_header_extern.php";
require_once "../config/db.php";
?>

</header>
<main>

<h1>Välkommen till din sida <?php echo $_SESSION["name"] ?>!</h1>
<div class="shopping-btn"> <a href="../index.php"><button id="shopping-btn">Börja shoppa!</button></a></div>

<?php    
 
require_once '../footer.php';
?>