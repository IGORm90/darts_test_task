window.onload = function() {
    let setForm = document.getElementById("set-input-group");

    let addProduc = document.getElementById("add-product");
    if (addProduc) {
        addProduc.addEventListener("click", function() {
            if (obj.products) {
                let selectHtml = '<div class="mb-3"><select class="form-select" name="products[]">';

                obj.products.forEach((opt) => {
                    selectHtml += `<option value="${opt.id}">${opt.name}</option>`;
                });

                selectHtml += '</select></div>';
                setForm.innerHTML += selectHtml;
            } else {
                alert('Товаров нет');
            }
        });
    }

    let addSet = document.getElementById("add-set");
    if(addSet) {
        addSet.addEventListener("click", function() {
            if (obj.sets) {
                let selectHtml = '<div class="mb-3"><select class="form-select" name="sets[]">';

                obj.sets.forEach((opt) => {
                    selectHtml += `<option value="${opt.id}">#${opt.id} ${opt.name}</option>`;
                });

                selectHtml += '</select></div>';
                setForm.innerHTML += selectHtml;
            } else {
                alert('Наборов нет');
            }
        });
    }

}