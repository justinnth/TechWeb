$(document).ready(init());

function init() {
    $('#slides').superslides({
        slide_easing: 'easeInOutCubic',
        slide_speed: 800,
        pagination: true,
        scrollable: true
    });
}