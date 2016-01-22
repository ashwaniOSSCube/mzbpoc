
$(document).ready(function() {


    // if there are less or equal lines than columns, put every li in one column
    var elements = document.querySelectorAll(".column-3 > ul:only-child > li:first-child");
    for(var i = 0; i < elements.length; i++) {
        var container = elements[i];
        var colCount;
        do {
            container = container.parentNode;
            colCount = window.getComputedStyle(container).roColumnCount;
        } while(container && !colCount);
        if(colCount) {
            var items = elements[i].parentNode.children;
            var itemCount = items.length;
            if(itemCount <= colCount) {
                container.style.roColumnFill ="auto";
                for(var j = 0; j < itemCount; j++) {
                    items[j].style.roColumnBreakAfter = "always";
                }
            }
        }
    }
});