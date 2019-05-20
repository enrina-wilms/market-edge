<?php
	require_once '../../config_test.php';
    require_once "../../userSession.php";
    include "../header.php";
    
?>

    <main id="faq_main">

         <div id="faq_intro">
            <h1>FAQ</h1>
            
            <ul class="list-group">
                <?php
                    include INCLUDES_FAQ_PATH .  "/ListFAQapproved.php";
                ?>
            </ul>
            <h3>Have a Question You want to See in the FAQ?</h3>
            <p>Submit it Here!</p>
        </div>

        <?php
        include INCLUDES_FAQ_PATH . "/addFAQ.php";
        ?>

    </main>
    <?php
    include "../footer.php";
    ?>