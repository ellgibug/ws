<?php
require_once ("functions.php"); 

//загурзка всех данных
$allData = fetchAllData($pdo);

//загрузка профессий для радиокнопок
$professions = fetchProfessions($pdo);

//выбор месяца
$month = chooseMonth();

//выбор валюты
$money = changePaymentFromRubToUSD();

//если премия выдана, то выводится сообщение
if(setPremium($pdo, $month, $_GET['profession'])){
    echo "Премия выдана:)";
}


