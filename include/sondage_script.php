<?php

$host = 'localhost';
$user = 'root';
$password = 'mangos';
$database = 'ecostat_req';

$mysqli = new mysqli($host, $user, $password, $database);

if (!$mysqli) {
    echo "Error in DB Connection";
}

$mysqli->select_db($database);
?>

<?php

// Restriction IP (pas terminé)
function get_ip() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}

// END Restriction IP
//===================================================//


if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {


        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $insertSQL = sprintf("INSERT INTO poll (id, question) VALUES (%s, %s)", GetSQLValueString($_POST['id'], "int"), GetSQLValueString($_POST['Poll'], "text"));

    $Result1 = $mysqli->query($insertSQL);

    $insertGoTo = "results.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
}

$colname_rs_vote = "-1";
if (isset($_GET['recordID'])) {
    $colname_rs_vote = $_GET['recordID'];
}
$query_rs_vote = sprintf("SELECT * FROM poll WHERE id = %s", GetSQLValueString($colname_rs_vote, "int"));
$rs_vote = $mysqli->query($query_rs_vote);
$row_rs_vote = $rs_vote->fetch_assoc();
$totalRows_rs_vote = $rs_vote->num_rows;
?>
