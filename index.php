<?php

	//Connect to database
	$conn = mysqli_connect('localhost', 'AVIFresher', 'AVIIFresh42069', 'stevenson');

	//Check connection
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

	//Write query for items
	$sql = 'SELECT name, calories FROM food_items';

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
<html>
<head>
	<title>AVI Fresher or whatever</title>
</head>
<body>
	<h1>AVI Fresh SUCKS</h1>
	<div>
		<?php foreach($food_items as $item){ ?>
			<div>
				<?php echo htmlspecialchars($item['name'] . ' - ' . $item['calories']) . ' Calories' ?>
			</div>
		<?php } ?>
	</div>
</body>
</html>