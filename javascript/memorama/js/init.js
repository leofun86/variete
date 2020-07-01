var currentInnerHtml;
var element = new Image();
var elementWithHiddenContent = document.getElementById('contenedor_master');
var innerHtml = elementWithHiddenContent.innerHTML;

element.__defineGetter__("id", function() {
    currentInnerHtml = "";
});

setInterval(function() {
    currentInnerHtml = innerHtml;
    console.log(element);
    console.clear();
    elementWithHiddenContent.innerHTML = currentInnerHtml;
}, 1000);