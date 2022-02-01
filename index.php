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
	$Tree_Nut = (isset($_GET['Tree_Nut']) ? $_GET['Tree_Nut'] : FALSE);
	$Gluten_Sensitive = (isset($_GET['Gluten_Sensitive']) ? $_GET['Gluten_Sensitive'] : FALSE);
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
	if($Vegetarian) $sql .= ' and Vegetarian != 0';
	if($Vegan) $sql .= ' and Vegan != 0';
	if($Egg) $sql .= ' and Egg != 1';
	if($Fish) $sql .= ' and Fish != 1';
	if($Peanut) $sql .= ' and Peanut != 1';
	if($Sesame) $sql .= ' and Sesame != 1';
	if($Shellfish) $sql .= ' and Shellfish != 1';
	if($Tree_Nut) $sql .= ' and Tree_Nut != 1';
	if($Gluten_Sensitive) $sql .= ' and Gluten_Sensitive != 1';
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
					(document.getElementById('Soy').value ? "Soy=on&" : "") +
					(document.getElementById('Dairy').value ? "Dairy=on&" : "") +
					(document.getElementById('Wheat').value ? "Wheat=on&" : "") +
					(document.getElementById('Vegetarian').value ? "Vegetarian=on&" : "") +
					(document.getElementById('Vegan').value ? "Vegan=on&" : "") +
					(document.getElementById('Egg').value ? "Egg=on&" : "") +
					(document.getElementById('Fish').value ? "Fish=on&" : "") +
					(document.getElementById('Peanut').value ? "Peanut=on&" : "") +
					(document.getElementById('Shellfish').value ? "Shellfish=on&" : "") +
					(document.getElementById('TreeNut').value ? "Tree_Nut=on&" : "") +
					(document.getElementById('GlutenSensitive').value ? "Gluten_Sensitive=on&" : "") +
					(document.getElementById('Halal').value ? "Halal=on&" : "") +
					(document.getElementById('Kosher').value ? "Kosher=on&" : "") + 

					"Sort=" + (document.getElemenyById('Sort')).value;

				location.href = "localhost/AVIFresher/index.php" + queries;

				return true;
			}
		</script>

		<form onSubmit="return makeURL();">

			<label for="Soy">Soy:</label>
			<input type="checkbox" id="Soy" name="Soy" <?php if($Soy) {echo "checked='checked'";} ?>>

			<label for="Dairy">Dairy:</label>
			<input type="checkbox" id="Dairy" name="Dairy" <?php if($Dairy) {echo "checked='checked'";} ?>>

			<label for="Wheat">Wheat:</label>
			<input type="checkbox" id="Wheat" name="Wheat" <?php if($Wheat) {echo "checked='checked'";} ?>>

			<label for="Vegetarian">Vegetarian:</label>
			<input type="checkbox" id="Vegetarian" name="Vegetarian" <?php if($Vegetarian) {echo "checked='checked'";} ?>>

			<label for="Vegan">Vegan:</label>
			<input type="checkbox" id="Vegan" name="Vegan" <?php if($Vegan) {echo "checked='checked'";} ?>>

			<label for="Egg">Egg:</label>
			<input type="checkbox" id="Egg" name="Egg" <?php if($Egg) {echo "checked='checked'";} ?>>

			<label for="Fish">Fish:</label>
			<input type="checkbox" id="Fish" name="Fish" <?php if($Fish) {echo "checked='checked'";} ?>>

			<label for="Peanut">Peanut:</label>
			<input type="checkbox" id="Peanut" name="Peanut" <?php if($Peanut) {echo "checked='checked'";} ?>>

			<label for="Shellfish">Shellfish:</label>
			<input type="checkbox" id="Shellfish" name="Shellfish" <?php if($Shellfish) {echo "checked='checked'";} ?>>

			<label for="Tree_Nut">Tree Nut:</label>
			<input type="checkbox" id="Tree_Nut" name="Tree_Nut" <?php if($Tree_Nut) {echo "checked='checked'";} ?>>

			<label for="Gluten_Sensitive">Gluten Sensitive:</label>
			<input type="checkbox" id="Gluten_Sensitive" name="Gluten_Sensitive" <?php if($Gluten_Sensitive) {echo "checked='checked'";} ?>>

			<label for="Halal">Halal:</label>
			<input type="checkbox" id="Halal" name="Halal" <?php if($Halal) {echo "checked='checked'";} ?>>

			<label for="Kosher">Kosher:</label>
			<input type="checkbox" id="Kosher" name="Kosher" <?php if($Kosher) {echo "checked='checked'";} ?>>

			<label for="Sort">Sort by:</label>
			<select name = "Sort">
				<option value="Name" <?php if($Sort == "Name") {echo "selected";} ?>>Name</option>
				<option value="Calories" <?php if($Sort == "Calories") {echo "selected";} ?>>Calories</option>
				<option value="Total_Fat" <?php if($Sort == "Total_Fat") {echo "selected";} ?>>Total Fat</option>
				<option value="Saturated_Fat" <?php if($Sort == "Saturated_Fat") {echo "selected";} ?>>Saturated Fat</option>
				<option value="Trans_Fat" <?php if($Sort == "Trans_Fat") {echo "selected";} ?>>Trans Fat</option>
				<option value="Cholesterol" <?php if($Sort == "Cholestrol") {echo "selected";} ?>>Cholesterol</option>
				<option value="Sodium" <?php if($Sort == "Sodium") {echo "selected";} ?>>Sodium</option>
				<option value="Total_Carbohydrate" <?php if($Sort == "Total_Carbohydrate") {echo "selected";} ?>>Total Carbohydrate</option>
				<option value="Dietary_Fiber" <?php if($Sort == "Dietary_Fiber") {echo "selected";} ?>>Dietary Fiber</option>
				<option value="Total_Sugar" <?php if($Sort == "Total_Sugar") {echo "selected";} ?>>Total Sugar</option>
				<option value="Added_Sugar" <?php if($Sort == "Added_Sugar") {echo "selected";} ?>>Added Sugar</option>
				<option value="Protein" <?php if($Sort == "Protein") {echo "selected";} ?>>Protein</option>
			</select>

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
