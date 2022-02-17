<?php
	//List of meal strings in sql
	$mealsSQL = array(
		"monday_breakfast",
		"monday_lunch",
		"monday_dinner",
		"tuesday_breakfast",
		"tuesday_lunch",
		"tuesday_dinner",
		"wednesday_breakfast",
		"wednesday_lunch",
		"wednesday_dinner",
		"thursday_breakfast",
		"thursday_lunch",
		"thursday_dinner",
		"friday_breakfast",
		"friday_lunch",
		"friday_dinner",
		"saturday_breakfast",
		"saturday_lunch",
		"saturday_dinner",
		"sunday_breakfast",
		"sunday_lunch",
		"sunday_dinner"
	);
	//List of meal strings as they should be printed
	$mealsStrings = array(
		"MONDAY BREAKFAST",
		"MONDAY LUNCH",
		"MONDAY DINNER",
		"TUESDAY BREAKFAST",
		"TUESDAY LUNCH",
		"TUESDAY DINNER",
		"WEDNESDAY BREAKFAST",
		"WEDNESDAY LUNCH",
		"WEDNESDAY DINNER",
		"THURSDAY BREAKFAST",
		"THURSDAY LUNCH",
		"THURSDAY DINNER",
		"FRIDAY BREAKFAST",
		"FRIDAY LUNCH",
		"FRIDAY DINNER",
		"SATURDAY BREAKFAST",
		"SATURDAY LUNCH",
		"SATURDAY DINNER",
		"SUNDAY BREAKFAST",
		"SUNDAY LUNCH",
		"SUNDAY DINNER"
	);

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

	//Set $Meal to be the string of the meal
	if(isset($_GET['Meal'])) {$Meal = $_GET['Meal'];}
	else {
		date_default_timezone_set('America/New_York');

		$Date = date("l");
		if($Date == "Monday") {$Meal = 0;}
		if($Date == "Tuesday") {$Meal = 3;}
		if($Date == "Wednesday") {$Meal = 6;}
		if($Date == "Thursday") {$Meal = 9;}
		if($Date == "Friday") {$Meal = 12;}
		if($Date == "Saturday") {$Meal = 15;}
		if($Date == "Sunday") {$Meal = 18;}


		$Time = (int) date("H");
		//If time is after noon, switch to lunch
		if($Time > 12) $Meal+=1;
		//If time is after 5PM, switch to dinner
		if($Time > 17) $Meal+=1;
		//If time is after 8PM, switch to breakfast of the next day
		if($Time > 20) $Meal = ($Meal + 1) % 21;
	}

	//Connect to database
	//$conn = mysqli_connect('localhost', 'AVIFresher', 'AVIIFresh42069', 'stevenson');
	$conn = mysqli_connect("35.232.237.179", "avifresher", "avifreshsucks42069", "avifresher");

	//Check connection
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

	//Write query for items
	$sql = 'SELECT * FROM stevenson WHERE ' . $mealsSQL[$Meal] . ' != 0';
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
	$sql .= ' ORDER BY station, ' . $Sort . ($Sort != 'name' ? " DESC" : "");
	
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
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title> AVI Fresher</title>
	<link rel="stylesheet" href="styles.css" />
