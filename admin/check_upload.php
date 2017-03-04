<?php

function check_upload() {
    $file = null;
    $ext = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
    $fileName = $_FILES["hinhanh"]["name"];
    $filetype = $_FILES["hinhanh"]["type"];
    $filesize = $_FILES["hinhanh"]["size"];
    echo $fileName;
    echo $filetype;
    echo $filesize;

    $fileGoc = null;
    $fileFinfo = explode(".", $fileName);
    $duoiFileAnh = $fileFinfo[1];
    if (in_array($duoiFileAnh, $ext)) {
        if ($_FILES["hinhanh"]["error"] > 0) {
            echo "<script>alert('{$_FILES["hinhanh"]["error"]}');</script>";
        } else {
            $no = 1;
            while (true) {
                if (file_exists("../images/" . $fileName)) {
                    if ($flag == 0) {
                        $fileGoc = $fileFinfo[0];
                        $flag = 1;
                    }
                    $no = $no + 1;
                    $fileName = $fileGoc . "_" . $no . "." . $fileFinfo[1];
                } else {
                     $file = "../images/" . $fileName;
                    move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$file );
                   
                    break;
                }
            }
        }
    } else {
        echo "<script>alert('Không đúng định dạng của ảnh.');</script>";
    }
    return $file;
}

?>
