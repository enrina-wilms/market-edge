<?php
  require_once "../../userSession.php"; //session variables weren't working right for my features, we weren't sure why 

  require_once '../../config_test.php';
  require_once INCLUDES_PATH . '/header_admin.php';

?>
      <div class="content">
        <main>
          <div class="container-fluid">
            <h2>Event</h2>
            <div class="table-responsive">
              <table class='table table-light'>
                <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>Event Description</th>
                    <th>Event Image Pathway</th>
                    <th>Event Date</th>
                    <th>Event Location</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include INCLUDES_EVENTS_PATH .  '/listEvent.php';
                  ?>
                </tbody>
              </table>
            </div>
                <?php
                  include INCLUDES_EVENTS_PATH . '/addEvent.php';
                ?>
            </div>
          </main>
      </div>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery.slimscroll.min.js"></script>
    <script src="../../js/trial.js"></script>
  </body>

</html>



  