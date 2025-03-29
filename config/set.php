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
// ! ||--------------------------------------------------------------------------------||
// ! ||                             DELETE DATA                                        ||
// ! ||--------------------------------------------------------------------------------||
function delete_table()
{
    global $action;

    $id = $action->db->sanitizeClientInput($_POST['del_id'] ?? '');
    $table_code = $action->db->sanitizeClientInput($_POST['table_name'] ?? '');

    if (!$id || !$table_code) {
        echo json_encode(['status' => 2, 'msg' => "Invalid request."]);
        return;
    }

    $table_name = $action->db->getTable($table_code);
    $success = $action->db->update($table_name, "id = '{$id}'", [
        'deleteStatus' => 1,
        'deletedAt' => date('Y-m-d')
    ]);

    echo json_encode([
        'status' => $success ? 1 : 2,
        'msg' => $success ? "Record deleted successfully." : "An error occurred. Please try again later."
    ]);
}
// ! ||--------------------------------------------------------------------------------||
// ! ||                           RECOVERED DELETED DATA                               ||
// ! ||--------------------------------------------------------------------------------||
function delete_recycle()
{
    global $action;

    $id = $action->db->sanitizeClientInput($_POST['del_id'] ?? '');
    $table_code = $action->db->sanitizeClientInput($_POST['table_name'] ?? '');

    if (!$id || !$table_code) {
        echo json_encode(['status' => 2, 'msg' => "Invalid request."]);
        return;
    }

    $table_name = $action->db->getTable($table_code);
    $success = $action->db->update($table_name, "id = '{$id}'", ['deleteStatus' => 0]);

    echo json_encode([
        'status' => $success ? 1 : 2,
        'msg' => $success ? "Data recovered successfully." : "An error occurred. Please try again later."
    ]);
}
// ! ||--------------------------------------------------------------------------------||
// ! ||                                 STATUS TOGGLE                                  ||
// ! ||--------------------------------------------------------------------------------||
function check_status()
{
    global $action;

    $status = isset($_POST['inactive']) ? 0 : (isset($_POST['active']) ? 1 : null);
    $id = $action->db->sanitizeClientInput($_POST['inactive'] ?? $_POST['active'] ?? '');
    $table_code = $action->db->sanitizeClientInput($_POST['table_name'] ?? '');
    if (is_null($status) || !$id || !$table_code) {
        echo $action->db->json(4, "Invalid request.");
        return;
    }

    $table_name = $action->db->getTable($table_code);
    $success = $action->db->update($table_name, "id = '{$id}'", ['status' => $status]);

    echo $action->db->json(
        $success ? ($status ? 1 : 3) : ($status ? 2 : 4),
        $success ? "Status " . ($status ? "active" : "inactive") . " successfully." : "An error occurred. Please try again later."
    );
}
// FETCH JSON WAREHOUSE DATA
function fetchWareHouseJson()
{
    global $action;
    $id = $action->db->sanitizeClientInput($_POST['id'] ?: '');
    echo $action->get_admin_function->jsonData(2, $id);
}
function save_item()
{
    global $action;
    $id = $action->db->sanitizeClientInput($_POST['id'] ?: '');
    $item_name = $action->db->validatePostData('item_name') ?: null;
    $print_name = $action->db->validatePostData('print_name') ?: null;
    $item_qty = $action->db->validatePostData('item_qty') ?: 0;
    $alt_qty = $action->db->validatePostData('alt_qty') ?: 0;
    $coupon_point = $action->db->validatePostData('coupon_point') ?: 0;
    $warehouseid = $action->db->setPostRequiredField('warehouseid', 'Warehouse is required');
    if (!$warehouseid) {
        http_response_code(400);
        echo $action->db->json(400, "Warehouse is required", "warehouseid");
        return;
    }
    $remark = $action->db->validatePostData('remark') ?: null;
    $data = [
        'item_name' => $item_name,
        'print_name' => $print_name,
        'item_qty' => $item_qty,
        'alt_qty' => $alt_qty,
        'coupon_point' => $coupon_point,
        'warehouseid' => $warehouseid,
        'remark' => $remark
    ];
    if (!$id) {
        $res = $action->db->insert('aimo_item', $data);
        $msg = "Item added successfully.";
    } else {
        $res = $action->db->update('aimo_item', "id = '{$id}'", $data);
        $msg = "Item updated successfully.";
    }
    if (!$res) {
        http_response_code(500);
        echo $action->db->json(500, "An error occurred. Please try again later");
        return;
    }
    http_response_code($id ? 200 : 201);
    echo $action->db->json($id ? 200 : 201, $msg);
    return;
}
function upload_csv_item()
{
    global $action;

    if (!isset($_FILES['csvfile']) || empty($_FILES['csvfile']['name'])) {
        http_response_code(400);
        echo $action->db->json(400, "Please choose a CSV file to import items.");
        return;
    }

    $file = $_FILES['csvfile'];
    $tmpName = $file['tmp_name'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($fileExtension !== 'csv') {
        http_response_code(400);
        echo $action->db->json(400, "Invalid file type. Please upload a CSV file.");
        return;
    }

    if (($handle = fopen($tmpName, 'r')) === FALSE) {
        http_response_code(500);
        echo $action->db->json(500, "Failed to open the CSV file.");
        return;
    }

    set_time_limit(0);
    $row = 0;
    $warehouseCache = []; // Caching warehouse IDs

    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
        if ($row === 0) { // Skip the header row
            $row++;
            continue;
        }

        $item_name = sanitizeInput($data, 1);
        $print_name = sanitizeInput($data, 2);
        $item_qty = sanitizeInput($data, 3, 0);
        $coupon_point = sanitizeInput($data, 4, 0);
        $warehouse = sanitizeInput($data, 5);

        if (!$item_name || !$print_name || !$warehouse) {
            continue; // Skip invalid rows
        }

        // Check warehouse cache first
        if (!isset($warehouseCache[$warehouse])) {
            $checkExist = $action->db->sql("SELECT id FROM aimo_warehouse WHERE wtitle = '{$warehouse}'");
            if (!$checkExist) {
                $warehouseid = $action->db->insert('aimo_warehouse', ['wtitle' => $warehouse]);
            } else {
                $warehouseid = $checkExist[0]['id'];
            }
            $warehouseCache[$warehouse] = $warehouseid;
        } else {
            $warehouseid = $warehouseCache[$warehouse];
        }
        $existItem = $action->db->sql("SELECT id FROM aimo_item WHERE item_name = '{$item_name}' AND print_name = '{$print_name}' AND item_qty = '{$item_qty}' AND coupon_point = '{$coupon_point}' AND warehouseid = '{$warehouseid}'");
        if (!$existItem) {
            // Insert item
            $insert = $action->db->insert('aimo_item', [
                "item_name" => $item_name,
                "print_name" => $print_name,
                "item_qty" => $item_qty,
                "coupon_point" => $coupon_point,
                "warehouseid" => $warehouseid,
            ]);

            if (!$insert) {
                fclose($handle);
                http_response_code(500);
                echo $action->db->json(500, "Error inserting data for item: {$item_name}");
                return;
            }
        }


        $row++;
    }

    fclose($handle);
    echo $action->db->json(200, "CSV file imported successfully.");
}

