<?php
  require_once "../../config_test.php";
  require_once MODELS_PATH . '/database.php';
  require_once MODELS_PATH. '/events/event_class.php';
  require_once '../../Validation/validation.php'; 

  $titleErr = "";
  $descErr = "";
  $dateErr = "";
  $locaErr = "";
  $isValid = true;


  $title = $description = $date = $location = "";
  if(isset($_POST['addevent'])){

      $title = $_POST['title'];
      $description = $_POST['description'];
      $image = $_POST['image']; //This can be Null
      $date = $_POST['event_date'];
      $location = $_POST['location'];

      if(checkEmpty($title)){
          $titleErr = " Please Enter the Event Title";
          $isValid = false;
        }
      if(checkEmpty($description)){
          $descErr = " Please Enter the Event Description";
          $isValid = false;
        }
      if(checkEmpty($date)){
          $dateErr = " Please Enter the Event Date";
          $isValid = false;
      }
      if(checkEmpty($location)){
          $locaErr = " Please Enter the Event Location";
          $isValid = false;
        }

      if($isValid === true){

        $db = Database::getDb();
        $addEvent = new Event();
        $count = $addEvent->addEvent($title, $description, $image, $date, $location, $db);

        if($count){
            echo "<p class='eventSuccess'> Added Event <p>";
        }
    }  

  }

?>

<form action="" method="post">
  <div id="eventForm">

    <div id="eventtitle">
      <label for="title">Event Title:</label>
      <input type="text" id="title" name="title" /><br/>
        <span id="titleErr" style="color:red;">
          <?php
              if(isset($titleErr)) {
                  echo $titleErr;
                          }
          ?>
        </span>
    </div>
    <div id="eventDescription">
      <label for="description">Event Description:</label>
      <input type="text" id="description" name="description" /><br/>
      <span id="descErr" style="color:red;">
          <?php
              if(isset($descErr)) {
                  echo $descErr;
                          }
          ?>
        </span>
    </div>
    <div id="eventImage">
      <label for="image">Image Pathway:</label>
      <input type="text" id="image" name="image" /><br/>
    </div>
    <div id="date">
      <label for="event_date">Event Date:</label>
      <input type="text" id="event_date" name="event_date" /><br/>
      <span id="dateErr" style="color:red;">
        <?php
            if(isset($dateErr)) {
                echo $dateErr;
                        }
        ?>
      </span> 
    </div>
    <div id="loca">
      <label for="location">Event Location:</label>
      <input type="text" id="location" name="location" /><br/>
      <span id="locaErr" style="color:red;">
          <?php
              if(isset($locaErr)) {
                  echo $locaErr;
                          }
          ?>
        </span> 
    </div>
      <input type="submit" name="addevent" value="Add Event" id="submit">
  </div>
</form>
