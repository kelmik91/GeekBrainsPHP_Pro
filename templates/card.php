<?php
/** @var \app\models\Product $product */

?>

<h2><?=$product->name?></h2>
<img width="200" src="/img/<?=$product->image?>"><br>
<p><?=$product->description?></p>
<p><?=$product->price?> Руб.</p>
<a href="/basket/" class="btn">Купить</a>

