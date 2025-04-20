$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function filters() {
    const slider = document.getElementById('price-limits');
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

function addToCart() {
    $('.add-to-cart-btn').on('click', function () {
        $.ajax({
            method: 'POST',
            url: '/add-to-cart',
            data: {product: $(this).data('product')},
            success: function (data) {
                const cartView = new bootstrap.Offcanvas('#offcanvasRight');
                cartView.show();
            }
        });
    });
}

window.addEventListener('load', () => {
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

window.addEventListener('load', () => {
    filters();
    addToCart();
    rating();
});
