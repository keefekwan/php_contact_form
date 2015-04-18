<?php require_once 'validate.php'; ?>

    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">

    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 emailForm">
                <h1>Contact Form</h1>
                <?php
                    //echo $result;

                    // If session error is set and not empty display it
                    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                        print_r($_SESSION['error']);
                    }
                ?>
                <!-- If using sessions is not necessary -->
                <!-- Change form action from "validate.php" to "contact.php" -->
                <!-- Remove session_start and session code from validate.php -->
                <!-- And remove session error and uncomment out echo $result -->
                <form action="validate.php" method="POST" novalidate>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" name="comment" required></textarea>
                    </div>

                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit">
                </form>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
    </body>
    </html>

<?php
    // Unset the session error
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        unset($_SESSION['error']);
    }
?>