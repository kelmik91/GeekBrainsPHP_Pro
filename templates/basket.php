<h2>Корзина</h2>

<? foreach ($products as $item): ?>
<div id="<?= $item['id_basket'] ?>">
    <h2><?=$item['name']?></h2>
    <p>Описание:<?=$item['description']?></p>
    <p>Цена:<?=$item['price']?></p>

    <button data-id="<?= $item['id_basket']?>" class="delete">Удалить</button>
    <hr>
</div>
<? endforeach; ?>
<hr>
<div>
    <form action="/order/CreateOrder/" method="post">
        <input type="text" name="name" placeholder="Имя" required>
        <input type="tel" name="phone" placeholder="Телефон в 10 значном значении" style="width: 205px" maxlength="10" required>
        <input type="submit" name="submit" value="Заказать">
    </form>
</div>

<script>
    let buttons = document.querySelectorAll('.delete');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/delete/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id,
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                    document.getElementById(id).remove();
                }
            )();
        })
    });

</script>
