<?php
include_once("../lib/torm/torm.php");
include_once("./DB/DB.php");
DB::connect();
include_once("./models/TodoList.php");

$method = $_SERVER['REQUEST_METHOD'];
$entityBody = json_decode(file_get_contents('php://input'), true);
$response = new stdClass();

switch ($method) {
    case "GET":
        //$response->method = "LIST";
        $response = array();
        $param = null;
        if (isset($_GET['id'])) $param = array("id" => intval($_GET['id']));
        $data = TodoList::where($param)->order("position ASC");
        foreach ($data as $item) {
            $response[] = $item->getData();
        }
        break;
    case "PUT":
        if (isset($_GET['id'])) $entityBody['id'] = intval($_GET['id']);
        //$response->method = "CHANGE";
        $response->updated = TodoList::factory($entityBody);
        break;
    case "POST":
        //$response->method = "SAVE";
        if (isset($entityBody['title'])) {
            $response->created = TodoList::factory($entityBody);
        } else {
            $response = array();
            for($i=0;$i<sizeof($entityBody); $i++){
                $response[$i] = new stdClass();
                $response[$i]->created = TodoList::factory($entityBody[$i]);
            }
        }
        break;

    case "DELETE":
        if (isset($_GET['id'])) {
            $response->removed = TodoList::where(array('id'=>intval($_GET['id'])))->destroy();
        }
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        exit();
        break;
}

header("Content-type: application/json");
echo json_encode($response);
exit();

?>