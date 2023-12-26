<h1><?= $title ?></h1>

<a href="/">Главная</a>

<div class="mt-5">
    <form action="/product/create" method="post" class="w-50">
        <div class="mb-3">
            <label for="name-input" class="form-label">Название</label>
            <input name="name" type="text" class="form-control" id="name-input" required>
        </div>
        <div class="mb-3">
            <label for="price-input" class="form-label">Цена</label>
            <input name="price" type="number" class="form-control" id="price-input" min=0 step=".01" required>
        </div>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
</div>