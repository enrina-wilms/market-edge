<?php
	require_once "../../config_test.php";
    require_once MODELS_PATH . '/database.php';
    require_once MODELS_PATH . '/events/event_class.php';
    require_once '../../Validation/validation.php'; 

    if(isset($_POST['update'])){
        $id = $_POST['id'];

        $db = Database::getDb();
        $updEvent = new Event();
        $event = $updEvent->getEventByID($id, $db);

        $title = $event->title;
        $description = $event->description;
        $date = $event->event_date;
        $location =$event->location;
    }



    if(isset($_POST['updevent'])){

        $id = $_POST['eid'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $date = $_POST['event_date'];
        $location = $_POST['location'];

 
        if($title == ""){
            echo "Please Enter a Title";
        }elseif($description == "") {
            echo "Please Enter a Description";
        }elseif($date == "") {
            echo "Please Enter a Date";
        }elseif($location == "") {
            echo "Please Enter a Location";
        }else{
            $db = Database::getDb();
            $updEvent = new Event();
            $count = $updEvent->updateEvent($id, $title, $description, $image, 
                $date, $location, $db);

            if($count){
                header("Location: eventsAdmin.php");
                
            }
            exit;
        }
        
    }

?>
<?php
  require_once "../../userSession.php";
  require_once '../../config_test.php';
  require_once INCLUDES_PATH . '/header_admin.php';

?>

<form action="" method="post" id="eventUpdate">
    <h2>Update</h2>
    <input type="hidden" name="eid" value="<?= $event->id; ?>" />
        <div id="eventForm">

            <div id="eventtitle">
                <label for="title">Event Title:</label>
                <input type="text" id="title" name="title" value=
                "<?=$event->title; ?>" /><br/>
            </div>
            <div id="eventDescription">
                <label for="description">Event Description:</label>
                <input type="text" id="description" name="description" value=
                "<?=$event->description; ?>" /><br/>
            </div>
            <div id="eventImage">
                <label for="image">Image Pathway:</label>
                <input type="text" id="image" name="image" value=
                "<?=$event->image; ?>"/><br/> 
            </div>
            <div id="eveDate">
                <label for="event_date">Event Date:</label>
                <input type="text" id="event_date" name="event_date" value=
                "<?=$event->event_date; ?>" /><br/>
            </div>
            <div id="eveLoca">
                <label for="location">Event Location:</label>
                <input type="text" id="location" name="location" value=
                "<?=$event->location; ?>" /><br/>
            </div>
                <input type="submit" name="updevent" value="update event" id="eveSubmit">
        </div>
</form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery.slimscroll.min.js"></script>
    <script src="../../js/trial.js"></script>
</body>

</html>	
