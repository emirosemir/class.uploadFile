<?php
/*
    A file upload class and method was created with its most basic features. Files uploaded in the method are not filtered by their extensions and there is no limit on upload size.

    It was created by Emirhan Demirel on 16.04.2023.
    
    github.com/emirosemir
*/

    class UploadFile {
        public static function upload($name, $uploadDir) {
            if (array_key_exists($name, $_FILES)) {
                $receiveFileName = $_FILES[$name]["name"];
                $receiveFileExtension = pathinfo($receiveFileName, PATHINFO_EXTENSION);
                $receiveFileTmpName = $_FILES[$name]["tmp_name"];

                $uniqID = md5(uniqid(mt_rand()));
                $fileName = time() . "-" . $uniqID . "." . $receiveFileExtension;

                $uploadFile = move_uploaded_file($receiveFileTmpName, $uploadDir . $fileName);

                if ($uploadFile) {
                    return "SUCCESS";
                } else {
                    return "UNSUCCESS";
                }
            } else {
                return "FILE NOT SELECTED";
            }
        }
    }