// Helper function to sanitize input
function sanitizeInput($data, $index, $default = null)
{
    global $action;
    return isset($data[$index]) && !empty($data[$index]) ? $action->db->sanitizeClientInput($data[$index]) : $default;
}
function save_party()
{
    global $action;
    $party_name = $action->db->setPostRequiredField('party_name', 'Party name is required.');
    $party_phone = $action->db->validatePostData('party_phone') ?: null;
    $address = $action->db->validatePostData('address') ?: null;
    $updateid = $action->db->validatePostData('updateid') ?: null;
    $checkExist = $action->db->sql("SELECT id FROM aimo_party WHERE party_name = '{$party_name}' AND party_phone = '{$party_phone}'");
    if ($checkExist && (!$updateid || $checkExist[0]['id'] != $updateid)) {
        http_response_code(400);
        echo $action->db->json(400, "Party name and phone already exist.");
        return;
    }
    $data = [
        "party_name" => $party_name,
        "party_phone" => $party_phone,
        "address" => $address
    ];
    if (!$updateid) {
        $res = $action->db->insert('aimo_party', $data);
        $msg = "Party created successfully.";
    } else {
        $res = $action->db->update('aimo_party', "id = {$updateid}", $data);
        $msg = "Party updated successfully.";
    }
    if (!$res) {
        http_response_code(500);
        echo $action->db->json(500, "Error saving party.");
        return;
    }
    http_response_code($updateid ? 200 : 201);
    echo $action->db->json($updateid ? 200 : 201, $msg);
}
?>