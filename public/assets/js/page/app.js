function filters() {
    const slider = document.getElementById('price-limits');
    const slider_value = document.getElementById('price-limits-value');
    const min = parseInt(slider.dataset.min);
    const max = parseInt(slider.dataset.max);

    console.info(slider);

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

document.addEventListener('readystatechange', () => {
    filters();
});
