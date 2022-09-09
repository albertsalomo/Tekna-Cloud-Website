<?php

function uploadImage($image, $dir)
{
    $imageName = $image['name'];
    $size = $image['size'];
    $error = $image['error'];
    $tmpName = $image['tmp_name'];

    $result = false;

    if ($error === 4) {
        alert('Tidak ada gambar yang diupload');
        return $result;
    }

    $validExtensions = ['jpg', 'jpeg', 'png'];
    $dot = '.';
    $fileNameExploded = explode($dot, $imageName);
    $rawExtension = end($fileNameExploded);
    $fileExtension = strtolower($rawExtension);

    if (!in_array($fileExtension, $validExtensions)) {
        alert("Format file bukan gambar!");
        return $result;
    }

    if ($size > 1048576) {
        alert('Ukuran gambar maksimal 1MB!');
        return $result;
    }

    $imageName = uniqid() . '.' . $fileExtension;
    if (move_uploaded_file($tmpName, $dir . $imageName)) {
        $result = $imageName;
    }
    return $result;
}

function alert($str)
{
    echo "<script>alert('$str');</script>";
}

function refresh($delay = 0)
{
    header("refresh:$delay; url=" . $_SERVER['REQUEST_URI']);
}

function delayedRedirect($url, $delay = 0)
{
    header("refresh:$delay; url=$url");
}

function hideError()
{
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}
