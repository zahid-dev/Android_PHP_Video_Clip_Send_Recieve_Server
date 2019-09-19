

<?php

    
ini_set('max_execution_time', 3000);
$pyscript = 'D://xampp//htdocs//AndroidFileUpload//Converted_Code.py';
$python = 'C://ProgramData//Anaconda3//python.exe';

$filePath = 'D:/xampp/htdocs/AndroidFileUpload/uploads';

$cmd = "$python $pyscript $filePath";

#`$cmd` 
exec("$cmd", $output);


?>


