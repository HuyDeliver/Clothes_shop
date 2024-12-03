<?php
if (isset($_POST["submit"])) {
    $target_dir = __DIR__ . "../upload/"; // Thư mục trên server
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Tạo thư mục nếu chưa tồn tại
    }

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra lỗi tải lên
    if ($_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
        echo "Sorry, there was an error with your upload.";
        $uploadOk = 0;
    }

    // Kiểm tra file thực sự là ảnh
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_mime = finfo_file($finfo, $_FILES["fileToUpload"]["tmp_name"]);
    finfo_close($finfo);

    $allowed_types = ["image/jpeg", "image/png", "image/gif"];
    if (!in_array($file_mime, $allowed_types)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước file
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Kiểm tra file đã tồn tại
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Thử tải lên nếu không có lỗi
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload File Example</title>
</head>

<body>
    <h2>Upload File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <button type="submit" name="submit">Upload File</button>
    </form>
</body>

</html>