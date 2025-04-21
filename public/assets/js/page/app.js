/* global $ */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function zoom() {
    var e = this.event.currentTarget;
    this.event.offsetX ? offsetX = this.event.offsetX : offsetX = this.event.touches[0].pageX
    this.event.offsetY ? offsetY = this.event.offsetY : offsetX = this.event.touches[0].pageX
    let x = offsetX / e.offsetWidth * 100;
    let y = offsetY / e.offsetHeight * 100;
    e.style.backgroundPosition = x + "% " + y + "%";
}

function filters() {
    const slider = document.getElementById('price-limits');
    if (slider !== null) {
        const slider_value = document.getElementById('price-limits-value');
        const min = parseInt(slider.dataset.min);
        const max = parseInt(slider.dataset.max);

        noUiSlider.create(slider, {
            connect: true,
            behaviour: "tap",
            start: [min, max],
            range: {
                'min': min,
                'max': max
            },
            format: wNumb({decimals: 1, thousand: ".", prefix: "$"})
        });

        slider.noUiSlider.on("update", function (t) {
            slider_value.innerHTML = t.join(" - ")
        });
    }

    const filter_form = document.getElementById('filter-form');

    if (filter_form !== null) {
        $('.filter-input').on('change', function () {
            $(':input.filter-input[value=""]').attr('disabled', true);
            /** @param {HTMLFormElement} filter_form */
            filter_form.submit();
        });

        $('.change-view').on('click', function (e) {
            const $input = $('input[name="view"]');
            const current_view = $input.val();
            const view = $(this).data('view');
            if (current_view !== view) {
                $input.val(view).trigger('change')
            }
        });
    }
}

function cartEvents() {
    $('.add-cart').off('click').on('click', function () {
        $.ajax({
            method: 'POST',
            url: '/cart',
            data: {
                operation: 'add',
                product: $(this).data('product'),
                quantity: $(this).data('quantity') || 1
            },
            success: function (result) {
                updateShoppingCartUI(result);
            }
        });
    });

    $('.sub-cart').off('click').on('click', function () {
        $.ajax({
            method: 'POST',
            url: '/cart',
            data: {
                operation: 'sub',
                product: $(this).data('product'),
                quantity: $(this).data('quantity') || 1
            },
            success: function (result) {
                updateShoppingCartUI(result);
            }
        });
    });

    $('.cart-remove-item').off('click').on('click', function () {
        $.ajax({
            method: 'POST',
            url: '/cart',
            data: {
                operation: 'clear',
                product: $(this).data('product')
            },
            success: function (result) {
                updateShoppingCartUI(result);
            }
        });
    });
}

function updateShoppingCartUI(result) {
    const cart_el = document.getElementById('offcanvasRight');
    const cart_item_container = document.getElementById('cart-items-container');
    const checkout_btn_container = document.querySelector('.cart-checkout-btn-container');

    if (!cart_el.classList.contains('show')) {
        const cart_view = new bootstrap.Offcanvas(cart_el);
        cart_view.show();
    }

    cart_item_container.innerHTML = '';

    for (const [, item] of Object.entries(result.items)) {
        const li = document.createElement('li');
        li.className = 'list-group-item py-3 px-0';
        li.innerHTML = `
            <div class="row row align-items-center">
                <div class="col-2">
                    <img src="${item.product.image.path}" alt="${item.product.name}" class="img-fluid">
                </div>
                <div class="col-5">
                    <h6 class="mb-0">${item.product.name}</h6>
                    <span><small class="text-muted"></small></span>
                    <div class="mt-2 small">
                        <a href="#" data-product="${item.product_id}" data-operation="remove" class="cart-remove-item text-decoration-none">
                            <i class="bi bi-trash"></i> Remove
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group flex-nowrap justify-content-center">
                        <input type="button" value="-"
                               data-product="${item.product_id}"
                               data-operation="sub"
                               class="sub-cart button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                               data-field="quantity">
                        <input type="number" step="1" min="1" value="${item.quantity}"
                               name="quantity"
                               class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                        <input type="button" value="+"
                               data-product="${item.product_id}"
                               data-operation="add"
                               class="add-cart button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                               data-field="quantity">
                    </div>
                </div>
                <div class="col-2 text-end">
                    <span class="fw-bold product-price">${item.price}</span>
                </div>
            </div>`;
        cart_item_container.append(li);
    }

    if (Object.entries(result.items).length === 0) {
        checkout_btn_container.innerHTML = `<div class="alert alert-warning">
            No items in the shopping cart
        </div>`;
    } else {
        checkout_btn_container.innerHTML = `<a href="/checkout" class="btn btn-primary btn-lg d-flex justify-content-between align-items-center" type="submit"
                id="cart-submit-btn">
            Go to Checkout <span class="fw-bold" id="cart-total">$${result.total}</span>
        </a>`;
    }

    cartEvents();
}

function rating() {
    const ratings = document.querySelectorAll('.product-rating');

    ratings.forEach((el) => {
        raterJs({
            element: el,
            readOnly: true,
            rate: parseFloat(el.dataset.rate)
        });
    });
}

function bsRating() {
    const ratings = document.querySelectorAll('.bs-rating');
    ratings.forEach((el) => {
        let html = '<span class="text-warning">';
        let val = parseFloat(el.dataset.rating) || 0;
        const max = parseInt(el.dataset.max) || 5;

        for (let i = 1; i <= max; i++) {
            let icon = '';
            if (val >= 1.0) {
                icon = 'bi-star-fill';
            } else if (val < 1.0 && val > 0.5) {
                icon = 'bi-star-half';
            } else {
                icon = 'bi-star';
            }
            html += "<i class=\"bi " + icon + "\"></i>\n";
            val--;
        }
        html += '</span>'

        el.outerHTML = html;
    });
}

function imgSliders() {
    if (document.querySelectorAll('.productModal').length > 0) {
        tns({
            container: "#productModal",
            items: 1,
            startIndex: 0,
            navContainer: "#productModalThumbnails",
            navAsThumbnails: true,
            autoplay: false,
            autoplayTimeout: 1500,
            swipeAngle: 0,
            speed: 500,
            controls: false,
            autoplayButtonOutput: false,
            loop: true
        });
    }

    if (document.querySelectorAll('#product').length > 0) {
        tns({
            container: "#product",
            items: 1,
            startIndex: 0,
            navContainer: "#productThumbnails",
            navAsThumbnails: true,
            autoplay: false,
            swipeAngle: 0,
            speed: 500,
            controls: false,
            autoplayButtonOutput: false,
            loop: true
        });
    }
}

window.addEventListener('load', () => {
    filters();
    cartEvents();
    rating();
    imgSliders();
    bsRating();
});
