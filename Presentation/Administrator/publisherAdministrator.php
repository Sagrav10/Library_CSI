<?php

//error_reporting(0);
include_once('../../routes.php');

include_once($_SERVER['DOCUMENT_ROOT'] . ROOT_DIRECTORY . ROUTE_DRIVINGS . 'UserDriving.php');

include_once($_SERVER['DOCUMENT_ROOT'] . ROOT_DIRECTORY . ROUTE_PERSISTENCE . 'Connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . ROOT_DIRECTORY . ROUTE_ENTITIES . 'User.php');


$c = Connection::getInstance();
$connection = $c->connectBD();

$userDriving = new UserDriving($connection);
$publishers = $userDriving->listUsersByRol(4);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'img/iconApp.png' ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo NAME_PROJECT ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href=<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'css/bootstrap.min.css' ?> rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'css/animate.min.css' ?>" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'css/light-bootstrap-dashboard.css?v=1.4.0' ?>"
        rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'css/pe-icon-7-stroke.css' ?>" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">

        <!-- Sidebar -->
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . ROOT_DIRECTORY . ROUTE_COMPONENTS . "sidebar.php";
        ?>
        <!-- Sidebar -->


        <div class="main-panel">

            <div class="content">
                <div class="container-fluid ">


                    <br><br>
                    <div class="row centerLarge">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="header">
                                    <h5 class="title">Publicadores</h5>
                                </div>
                                <div class="content table-responsive table-full-width">

                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Documento</th>
                                            <th>Tipo</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Estado</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($publishers as $publisher) {

                                                echo "<tr>";

                                                echo "<td>" . $publisher->getUserId() . "</td>";
                                                echo "<td>" . $publisher->getTypeDocument() . "</td>";
                                                echo "<td>" . $publisher->getName() . "</td>";
                                                echo "<td>" . $publisher->getLastName() . "</td>";
                                                echo "<td>" . $publisher->getStatus() . "</td>";

                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Footer -->
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . ROOT_DIRECTORY . ROUTE_COMPONENTS . "footer.php";
            ?>
            <!-- Footer -->

        </div>
    </div>

</body>

<!--   Core JS Files   -->
<script src="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'js/jquery.3.2.1.min.js' ?>" type="text/javascript">
</script>
<script src="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'js/bootstrap.min.js' ?>" type="text/javascript">
</script>

<!--  Charts Plugin -->
<script src="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'js/chartist.min.js' ?>"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'js/bootstrap-notify.js' ?>"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'js/light-bootstrap-dashboard.js?v=1.4.0' ?>"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="<?php echo ROOT_DIRECTORY . ROUTE_ASSETS . 'js/demo.js' ?>"></script>


</html>