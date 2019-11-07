<?
$catalogView = "";
foreach ($catalog as $value) {
    $catalogView .= "<div class='product__box'>
            <h2>{$value["name"]}</h2>
            <img width=\"200\" src=\"/img/{$value["image"]}\">
            <p>{$value["description"]}</p>
            <a href=\"/product/card/?id={$value["id"]}\" class='btn'>Открыть страницу товара</a>
            <p>{$value["price"]} Руб.</p>
            </div>";
}
?>

<h2>
    Каталог
</h2>

<div class="content"><?=$catalogView?></div>

<a href="?page=<?=$page?>">Еще</a>
