<?php require_once ("functions/computed.php"); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>WineStyle</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poiret+One&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="one">
    <div class="form-container">
        <form>
            <h3>Введите данные для просмотра сведений о сотрудниках</h3>
            <div>
                <p>Выберите месяц для показа зарплаты:</p>
                <select name="calendar">
                    <option selected disabled>Выберите зарплату</option>
                    <option value="0">Стандартная зарплата</option>
                    <option value="1">Январь</option>
                    <option value="2">Февраль</option>
                    <option value="3">Март</option>
                    <option value="4">Апрель</option>
                    <option value="5">Май</option>
                    <option value="6">Июнь</option>
                    <option value="7">Июль</option>
                    <option value="8">Август</option>
                    <option value="9">Сентябрь</option>
                    <option value="10">Октябрь</option>
                    <option value="11">Ноябрь</option>
                    <option value="12">Декабрь</option>
                </select>
            </div>
            <div>
                <p>Выберите валюту для отображения зарплаты:</p>
                <input id="rub" type="radio" name="money" value="rub" checked>
                <label for="rub">Рубли</label>
                <input id="usd" type="radio" name="money" value="usd">
                <label for="usd">Доллары</label>
            </div>
            <button id="btn-1" type="button">Получить данные</button>
        </form>
    </div>
    <div class="form-container">
        <form method="post">
            <h3>Введите данные для выдачи премии сотрудникам</h3>
            <div>
                <p>Выберите месяц для выдачи премии:</p>
                <select name="calendar-prem">
                    <option selected disabled>Выберите месяц</option>
                    <option value="1">Январь</option>
                    <option value="2">Февраль</option>
                    <option value="3">Март</option>
                    <option value="4">Апрель</option>
                    <option value="5">Май</option>
                    <option value="6">Июнь</option>
                    <option value="7">Июль</option>
                    <option value="8">Август</option>
                    <option value="9">Сентябрь</option>
                    <option value="10">Октябрь</option>
                    <option value="11">Ноябрь</option>
                    <option value="12">Декабрь</option>
                </select>
            </div>
            <div>
                <p>Выберите професию для выдачи премии:</p>
                <? foreach ($professions as $profession): ?>
                    <input id="prof_<?= $profession['id'] ?>" type="radio" name="profession" value="<?= $profession['id'] ?>" checked>
                    <label for="prof_<?= $profession['id'] ?>"><?= $profession['profession'] ?></label>
                <? endforeach; ?>
            </div>
            <button id="btn-2" type="button">Выдать премию</button>
        </form>
    </div>
    <div class="form-container">
        <form method="post"  action="functions/addNewWorker.php" enctype="multipart/form-data">
            <h3>Данные нового сотрудника</h3>
            <div>
                <div>
                    <label>Имя:</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label>Фамилия:</label>
                    <input type="text" name="surname" required>
                </div>
                <div>
                    <label>Зарплата:</label>
                    <input type="number" name="payment" required>
                </div>
                <div>
                    <label>Профессия:</label>
                    <select name="profession">
                        <option selected disabled>Выберите</option>
                        <? foreach ($professions as $profession): ?>
                            <option value="<?= $profession['id'] ?>">
                                <?= $profession['profession'] ?>
                            </option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
            <div>
                <input type="file" name="photo"
                       onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])"
                       required>
                <img id="preview">
            </div>
            <button id="btn-3" type="submit" name="submit">Добавить сотрудника</button>
        </form>
    </div>
    <div id="premium_place"></div>
</section>

<section class="two">
    <div id="place">
        <h3>Сведения о сотрудниках</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Должность</th>
                <th>Зарплата</th>
                <th>Фото</th>
            </tr>
            <? foreach ($allData as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['surname'] ?></td>
                    <td><?= $row['profession'] ?></td>
                    <td><?= $row['payment'] ?></td>
                    <td>
                        <a href="<?= $row['photo'] ?>" class="item"><img src="<?= $row['photo'] ?>" alt="<?= $row['surname'] ?>"></a>
                    </td>
                </tr>
            <? endforeach; ?>
        </table>
    </div>
</section>



<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
</script>
<script
    src="js/jquery.magnific-popup.min.js">
</script>
<script
    src="js/script.js">
    </script>
</body>
</html>