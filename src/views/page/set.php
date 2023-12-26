<h1>Набор №<?= $setData['set']['id'] ?>: <?= $setData['set']['name'] ?></h1>

<? if ($setData['setData']) : ?>
    <h2 class="mt-5">Содержимое</h2>
    <table class="table w-50">
        <thead>
            <tr>
                <th scope="col">тип</th>
                <th scope="col">название</th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($setData['setData'] as $item) : ?>
                <tr>
                    <? if ($item['product_name']) : ?>
                        <td>продукт</td>
                        <td><?= $item['product_name'] ?></td>
                    <? endif; ?>

                    <? if ($item['set_name']) : ?>
                        <td>набор</td>
                        <td><a href="/set/<?= $item['child_set_id'] ?>"><?= $item['set_name'] ?></a></td>
                    <? endif; ?>
                </tr>
            <? endforeach; ?>
        </tbody>
    </table>
<? endif; ?>