<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: yellow;
}
form {
    border-style: solid;
    border-width: 1px;
    background-color: white;
}
#output {
  border-style: solid;
  border-width: 1px;
  border-color: blue;
}
.error {color: #FF0000;}
</style>
</head>
<body>
  <?php
    $subtotalErr = "";
    $error = false;
    //echo $_POST["tip"];
    if(!is_numeric($_POST["subtotal"]) && $_POST) {
      $subtotalErr = "*subtotal must be a number";
      $error = true;
    }
   ?>

  <form action="calculator.php" method ="post">
    <h2> Tip Calculator </h2>

    Bill subtotal: $
    <input type="text" name="subtotal" value = <?php if($_POST["subtotal"]) {echo $_POST["subtotal"];} else {echo 0;}; ?> >
    <span class="error"> <?php echo $subtotalErr;?></span>
    <br><br>
    Tip Percentage:
    <br><br>
    <?php
      for ($x = 0.1; $x <= 0.20; $x += 0.05) {
        $xpercent = $x * 100;

        echo "<input type='radio' name='tip' value='$x'";
        if (!$_POST && $x == 0.1) {
          echo "checked";

        }

        $tip = number_format($_POST["tip"], 2);

         if(abs($_POST["tip"] - $x) < .01)
         {
           echo "checked";
           echo "> $xpercent%";
           //echo $tip;
           //echo $x;
         } else {
           echo "> $xpercent%";
           //echo $tip;
           //echo $x;
         }
         //echo "> $xpercent%";

      }
     ?>

   <!--<input type="radio" name="tip" value=".15" <?php //if ($_POST["tip"] == ".15"){ echo "checked";}?>> 15%
   <input type="radio" name="tip" value=".20"<?php //if ($_POST["tip"] == ".20"){ echo "checked";}?>> 20% -->
   <br><br>

    <input type="submit" value="Submit">
  </form>

<?php
 if (!$error && $_POST) {
   $subtotal = $_POST["subtotal"];
   $percent = $_POST["tip"];

   $tip = $subtotal * $percent;
   $total = $subtotal + $tip;

   echo "<div id = 'output'>";
   echo "Tip: $";
   echo $tip;
   echo "<br><br>";
   echo "Total: $";
   echo $total;
   echo "</div>";
 } else if ($_POST) {
   echo "<span class = 'error'> One or more errors occured inputting form </span>" ;
 }

?>

</body>
</html>