</head>
<body>
	<!-- you can copy the nav tag as is over to other html files to make the navbar function -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="index.php" id="navbar__logo">Avi Fresher</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span> 
                <span class="bar"></span>
                <span class="bar"></span>
            </div> 
            <ul class="navbar__menu">
                <li class="navbar__item"> 
                    <a href="index.php" class="navbar__links">Home</a>
                </li>
                
                <li class="navbar__item"> 
                    <a href="menu.php" class="navbar__links">Menu</a>  
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
    <!-- Here is where the actual menu begins-->

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

		<form class="premenu" onSubmit="return makeURL();">

			<h3 class="normal"> Exclude any with:</h3>
			<div>
			<label for="Soy" class = "label__container">Soy:</label>
			<input type="checkbox" id="Soy" name="Soy" <?php if($Soy) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Dairy" class = "label__container">Dairy:</label>
			<input type="checkbox" id="Dairy" name="Dairy" <?php if($Dairy) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Wheat" class = "label__container">Wheat:</label>
			<input type="checkbox" id="Wheat" name="Wheat" <?php if($Wheat) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Egg" class = "label__container">Egg:</label>
			<input type="checkbox" id="Egg" name="Egg" <?php if($Egg) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Fish" class = "label__container">Fish:</label>
			<input type="checkbox" id="Fish" name="Fish" <?php if($Fish) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Peanut" class = "label__container">Peanut:</label>
			<input type="checkbox" id="Peanut" name="Peanut" <?php if($Peanut) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Shellfish"class = "label__container" >Shellfish:</label>
			<input type="checkbox" id="Shellfish" name="Shellfish" <?php if($Shellfish) {echo "checked='checked'";} ?>>
			</div>
			
			<div>
			<label for="Tree_Nut" class = "label__container">Tree Nut:</label>
			<input type="checkbox" id="Tree_Nut" name="Tree_Nut" <?php if($Tree_Nut) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Gluten_Sensitive" class = "label__container">Gluten Sensitive:</label>
			<input type="checkbox" id="Gluten_Sensitive" name="Gluten_Sensitive" <?php if($Gluten_Sensitive) {echo "checked='checked'";} ?>>
			</div>
			
			<h3 class="normal">Include any with:</h3>
			<div>
			<label for="Vegetarian" class = "label__container">Vegetarian:</label>
			<input type="checkbox" id="Vegetarian" name="Vegetarian" <?php if($Vegetarian) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Vegan" class = "label__container">Vegan:</label>
			<input type="checkbox" id="Vegan" name="Vegan" <?php if($Vegan) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Halal" class = "label__container">Halal:</label>
			<input type="checkbox" id="Halal" name="Halal" <?php if($Halal) {echo "checked='checked'";} ?>>
			</div>

			<div>
			<label for="Kosher" class = "label__container">Kosher:</label>
			<input type="checkbox" id="Kosher" name="Kosher" <?php if($Kosher) {echo "checked='checked'";} ?>>
			</div>

			<br><br>

			<label for="Sort" class="sort__label">Sort by (decreasing):</label>
			<select name="Sort">
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

			<br>
			<label for="Meal">Meal:</label>
			<select name="Meal">
				<option value=0 <?php if($Meal == 0) {echo "selected";} ?>>Monday Breakfast</option>
				<option value=1 <?php if($Meal == 1) {echo "selected";} ?>>Monday Lunch</option>
				<option value=2 <?php if($Meal == 2) {echo "selected";} ?>>Monday Dinner</option>
				<option value=3 <?php if($Meal == 3) {echo "selected";} ?>>Tuesday Breakfast</option>
				<option value=4 <?php if($Meal == 4) {echo "selected";} ?>>Tuesday Lunch</option>
				<option value=5 <?php if($Meal == 5) {echo "selected";} ?>>Tuesday Dinner</option>
				<option value=6 <?php if($Meal == 6) {echo "selected";} ?>>Wednesday Breakfast</option>
				<option value=7 <?php if($Meal == 7) {echo "selected";} ?>>Wednesday Lunch</option>
				<option value=8 <?php if($Meal == 8) {echo "selected";} ?>>Wednesday Dinner</option>
				<option value=9 <?php if($Meal == 9) {echo "selected";} ?>>Thursday Breakfast</option>
				<option value=10 <?php if($Meal == 10) {echo "selected";} ?>>Thursday Lunch</option>
				<option value=11 <?php if($Meal == 11) {echo "selected";} ?>>Thursday Dinner</option>
				<option value=12 <?php if($Meal == 12) {echo "selected";} ?>>Friday Breakfast</option>
				<option value=13 <?php if($Meal == 13) {echo "selected";} ?>>Friday Lunch</option>
				<option value=14 <?php if($Meal == 14) {echo "selected";} ?>>Friday Dinner</option>
				<option value=15 <?php if($Meal == 15) {echo "selected";} ?>>Saturday Breakfast</option>
				<option value=16 <?php if($Meal == 16) {echo "selected";} ?>>Saturday Lunch</option>
				<option value=17 <?php if($Meal == 17) {echo "selected";} ?>>Saturday Dinner</option>
				<option value=18 <?php if($Meal == 18) {echo "selected";} ?>>Sunday Breakfast</option>
				<option value=19 <?php if($Meal == 19) {echo "selected";} ?>>Sunday Lunch</option>
				<option value=20 <?php if($Meal == 20) {echo "selected";} ?>>Sunday Dinner</option>
			</select>

			<input type="submit" value="Go">
		</form>
	</div>

	<h1 class="normal"><?php echo($mealsStrings[$Meal]); ?> MENU</h1>

	<div>
		<?php 
			$currentStation = "";
			foreach($food_items as $item){ 
				if($item['station'] != $currentStation) {
					echo('<h2 class="station">'.$item['station'].'</h2>');
					$currentStation = $item['station'];
				}
				?>
			<!-- Name of each dish -->
			<div class="food__item">
			<p class="menu"> <?php echo htmlspecialchars($item['Name']); ?></p>

			<!--Allergen tags-->
			<table class="center">
				<tr>
					<?php if($item['Soy']) {echo '<th><img src="images/Soy.png" width="30" height="30" alt="Contains soy" id="main__img"></th>';} ?>
					<?php if($item['Dairy']) {echo '<th><img src="images/Milk.png" width="30" height="30" alt="Contains milk" id="main__img"></th>';} ?>
					<?php if($item['Wheat']) {echo '<th><img src="images/Wheat.png" width="30" height="30" alt="Contains wheat" id="main__img"></th>';} ?>
					<?php if($item['Vegetarian']) {echo '<th><img src="images/Vegetarian.png" width="30" height="30" alt="Vegetarian" id="main__img"></th>';} ?>
					<?php if($item['Vegan']) {echo '<th><img src="images/Vegan.png" width="30" height="30" alt="Vegan" id="main__img"></th>';} ?>
					<?php if($item['Egg']) {echo '<th><img src="images/Egg.png" width="30" height="30" alt="Contains egg" id="main__img"></th>';} ?>
					<?php if($item['Fish']) {echo '<th><img src="images/Fish.png" width="30" height="30" alt="Contains fish" id="main__img"></th>';} ?>
					<?php if($item['Peanut']) {echo '<th><img src="images/Peanut.png" width="30" height="30" alt="Contains peanuts" id="main__img"></th>';} ?>
					<?php if($item['Shellfish']) {echo '<th><img src="images/Shellfish.png" width="30" height="30" alt="Contains shellfish" id="main__img"></th>';} ?>
					<?php if($item['Tree_Nut']) {echo '<th><img src="images/Tree_Nut.png" width="30" height="30" alt="Contains tree nuts" id="main__img"></th>';} ?>
					<?php if($item['Gluten_Sensitive']) {echo '<th><img src="images/Gluten_Sensitive.png" width="30" height="30" alt="Contains gluten" id="main__img"></th>';} ?>
					<?php if($item['Halal']) {echo '<th><img src="images/Halal.png" alt="Halal" width="30" height="30" id="main__img"></th>';} ?>
					<?php if($item['Kosher']) {echo '<th><img src="images/Kosher.png" width="30" height="30" alt="Kosher" id="main__img"></th>';} ?>
				</tr>
			</table>

			<!--Nutritional information-->
			<button type="button" class="collapsible">Nutritional Information</button>
            <div class="content">
              <table border=1 frame=void rules=rows style="width:45px">
                <tr>
                  <td><p>Calories</p></td>
                  <td><p><?php echo($item['Calories']);?></p></td>
                </tr>
                <tr>
                  <td><p>Total Fat</p></td>
                  <td><p><?php echo($item['Total_Fat']);?>g</p></td>
                </tr>
                <tr>
                  <td><p>Saturated Fat</p></td>
                  <td><p><?php echo($item['Saturated_Fat']);?>g</p></td>
                </tr>
                <tr>
                  <td><p>Trans Fat</p></td>
                  <td><p><?php echo($item['Trans_Fat']);?>g</p></td>
                </tr>
                <tr>
                  <td><p>Cholesterol</p></td>
                  <td><p><?php echo($item['Cholesterol']);?>g</p></td>
                </tr>
                <tr>
                  <td><p>Sodium</p></td>
                  <td><p><?php echo($item['Sodium']);?>mg</p></td>
                </tr>
                <tr>
                  <td><p>Total Carbohydrates</p></td>
                  <td><p><?php echo($item['Total_Carbohydrate']);?>g</p></td>
                </tr>
                <tr>
                  <td><p>Dietary Fiber</p></td>
                  <td><p><?php echo($item['Dietary_Fiber']);?>g</p></td>
                </tr>
                <tr>
                  <td><p>Total Sugar</p></td>
                  <td><p><?php echo($item['Total_Sugar']);?>g</p></td>
                </tr>
                <tr>
                  <td><p>Added Sugar</p></td>
                  <td><p><?php echo($item['Added_Sugar']);?>g</p></td>
                </tr>
                <tr>
                  <td><p>Protein</p></td>
                  <td><p><?php echo($item['Protein']);?>g</p></td>
                </tr>
              </table>
			</div>
          </div>
		<?php } ?>
	</div>
	<!-- the following tag links it to the javascript file, make sure you add it to the body of every html file -->
    <script src="app.js"></script>
</body>
</html>