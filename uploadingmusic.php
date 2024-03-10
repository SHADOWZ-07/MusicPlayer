<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["musicFile"]) && $_FILES["musicFile"]["error"] == 0) {
        // Set the target directory path
        $targetDir = "C:\\Users\\va339\\OneDrive\\Desktop\\shadow_playz\\uploads\\";
        
        // Append the basename of the uploaded file's name to the target directory path
        $targetFile = $targetDir . basename($_FILES["musicFile"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an MP3
        if ($fileType != "mp3") {
            echo "Sorry, only MP3 files are allowed.";
            $uploadOk = 0;
        }

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, this file already exists.";
            $uploadOk = 0;
        }

        // Upload the file if everything is OK
        if ($uploadOk) {
            if (move_uploaded_file($_FILES["musicFile"]["tmp_name"], $targetFile)) {
                echo "The file ". basename($_FILES["musicFile"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Please select a file to upload.";
    }
}
?>
