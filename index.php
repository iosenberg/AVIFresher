<?php

	//Read booleans from url, default to false
	$Soy = (isset($_GET['Soy']) ? $_GET['Soy'] : FALSE);
	$Dairy = (isset($_GET['Dairy']) ? $_GET['Dairy'] : FALSE);
	$Wheat = (isset($_GET['Wheat']) ? $_GET['Wheat'] : FALSE);
	$Vegetarian = (isset($_GET['Vegetarian']) ? $_GET['Vegetarian'] : FALSE);
	$Vegan = (isset($_GET['Vegan']) ? $_GET['Vegan'] : FALSE);
	$Egg = (isset($_GET['Egg']) ? $_GET['Egg'] : FALSE);
	$Fish = (isset($_GET['Fish']) ? $_GET['Fish'] : FALSE);
	$Peanut = (isset($_GET['Peanut']) ? $_GET['Peanut'] : FALSE);
	$Sesame = (isset($_GET['Sesame']) ? $_GET['Sesame'] : FALSE);
	$Shellfish = (isset($_GET['Shellfish']) ? $_GET['Shellfish'] : FALSE);
	$TreeNut = (isset($_GET['TreeNut']) ? $_GET['TreeNut'] : FALSE);
	$GlutenSensitive = (isset($_GET['GlutenSensitive']) ? $_GET['GlutenSensitive'] : FALSE);
	$Halal = (isset($_GET['Halal']) ? $_GET['Halal'] : FALSE);
	$Kosher = (isset($_GET['Kosher']) ? $_GET['Kosher'] : FALSE);

	//Read sorting method from url, default to name?
	$Sort = (isset($_GET['Sort']) ? $_GET['Sort'] : 'Name');

	//Connect to database
	$conn = mysqli_connect('localhost', 'AVIFresher', 'AVIIFresh42069', 'stevenson');

	//Check connection
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

	//Write query for items
	$sql = 'SELECT * FROM food_items WHERE calories != 0';
	if($Soy) $sql .= ' and Soy != 1';
	if($Dairy) $sql .= ' and Dairy != 1';
	if($Wheat) $sql .= ' and Wheat != 1';
	if($Vegetarian) $sql .= ' and Vegetarian != 1';
	if($Vegan) $sql .= ' and Vegan != 1';
	if($Egg) $sql .= ' and Egg != 1';
	if($Fish) $sql .= ' and Fish != 1';
	if($Peanut) $sql .= ' and Peanut != 1';
	if($Sesame) $sql .= ' and Sesame != 1';
	if($Shellfish) $sql .= ' and Shellfish != 1';
	if($TreeNut) $sql .= ' and Tree Nut != 1';
	if($GlutenSensitive) $sql .= ' and Gluten Sensitive != 1';
	if($Halal) $sql .= ' and Halal != 0';
	if($Kosher) $sql .= ' and Kosher != 0';	
	$sql .= ' ORDER BY ' . $Sort;
	
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
		<script language="javascript" type="text/javascript">
			function makeURL() {
				var queries = "?" +
					(document.getElementById('Soy').value ? "Soy=TRUE&" : "") +
					(document.getElementById('Dairy').value ? "Dairy=TRUE&" : "") +
					(document.getElementById('Wheat').value ? "Wheat=TRUE&" : "") +
					(document.getElementById('Vegetarian').value ? "Vegetarian=TRUE&" : "") +
					(document.getElementById('Vegan').value ? "Vegan=TRUE&" : "") +
					(document.getElementById('Egg').value ? "Egg=TRUE&" : "") +
					(document.getElementById('Fish').value ? "Fish=TRUE&" : "") +
					(document.getElementById('Peanut').value ? "Peanut=TRUE&" : "") +
					(document.getElementById('Shellfish').value ? "Shellfish=TRUE&" : "") +
					(document.getElementById('TreeNut').value ? "TreeNut=TRUE&" : "") +
					(document.getElementById('GlutenSensitive').value ? "GlutenSensitive=TRUE&" : "") +
					(document.getElementById('Halal').value ? "Halal=TRUE&" : "") +
					(document.getElementById('Kosher').value ? "Kosher=TRUE&" : "");

				location.href = "localhost/AVIFresher/index.php" + queries;

				return true;
			}
		</script>

		<form onSubmit="return makeURL();">

			<label for="Soy">Soy:</label>
			<input type="checkbox" id="Soy" name="Soy">

			<label for="Dairy">Dairy:</label>
			<input type="checkbox" id="Dairy" name="Dairy">

			<label for="Wheat">Wheat:</label>
			<input type="checkbox" id="Wheat" name="Wheat">

			<label for="Vegetarian">Vegetarian:</label>
			<input type="checkbox" id="Vegetarian" name="Vegetarian">

			<label for="Vegan">Vegan:</label>
			<input type="checkbox" id="Vegan" name="Vegan">

			<label for="Egg">Egg:</label>
			<input type="checkbox" id="Egg" name="Egg">

			<label for="Fish">Fish:</label>
			<input type="checkbox" id="Fish" name="Fish">

			<label for="Peanut">Peanut:</label>
			<input type="checkbox" id="Peanut" name="Peanut">

			<label for="Shellfish">Shellfish:</label>
			<input type="checkbox" id="Shellfish" name="Shellfish">

			<label for="TreeNut">Tree Nut:</label>
			<input type="checkbox" id="TreeNut" name="TreeNut">

			<label for="GlutenSensitive">Gluten Sensitive:</label>
			<input type="checkbox" id="GlutenSensitive" name="GlutenSensitive">

			<label for="Halal">Halal:</label>
			<input type="checkbox" id="Halal" name="Halal">

			<label for="Kosher">Kosher:</label>
			<input type="checkbox" id="Kosher" name="Kosher">

			<input type="submit" value="Go">
		</form>
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
<!-- ======= -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AVI Fresher</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- you can copy the nav tag as is over to other html files to make the navbar function -->
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
    <!-- the following tag links it to the javascript file, make sure you add it to the body of every html file -->
    <script src="app.js"></script>
  </body>
</html>
<!-- >>>>>>> c62b7b58ae0ea2f9ccb6ec7f581907204c583898 -->
