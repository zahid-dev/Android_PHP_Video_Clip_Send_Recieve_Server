<?php
 ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');
ini_set('max_input_time', 10000);
ini_set('max_execution_time', 10000);
// Path to move uploaded files
$target_path = "D:/xampp/htdocs/AndroidFileUpload/uploads/";
 
// array for final json respone
$response = array();
 
// getting server ip address
$server_ip = gethostbyname(gethostname());
 
// final file url that is being uploaded
$file_upload_url = 'http://' . $server_ip . '/' . 'AndroidFileUpload' . '/' . '/'.'uploads'.'/';
 

if (isset($_FILES['image']['name'])) {
 
mkdir($target_path, 0777, true);
    $target_path = $target_path . basename($_FILES['image']['name']);
 
    // reading other post parameters
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $website = isset($_POST['website']) ? $_POST['website'] : '';
 
    $response['file_name'] = basename($_FILES['image']['name']);
    $response['email'] = $email;
    $response['website'] = $website;
 
    try {
        // Throws exception incase file is not being moved
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            // make error flag true
            $response['error'] = true;
            $response['message'] = 'Could not move the file!';
        }
 
        // File successfully uploaded
        $response['message'] = 'File uploaded successfully!';
        $response['error'] = false;
        $response['file_path'] = $file_upload_url . basename($_FILES['image']['name']);
    } catch (Exception $e) {
        // Exception occurred. Make error flag true
        $response['error'] = true;
        $response['message'] = $e->getMessage();
    }
} else {
    // File parameter is missing
    $response['error'] = true;
    $response['message'] = 'Not received any file!F';
}
 
// Echo final json response to client
echo json_encode($response);
?>