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

    if (document.querySelectorAll('.product').length > 0) {
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
    addToCart();
    rating();
    imgSliders();
    bsRating();
});
