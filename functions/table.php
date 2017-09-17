<?php require_once ("computed.php"); ?>
<h3>Сведения о сотрудниках</h3>
<table >
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
            <td><?= $row[$month]*$money ?></td>
            <td>
                <a href="<?= $row['photo'] ?>" class="item"><img src="<?= $row['photo'] ?>" alt="<?= $row['surname'] ?>"></a>
            </td>
        </tr>
    <? endforeach; ?>
</table>
