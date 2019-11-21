
<h2>Заказ № <?=$order[0]['id']?></h2>
<br>
<div>Имя заказчика: <?=$order[0]['name']?></div>
<div>Телефон для связи: +7<?=$order[0]['phone']?></div>
<div>Статус: <?=$order[0]['status_order']?></div>
<p>
    <b>Изменить статус</b>
<a href="/admin/update/?id=<?= $order[0]['id'] ?>&status_order=В обработке" style="border: black 1px solid; padding: 2px; text-decoration: none">В обработке</a>
<a href="/admin/update/?id=<?= $order[0]['id'] ?>&status_order=Собирается" style="border: black 1px solid; padding: 2px; text-decoration: none">Собирается</a>
<a href="/admin/update/?id=<?= $order[0]['id'] ?>&status_order=Отправлен" style="border: black 1px solid; padding: 2px; text-decoration: none">Отправлен</a>
<a href="/admin/update/?id=<?= $order[0]['id'] ?>&status_order=Выполнен" style="border: black 1px solid; padding: 2px; text-decoration: none">Выполнен</a>
</p>
<hr>
<?if (!empty($basket)):?>
    <?foreach ($basket as $item):?>
        <div>
            <p>Товар: <?=$item['name']?></p>
            <p><?=$item['description']?></p>
            <p>Цена: <?=$item['price']?></p>
            <a href="/product/card/?id=<?=$item['id_prod']?>">Открыть</a>
        </div>
        <hr>
    <?endforeach;?>
<?else:?>
    <p>Заказ пуст!</p>
<?endif;?>