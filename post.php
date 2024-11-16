<?php
$date = date('dMYHis');
$imageData = $_POST['cat'];
if (!empty($imageData)) {
    error_log("Image Data Received" . "\r\n", 3, "Log.log");
    $filteredData = substr($imageData, strpos($imageData, ",") + 1);
    $unencodedData = base64_decode($filteredData);
    $fileName = 'cam' . $date . '.png';
    file_put_contents($fileName, $unencodedData);
    echo "File saved: " . $fileName;
}
exit();
?>
