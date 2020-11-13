<html>
<head>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css"/>

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>
</head>
<body>
<form class="uk-flex">
    <input class="uk-input" name="search">
    <button class="uk-button uk-button-primary">Search</button>
</form>
<?php
include "service/data.php";
include "controller/home.php";

if (isset($_POST["bearer"])) {
    setcookie("bearer", $_POST["bearer"]);
    header("");
}

if (!isset($_COOKIE["bearer"]) && !isset($_POST["bearer"])) {
    homeController::bearer();
    die();
}

if (isset($_GET["albumId"])) {
    homeController::album($_GET["albumId"]);
} elseif (isset($_GET["downloadTrackId"])) {
    $dataService = new data();
    $dataService->downloadTrack($_GET["downloadTrackId"]);
} elseif (isset($_GET["search"])) {
    homeController::search($_GET["search"]);
} elseif (isset($_GET["artistId"])) {
    homeController::artist($_GET["artistId"]);

} else {
    homeController::artists();
}
?>
</body>
</html>
