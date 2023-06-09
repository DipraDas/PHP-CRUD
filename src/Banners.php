<?php

namespace Seip;

use PDO;

class Banners
{
    public $conn = null;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $this->conn = new PDO("mysql:host=$servername;dbname=dipCrud", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function index()
    {
        $query = "SELECT * FROM `banners` WHERE is_deleted = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $banners = $stmt->fetchALL();
        return $banners;
    }

    public function store()
    {
        // var_dump($_FILES);\
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/dipCrud/";
        $_title = $_POST['title'];
        $_link = $_POST['link'];

        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }

        $file_name = "IMG_" . time() . "_" . $_FILES['picture']['name'];
        $_target = $_FILES['picture']['tmp_name'];
        $destination = $approot . "uploads/" . $file_name;
        $is_file_moved = move_uploaded_file($_target, $destination);

        if ($is_file_moved) {
            $_picture = $file_name;
        } else {
            $_picture = null;
        }

        $_created_at = date('Y-m-d H:i:s', time());

        $query = "INSERT INTO `banners` (`title`,`link`,`picture`, `is_active`, `created_at`) VALUES (:title, :link, :picture, :is_active, :created_at);";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':created_at', $_created_at);

        $result = $stmt->execute();
        header("location:index.php");
        return $result;
    }


    public function show()
    {
        $_id = $_GET['id'];
        $query = "SELECT * FROM `banners` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $banner = $stmt->fetch();
        return $banner;
    }

    public function edit()
    {
        $_id = $_GET['id'];
        $query = "SELECT * FROM `banners` Where id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $banner = $stmt->fetch();
        return $banner;
    }

    public function update()
    {
        $_id = $_POST['id'];
        $_title = $_POST['title'];
        $_link = $_POST['link'];
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/dipCrud/";

        if (($_FILES['picture']['name']) !== "") {
            $file_name = "IMG_" . time() . "_" . $_FILES['picture']['name'];

            $_target = $_FILES['picture']['tmp_name'];
            $destination = $approot . "uploads/" . $file_name;
            $is_file_moved = move_uploaded_file($_target, $destination);

            if ($is_file_moved) {
                $_picture = $file_name;
            } else {
                $_picture = null;
            }
        } else {
            $_picture = $_POST['old_picture'];
        }

        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }

        $_modified_at = date('Y-m-d H:i:s', time());

        $query = "UPDATE `banners` SET `title` = :title, `link` = :link, `picture` = :picture, `is_active` = :is_active, `modified_at` = :modified_at WHERE `banners`.`id` = :id;";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':modified_at', $_modified_at);

        $result = $stmt->execute();

        header("location:index.php");
        return $result;
    }

    public function trash()
    {
        $_id = $_GET['id'];
        $_is_deleted = 1;

        $query = "UPDATE `banners` SET `is_deleted` = :is_deleted WHERE `banners`.`id` = :id;";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);

        $result = $stmt->execute();
        header("location:index.php");
        return $result;
    }
}
