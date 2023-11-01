<?php
if (isset($_POST['dias1'])) {
    if ($_POST['dias1'] == 1 || $_POST['dias1'] == 0) {
        $lis1D = "'" . $_POST['dias1'] . "'";
    }
} else if (isset($_SESSION['dias1'])) {
    if ($_SESSION['dias1'] == "vacio") {
        $lis1D = "NULL";
    }
}

if (isset($_POST['dias2'])) {
    if ($_POST['dias2'] == 1 || $_POST['dias2'] == 0) {
        $lis2D = "'" . $_POST['dias2'] . "'";
    }
} else if (isset($_SESSION['dias2'])) {
    if ($_SESSION['dias2'] == "vacio") {
        $lis2D = "NULL";
    }
}

if (isset($_POST['dias3'])) {
    if ($_POST['dias3'] == 1 || $_POST['dias3'] == 0) {
        $lis3D = "'" . $_POST['dias3'] . "'";
    }
} else if (isset($_SESSION['dias3'])) {
    if ($_SESSION['dias3'] == "vacio") {
        $lis3D = "NULL";
    }
}

if (isset($_POST['dias4'])) {
    if ($_POST['dias4'] == 1 || $_POST['dias4'] == 0) {
        $lis4D = "'" . $_POST['dias4'] . "'";
    }
} else if (isset($_SESSION['dias4'])) {
    if ($_SESSION['dias4'] == "vacio") {
        $lis4D = "NULL";
    }
}

if (isset($_POST['dias5'])) {
    if ($_POST['dias5'] == 1 || $_POST['dias5'] == 0) {
        $lis5D = "'" . $_POST['dias5'] . "'";
    }
} else if (isset($_SESSION['dias5'])) {
    if ($_SESSION['dias5'] == "vacio") {
        $lis5D = "NULL";
    }
}

if (isset($_POST['dias6'])) {
    if ($_POST['dias6'] == 1 || $_POST['dias6'] == 0) {
        $lis6D = "'" . $_POST['dias6'] . "'";
    }
} else if (isset($_SESSION['dias6'])) {
    if ($_SESSION['dias6'] == "vacio") {
        $lis6D = "NULL";
    }
}

if (isset($_POST['dias7'])) {
    if ($_POST['dias7'] == 1 || $_POST['dias7'] == 0) {
        $lis7D = "'" . $_POST['dias7'] . "'";
    }
} else if (isset($_SESSION['dias7'])) {
    if ($_SESSION['dias7'] == "vacio") {
        $lis7D = "NULL";
    }
}

if (isset($_POST['dias8'])) {
    if ($_POST['dias8'] == 1 || $_POST['dias8'] == 0) {
        $lis8D = "'" . $_POST['dias8'] . "'";
    }
} else if (isset($_SESSION['dias8'])) {
    if ($_SESSION['dias8'] == "vacio") {
        $lis8D = "NULL";
    }
}

if (isset($_POST['dias9'])) {
    if ($_POST['dias9'] == 1 || $_POST['dias9'] == 0) {
        $lis9D = "'" . $_POST['dias9'] . "'";
    }
} else if (isset($_SESSION['dias9'])) {
    if ($_SESSION['dias9'] == "vacio") {
        $lis9D = "NULL";
    }
}

if (isset($_POST['dias10'])) {
    if ($_POST['dias10'] == 1 || $_POST['dias10'] == 0) {
        $lis10D = "'" . $_POST['dias10'] . "'";
    }
} else if (isset($_SESSION['dias10'])) {
    if ($_SESSION['dias10'] == "vacio") {
        $lis10D = "NULL";
    }
}
