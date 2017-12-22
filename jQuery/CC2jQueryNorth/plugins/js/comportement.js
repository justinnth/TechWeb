$(document).ready(init());

function init() {
  $("#image").faceDetection({
    complete: traitementDetection
  });
}

function traitementDetection(faces) {
  var nb = faces.length;
  $("span.nb").text(nb);

  $.each(faces, function (key, value) {
    var section = $("section");
    var div = $("<div/>").appendTo(section);
    div.css({
      height: value.height,
      width: value.width,
      left: value.x,
      top: value.y
    });
  })
}
