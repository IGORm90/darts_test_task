<h1><?= $title ?></h1>

<a href="/product/new">Создать Товар</a> / <a href="/set/new">Создать Набор</a>

<div class="mt-5">
    <? if($products): ?>
    <h2>Товары</h2>
    <table class="table w-50">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">название</th>
                <th scope="col">стоимость</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <? foreach($products as $product): ?>
            <tr>
                <th scope="row"><?=$product['id']?></th>
                <td><?=$product['name']?></td>
                <td><?=$product['price']?></td>
                <td><a href="/product/delete/<?=$product['id']?>" class="btn btn-danger">X</a></td>
            </tr>
            <? endforeach; ?>
        </tbody>
    </table>
    <? endif; ?>
</div>