<!DOCTYPE html>
<html>
  <head>
    <html>
<head>
<link rel="stylesheet" href="style.css">
<style>

</style>




<meta charset="UTF-8" />

<div class="logo">
  <img src="bfive.png"/>
</div>
</head>


<body>
<header>

<!--lista för meny/-->
<div class="topnav" id="myTopnav">
  <a href="http://wwwlab.iit.his.se/b15vikbe/befiv/main.php">Home</a>
  <a href="http://wwwlab.iit.his.se/b15vikbe/befiv/recept.html">Recept</a>
  <a href="#contact">Bilder</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<!--funktion för meny/-->

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</header>
 
<!--Php start-->


<form class="hunter" action="http://wwwlab.iit.his.se/b15vikbe/befiv/main.php" method="post">
    Maträttens id: <input type="text" name="mat_id" /><br>
    Matens namn: <input type="text" name="mat_namn" /><br>
    Smak: <input type="text" name="smak" /><br>
    
    <input type="submit" />

</form> 

<?php           //Php start
        

        

        
$servername = "wwwlab.iit.his.se";
$username = "sqllab";
 $password = "Tomten2009";
        
    $pdo = new PDO("mysql:host=$servername;dbname=befive_mat", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<p>Connected successfully</p>";
    
//print_r($_POST);
        
   
if(isset($_POST['mat_id'])){
        $querystring='INSERT INTO matlista (mat_id,mat_namn,smak) VALUES(:mat_id,:mat_namn,:smak);';
        $stmt = $pdo->prepare($querystring);
        $stmt->bindParam(':mat_id', $_POST['mat_id']);
        $stmt->bindParam(':mat_namn', $_POST['mat_namn']);
        $stmt->bindParam(':smak', $_POST['smak']);
        $stmt->execute();
        
    }
        
	echo "<table align='center'>";
	echo "<tr>";
	echo "<th>Matens ID</th>";
	echo "<th>Maträtten</th>"; 
	echo "<th>Smak</th>";
	echo   "</tr>";
	echo  "<tr>";
   
    // Read all from Skepp

    foreach($pdo->query( 'SELECT * FROM matlista;' ) as $row){
      echo "<tr>";
      echo "<td>".$row['mat_id']."</td>";
      echo "<td>".$row['mat_namn']."</td>";
      echo "<td>".$row['smak']."</td>";
      
      echo "</tr>";   
        

    }
        
        
        
	echo "<div>Antalet Registrerade Maträtter <div>"; 
          
    $querystring='CALL Raknamatid();';
        
    foreach($pdo->query($querystring)as $row){
        echo $row[0];
    }



?>



<!--Fylla

<form class="webPoll" method="post" action="http://wwwlab.iit.his.se/b15vikbe/befiv/main.php">
    <h4>What question would you like to ask?</h4>
    <fieldset>
    <ul>
        <li>
            <label class='poll_active'>
            <input type='radio' name='AID' value='0'>
            bajs bajs
            </label>
        </li>
    </ul>
    </fieldset>
    <p class="buttons">
        <button type="submit" class="vote">Vote!</button>
    </p>
</form>



<li>
    <div class='result' style='width:20px;'>&nbsp;</div>
    <label class='poll_results'>
        10%: First Answer Here
    </label>
</li>




-->







<!--


<?php

/*
$a = new webPoll(array(
        'What subjects would you like to learn more about?',
        'HTML & CSS',
        'JavaScript',
        'JS Frameworks (jQuery, etc)',
        'Ruby/Ruby on Rails',
        'PHP',
        'mySQL'));
/*
  //Print form....
  echo '<form method="POST" action="http://wwwlab.iit.his.se/b15vikbe/befiv/main.php">';
  echo '<input type="text" name="tabort" value="Ta bort all data">';
  echo '<input type="submit">';
  echo '</form>';
  //process form
  if(isset($_POST['tabort']))
  {
	  $querystring='CALL tabort();';
  }
  else
    echo "";
   
   
?>

<?php 
    if (isset($_POST["ja"])) {
      $name = $_POST['ja'];
    }
?>

<form method="post" action="http://wwwlab.iit.his.se/b15vikbe/befiv/main.php">
    <input type="text" name="ja">
    <input type="submit">
</form>


<?php 
if(isset($ja)) 
{ 
	$querystring='CALL tabort();'; 
}
else 
{ 
	echo "";
} 
*  */ 

?>
 Saknas -->








    </table>



</body>
</html>

