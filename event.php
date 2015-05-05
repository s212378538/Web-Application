<?Php
	
	//get data from createEvent page. 
	require_once('createEvent.php');
	$table ="event";
	$categoryId = $_POST ['select'];
	$title = $_POST['eventTitle'];
	$description = $_POST['eventDesc'];
	$date = $_POST['dateTime'];
	$location = $_POST['location'];
	
	//get categoryID from database.
	if (!isset($categoryId)){
		$categoryId = filter_input(INPUT_GET,'categoryId',FILTER_VALIDATE_INT);
		if($categoryId == NULL && $categoryId == FALSE){
			$categoryId = 0;
		}else{}
	require_once("dbconn.php");
	}
	//get category name.
	$queryCategory = 'SELECT * FROM category WHERE CategoryID = :categoryId';
	$statement1 = $db->prepare($queryCategory);
	$statement1->bindValue(':categoryId', $categoryId);
	$statement1->execute();
	$category = $statement1->fetch();
	$category_name = $category['CategoryTitle'];
	$statement1->closeCursor();
	
	$inst_Id = filter_input(INPUT_POST,'$id',FILTER_VALIDATE_INT);
	$inst_category = filter_input(INPUT_POST,'EventCategory');
	$inst_title = filter_input(INPUT_POST,'EventTitle');
	$inst_desc = filter_input(INPUT_POST,'EventDescription');
	$inst_date = filter_input(INPUT_POST,'Date_Time');
	$inst_location = filter_input(INPUT_POST,'Venue');
	
	
	//insert data into event table.
	$query ='INSERT INTO $table(EventID,EventCategory,EventTitle,EventDescription,Date_Time,Venue) 
				VALUES(:categoryId,:category_name,:title,:description,:date,:location)';	
				
	$statement = $db->prepare($query);
	$statement->bindValue(':categoryId', '$inst_Id');
	$statement->bindValue(':category_name', '$inst_category');
	$statement->bindValue(':title', $inst_title);
	$statement->bindValue(':description', $inst_desc);
	$statement->bindValue(':date', $inst_date);
	$statement->bindValue(':location', $inst_location);
	$statement->bindValue(':location', $inst_location);
	$statement->execute();
	$statement->closeCursor();
	
	//echo "$category_name,$title, $description, $date, $location";
	?>
<html>
<head>
<title>
Event created
</title>
<link rel="stylesheet"type="text/css" href="homeLayout.css">
</head>
<body>

	<b>Category:</b> <?Php echo $category_name ?><br/>
	<b>Event Title:</b> <?Php echo $title ?><br/>
	<b>Event Description:</b> <?Php echo $description ?><br/>
	<b>Date:</b> <?Php echo $date ?><br/>
	<b>Location:</b><?Php echo $location ?>
</form>
</body>
</html>
