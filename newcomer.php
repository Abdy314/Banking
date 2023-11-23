<!DOCTYPE html>

<html>
   <head>
      <meta charset = "utf-8">

      <title> Registration </title>

      <style>

         body 
         {

            background-image: url(images/back2.jfif);
            background-repeat: no-repeat;
            background-attachement: fixed;
            background-size: cover;
         }

      </style>


   </head>


   <body>

      <?php

           
        // Connect to MySQL
        if ( !( $connection = mysqli_connect( "localhost", "u112", "u112", "db112" ) ) )  
        {           
           die( "Could not connect to database </body></html>" );
	}


       	$name       =    $_POST["name"];

	$number     =    $_POST["account"];

	$pin        =    $_POST["pin"];

	$deposit    =    $_POST["money"];
	
	$sql = "INSERT INTO accounts (Name, Number, Pin, Amount) VALUES ('".$name. "'," .$number. "," .$pin. "," .$deposit.")";

	if (mysqli_query($connection, $sql)) 
	{
		 echo "<h2>Account Created Successfully.</h2>";
		 echo "<h2>Welcome to the family, " .$name.".</h2><br>";
	}
		 
	else
	{
		 echo "<h2> Error While creating account: ". mysqli_error($connection)."</h2><br>";
	}
	mysqli_close($connection);

?>

      <a href = "index.html">

            <img src = "images/home.png" width = "100"
 
               height = "100" alt = "Home Page">

      </a>

     </body>

</html>
