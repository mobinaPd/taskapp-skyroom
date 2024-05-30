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
        }elseif($action == 'get_user'){
            $userId = $_GET['user_id'];
            if($userId > 0){
                $sql = "SELECT * FROM users WHERE id = ?";
                if($stmt = $mysqli->prepare($sql)){
                    $stmt->bind_param("i",$userId);
                    if($stmt->execute()){
                        $result = $stmt->get_result();
                        $userData = $result->fetch_array(MYSQLI_ASSOC);
                        json(1, "User found!", $userData);
                    }
                }
            }else{
                json(0, "please pass user id");
            }
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
        }elseif($action == 'update_users'){
            $id = $_POST['edit-id'];
            $name = $_POST['edit-name'];
            $email = $_POST['edit-email'];
            $designation = $_POST['edit-designation'];
            $sql = "UPDATE users SET name = ?, email=?, designation= ? WHERE id = ?";
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("sssi", $name, $email, $designation, $id);
                if($stmt->execute()){
                    json(1,"User updated successfully!");
                }else{
                    json(0,"Failed to update user!");
                }
            }
            // print_r($_POST);
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
