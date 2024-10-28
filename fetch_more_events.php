<?php
// fetch_more_events.php



 include 'classes/Crud.php';
 $crud = new Crud();
 date_default_timezone_set("Asia/Kolkata");
 $today = date("Y-m-d");
 $time = date("H:i:s");

error_reporting(E_ALL);
ini_set('display_errors', 1);


$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 4;

// Fetch upcoming events with offset and limit
$more_event = $crud->Read("events", "`1 ORDER BY events_id DESC LIMIT $offset,$limit");

echo json_encode($more_event);
?>

