$(document).ready(init());

function init() {
    $('ul#bulle li').draggable({
        revert: 'invalid'
    });
    $('ul#friends').droppable({
        drop: function () {
            alert("Le drop a été effectué")
        }
    });
}