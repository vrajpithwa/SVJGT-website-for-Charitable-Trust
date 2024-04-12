<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="upload.php" method="POST">
        <input onkeyup="base64(this)" name="text" id="text" autocomplete="off">
        <input type="file" name="img" id="img" accept="image/jpeg, image/png" onchange="base64img(this)">
        <input type="hidden" name="b64i" id="b64i"> <!-- Hidden input for base64 data -->
        <input type="submit" value="Upload Image">
    </form>
    <p> 
        <?= $_GET['text'] ?? 'NOTHING HERE'?>
    </p>
    <p id="base64"></p>
    <p id="clean"></p>
    <img id="imagePreview" src="" alt="Image Preview">
    <p id="imageBase64"></p> <!-- New element to display base64 data of the image -->
    <script>
        function base64img(obj) {
            var file = obj.files[0];
            var reader = new FileReader();

            reader.onload = function () {
                var base64Data = reader.result.split(',')[1];
                document.getElementById('base64').innerText = base64Data;
                document.getElementById('imagePreview').src = reader.result;
                document.getElementById('b64i').value = base64Data;

                let fileName = file.name.replace(/\s+/g, '_');
                document.getElementById('imageBase64').innerText = `${fileName}: ${base64Data}`;
            };

            reader.readAsDataURL(file);
        }

        function base64(obj) {
            let b64 = btoa(obj.value);
            document.getElementById('base64').innerText = b64;
            let clean = atob(b64);
            document.getElementById('clean').innerText = clean;
        }
    </script>
</body>

</html>
