<?php

	//All dietary restrictions as booleans
	$Soy = FALSE;
	$Dairy = FALSE;
	$Wheat = FALSE;
	$Vegetarian = FALSE;
	$Vegan = FALSE;
	$Egg = FALSE;
	$Fish = FALSE;
	$Peanut = FALSE;
	$Sesame = FALSE;
	$Shellfish = FALSE;
	$TreeNut = FALSE;
	$GlutenSensitive = FALSE;
	$Halal = FALSE;
	$Kosher = FALSE;

	//Connect to database
	$conn = mysqli_connect('localhost', 'AVIFresher', 'AVIIFresh42069', 'stevenson');

	//Check connection
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

	//Write query for items
	$sql = 'SELECT * FROM food_items WHERE calories != 0';
	if($Soy) $sql = $sql . ' and Soy != 1';
	if($Dairy) $sql = $sql . ' and Dairy != 1';
	if($Wheat) $sql = $sql . ' and Wheat != 1';
	if($Vegetarian) $sql = $sql . ' and Vegetarian != 1';
	if($Vegan) $sql = $sql . ' and Vegan != 1';
	if($Egg) $sql = $sql . ' and Egg != 1';
	if($Fish) $sql = $sql . ' and Fish != 1';
	if($Peanut) $sql = $sql . ' and Peanut != 1';
	if($Sesame) $sql = $sql . ' and Sesame != 1';
	if($Shellfish) $sql = $sql . ' and Shellfish != 1';
	if($TreeNut) $sql = $sql . ' and Tree Nut != 1';
	if($GlutenSensitive) $sql = $sql . ' and Gluten Sensitive != 1';
	if($Halal) $sql = $sql . ' and Halal != 0';
	if($Kosher) $sql = $sql . ' and Kosher != 0';	
	$sql = $sql . ' ORDER BY name';
	
	//Make query and get result
	$result = mysqli_query($conn, $sql);

	//Fetch food item array from result
	$food_items = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//Free result
	mysqli_free_result($result);

	//Close connection
	mysqli_close($conn);
?>

<!DOCTYPE html>
<!-- <<<<<<< HEAD -->
<html>
<head>
	<title>AVI Fresher or whatever</title>
</head>
<body>
	<h1>AVI Fresh SUCKS</h1>
	<!-- Button Test -->
	<div>
		<button type="button" onClick="$Soy = !$Soy"> Soy </button>
	</div>
	<div>
		<?php foreach($food_items as $item){ ?>
			<div>
				<?php echo htmlspecialchars($item['Name'] . ' - ' . $item['Calories']) . ' Calories' ?>
			</div>
		<?php } ?>
	</div>
</body>
</html>
<!-- =======
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AVI Fresher</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- you can copy the nav tag as is over to other html files to make the navbar function
    <nav class="navbar">
        <div class="navbar__container">
            <a href="index.html" id="navbar__logo">Avi Fresher</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span> 
                <span class="bar"></span>
                <span class="bar"></span>
            </div> 
            <ul class="navbar__menu">
                <li class="navbar__item"> 
                    <a href="index.html" class="navbar__links">Home</a>
                </li>
                
                <li class="navbar__item"> 
                    <a href="menu.html" class="navbar__links">Menu</a>  
                </li>
                <li class="navbar__item"> 
                    <a href="about.html" class="navbar__links">About Us</a>
                </li>
                <li class="navbar__btn"> 
                    <a href="signup.html" class="button">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
            <h1 class="normal">WELCOME!</h1>
            <h2 class="normal">We strive to improve the quality of life at Oberlin.</h2>

            <p class="normal"> <a href="menu.html" class="link">View</a> today's dining hall menus</p>
            <p class="normal"> <a href = "/" class="link">Rate</a> the food</p>
            <p class="normal"> <a href="contact.html" class="link">Contact</a> Us</p>
            </div>
            <div class="main__image--container">
                <img src="images/pic1.svg" alt="NOT FOUND" id="main__img">
                <br>
                <br>
                <br>
                <a href="https://www.oberlin.edu/" target="_blank"><img class="oberlin__img" src="images/pic2.png" alt="NOT FOUND"></a>
                
            </div>
            <br>
    <!-- the following tag links it to the javascript file, make sure you add it to the body of every html file 
    <script src="app.js"></script>
  </body>
</html>
>>>>>>> c62b7b58ae0ea2f9ccb6ec7f581907204c583898 -->
