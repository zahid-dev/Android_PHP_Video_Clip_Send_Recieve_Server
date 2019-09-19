<?php
$target_path  = "./uploads/";
$src = $_FILES['uploadedfile']['name'];

$target_path .= basename($src);
if(file_exists($src)){
    echo "existent here!";
}
else{
    echo "naah!";
}
 if( move_uploaded_file($src, $target_path)) 
{
    echo "The file ".basename( $_FILES['uploadedfile']['name'])." has been uploaded";
} else {
    header("Server Error", true, 503);
    echo "There was an error uploading the file, please try again!";

}
?>