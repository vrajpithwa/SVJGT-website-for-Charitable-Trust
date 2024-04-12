<?php
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $base64 = base64_encode(file_get_contents($fileTmpPath));
    $image = 'data:' . mime_content_type($fileTmpPath) . ';base64,' . $base64;

    echo json_encode([
        'base64' => $base64,
        'image' => $image
    ]);
} else {
    echo json_encode(['error' => 'File upload failed']);
}
?>
