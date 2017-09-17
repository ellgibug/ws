<?php
require_once ("connection.php");

//загрузка только определенных типов файлов
$types = array('image/gif', 'image/png', 'image/jpeg');

//загрузка картинки в папку images и запись ее адреса и всех данных в БД
if(isset($_POST['submit'])) {
    if (in_array($_FILES['photo']['type'], $types)) {
        $target = "../images/".basename($_FILES['photo']['name']);
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $photo = "images/".$_FILES['photo']['name'];
        $payment = $_POST["payment"];
        $profession = $_POST["profession"];

        $sql = "INSERT INTO `workers`(`name`, `surname`, `profession_id`, `payment`, `photo`) VALUES (:name, :surname, :profession,:payment,:photo)";

        try {
            $query = $pdo->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':surname', $surname);
            $query->bindValue(':profession', $profession);
            $query->bindValue(':payment', $payment);
            $query->bindValue(':photo', $photo);
            $query->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }

        if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)){
            header("Location: /");
            die();
        } else {
            die('Ошибка при загрузке картинки. Вернитесь назад и попробуйте снова.');
        }
    } else {
        die('Вернитесь назад и загрузите картинку в формате gif, jpeg или png.');
    }
}