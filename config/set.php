<?php
require('autoload.php');
// Executes the function specified in 'data' key from POST request
if (isset($_POST['data']) && !empty($_POST['data'])) {
    $_POST['data']($mail); // Ensure 'data' contains a valid callable function name
}

// Handle GET requests: Check if 'data' parameter exists and is not empty
// Executes the function specified in 'data' key from GET request
if (isset($_GET['data']) && !empty($_GET['data'])) {
    $_GET['data'](); // Ensure 'data' contains a valid callable function name
}
function login()
{
    global $action;
    $user_email = $action->db->setPostRequiredField('user_email', 'Email is required.');
    $user_pass = $action->db->setPostRequiredField('user_pass', 'Password is required.');
    $res = $action->db->employeeLogin($user_email, sha1($user_pass));
    if (!$res) {
        http_response_code(401);
        echo $action->db->json(401, "Invalid credentials.");
        return;
    }
    $action->session->set("admin_id", $res['id']);
    http_response_code(200);
    echo $action->db->json(200, "Login successful.");
    return;
}
function logout()
{
    global $action;
    $action->session->delete('admin_id');
    if (!$action->session->get('admin_id')) {
        echo 1;
        return;
    }
    echo 2;
}
function save_warehouse()
{
    global $action;
    $warehouse_name = $action->db->setPostRequiredField('warehouse_name', 'Warehouse name is required.');
    $updateid = $action->db->validatePostData('updateid') ?: null;
    $checkExist = $action->db->sql("SELECT id FROM aimo_warehouse WHERE wtitle = '{$warehouse_name}'");
    if ($checkExist && (!$updateid || $checkExist[0]['id'] != $updateid)) {
        http_response_code(400);
        echo $action->db->json(400, "Warehouse name already exists.", 'warehouse_name');
        return;
    }
    $data = [
        'wtitle' => $warehouse_name
    ];
    if (!$updateid) {
        $res = $action->db->insert('aimo_warehouse', $data);
        $msg = "Warehouse added successfully.";
    } else {
        $res = $action->db->update('aimo_warehouse', " id = {$updateid}", $data);
        $msg = "Warehouse updated successfully.";
    }
    if (!$res) {
        http_response_code(500);
        echo $action->db->json(500, "Failed to save warehouse.", 'warehouse_name');
        return;
    }
    http_response_code($updateid ? 200 : 201);
    echo $action->db->json($updateid ? 200 : 201, $msg);
}
?>