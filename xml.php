<?php

if (isset($_POST['upload'])||isset($_FILES['xmlfile'])) {
    if (isset($_FILES['xmlfile'])) {
        $uploaded_file = $_FILES['xmlfile'];
        libxml_disable_entity_loader(false);
        $xml = simplexml_load_file($uploaded_file['tmp_name'], null, LIBXML_NOENT);
        $license = $xml[0];
        $msg = "XML processed successfully, no problems.";
    } else {
        $msg = "No files transferred.";
    }
} else {
    $msg = "No files uploaded yet.";
}

?>
<html>
<head></head>
<body>
<div>
    <h2>Report</h2>
    <?php if (isset($msg)) echo $msg; ?>
</div>
<div>
    <h2>License Information</h2>
    <?php if (isset($license)) echo "License: {$license} <br>"; ?>
</div>
<br>
<hr><br>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="xmlfile">
    <button type="submit" name="upload">Process</button>
</form>
</body>
</html>
