<?php
  require_once "../../userSession.php";
  require_once '../../config_test.php';
  require_once INCLUDES_PATH . '/header_admin.php';

?>
        <div class="content">
            <main>
                <div class="container-fluid">
                  <h2>FAQ</h2>
                  <div class="table-responsive">
                    <table class='table table-light'>
                      <thead>
                        <tr>
                          <th>Asker&#39;s Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Question</th>
                          <th>Answer</th>
                          <th>Approval</th>
                          <th>Update</th>
                          <th>Delete</th>
                          <th>Approve</th>
                          <th>Disapprove</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php
                    include INCLUDES_FAQ_PATH . "/ListFAQ.php";
                    ?>
                    </tbody>
                    </table>
                  </div>
                </div>
            </main>
        </div>
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