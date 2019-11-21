<h2>Список заказов</h2>
<hr>
<?if (!empty($orders)):?>
<?foreach ($orders as $item):?>
    <div>
        <h3>Заказ № <?=$item['id']?></h3>
        <p>на имя: <?=$item['name']?></p>
        <a href="/admin/card/?id=<?=$item['id']?>&session_id=<?=$item['session_id']?>">Открыть</a>
    </div>
    <hr>
<?endforeach;?>
<?else:?>
    <p>Заказов нет</p>
<?endif;?>
