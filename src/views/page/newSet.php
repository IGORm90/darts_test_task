<h1><?= $title ?></h1>

<a href="/">Главная</a>

<div class="mt-5">
    <form method="post" action="/set/create" class="w-50">
        <div id="set-input-group">
            <div class="mb-3">
                <label for="name-input" class="form-label">Название</label>
                <input type="text" class="form-control" id="name-input" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>

    <div class="mt-5">
        <button class="btn btn-success">Добавить товар</button>
        <button class="btn btn-success">Добавить набор</button>
    </div>
</div>