<?php
    session_start();
    require "assets/functions/functionBackOffice.php";
    if ($_SESSION["rang"] == 3) {
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>User Manager</title>
        <link rel="stylesheet" href="assets/styles/index.css">
        <link rel="stylesheet" href="assets/styles/userManager.css">
        <link href="assets/fonts/Storybook.ttf" rel="stylesheet" as="font" type="font/Storybook">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://kit.fontawesome.com/22f907c278.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('.falabdd').DataTable({});
            });
        </script>
        <link rel="shortcut icon" href="assets/icons/smallLogo.PNG">
    </head>

    <body>
        <?php
            require "header.php";
            
        ?>
        <div id="backOfficeContener" class="content">
            <div id="backOfficeHead">
                <div class="headPersoPageBar2"></div>
                <div class="nextPrevTrack">
                    <a href="Sendxml.php">
                        <img src="assets/icons/prevTrack.png" height="37px">
                    </a>
                    <div class="actualTrackAblum">
                        <div class="actualTrack">GESTION DES UTILISATEURS</div>
                    </div>
                    <a href="addNews.php">
                        <img src="assets/icons/nextTrack.png" height="37px">
                    </a>
                </div>
            </div>
            <form action="assets/functions/returnUserManager.php" method="POST">
                <div class="container mb-3 mt-3">
                    <table class="table table-striped table-bordered falabdd" style="width: 100%" border: medium solid #000000;width: 50%;>
                        <thead>
                            <tr>
                                <th rowspan="1" colspan="1" aria-sort="ascending" style="width: 133px;">Username</th>
                                <th rowspan="1" colspan="1" aria-sort="ascending" style="width: 133px;">Nom-Prénom</th>
                                <th rowspan="1" colspan="1" aria-sort="ascending" style="width: 133px;">Email</th>
                                <th rowspan="1" colspan="1" aria-sort="ascending" style="width: 133px;">Date d'inscription</th>
                                <th rowspan="1" colspan="1" aria-sort="ascending" style="width: 133px;">Verifier</th>
                                <th rowspan="1" colspan="1" aria-sort="ascending" style="width: 133px;">Rang</th>
                                <th rowspan="1" colspan="1" aria-sort="ascending" style="width: 133px;"></th>
                                <th rowspan="1" colspan="1" aria-sort="ascending" style="width: 133px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                getAllUsers(); 
                            ?>
                        </tbody>
                        <tfoot>
                            <th>Username</th>
                            <th>Nom-Prénom</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                            <th>Verifier</th>
                            <th>Rang</th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>
                </table>
                <input type="submit" name="validation" value="Modifier tout" id="backOfficeValide">
            </form>
        </div>
        <?php 
            require "footer.php"; 
        ?>
    </body>
</html>
<?php
    }else{
        header("location:noAutho.php");
    }
?>