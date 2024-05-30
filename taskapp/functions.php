<?php
include_once './db-config.php';

$action = isset($_REQUEST['action']) && !empty($_REQUEST['action']) ? $_REQUEST['action'] : "";

if (!empty($action)) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($action == 'load_users') {
            $sql = "SELECT * from users";
            $result = $mysqli->query($sql);
            $usersData = $result->fetch_all(MYSQLI_ASSOC);
            json(1, "users data", $usersData);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($action == 'save_users') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $designation = $_POST['designation'];
            if ($name != null && $email != null && $designation != null) {
                $sql = "INSERT INTO users (name, email, designation) VALUES (?, ?, ?)";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sss", $name, $email, $designation);
                if ($stmt->execute()) {
                    json(1, 'User saved successfully!');
                } else {
                    json(0, 'Error while saving user!');
                }
            }
        }
    }
}

function json($status, $message, $data = array())
{
    print_r(json_encode(array(
        "status" => $status,
        "message" => $message,
        "data" => $data
    )));
}
