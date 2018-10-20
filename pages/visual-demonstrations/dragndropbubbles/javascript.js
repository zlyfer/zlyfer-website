window.onload = function() {

    var dragables = document.getElementsByClassName("dragable");
    for (var dragable = 0; dragable < dragables.length; dragable++) {
        dragElement(dragables[dragable]);
        dragables[dragable].style.zIndex = dragable + 1;
    }
    
    window.onresize = function() {
        replaceDragables();
    };

}

function dragElement(element) {

    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0, xpos = 0, ypos = 0, width = 0, height = 0, domRect, children, labels, className, dragable, dragables, indexElement, dropspaceElements, dropspaceElement;
    element.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e = e || window.event;
        pos3 = e.clientX;
        pos4 = e.clientY;

        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;

        dragables = document.getElementsByClassName("dragable");
        for (dragable = 0; dragable < dragables.length; dragable++) {
            indexElement = dragables[dragable];
            if (indexElement == element) {
                indexElement.style.zIndex = dragables.length;
            } else {
                indexElement.style.zIndex--;
            }
        }
    }

    function elementDrag(e) {
        window.getSelection().removeAllRanges();
        e = e || window.event;

        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;

        xpos = element.offsetLeft - pos1;
        ypos = element.offsetTop - pos2;
        domRect = element.getBoundingClientRect();
        width = document.documentElement.clientWidth;
        height = document.documentElement.clientHeight;

        if (xpos > 0 && (xpos + domRect.width) < width) {
            element.style.left = (xpos) + "px";
        }
        if (ypos > 0 && (ypos + domRect.height) < height) {
            element.style.top = (ypos) + "px";
        }

    }

    function closeDragElement() {
        dropspace();
        document.onmouseup = null;
        document.onmousemove = null;
    }

    function dropspace() {
        dropspaceElements = document.getElementsByClassName("dropspace");
        for (dropspaceElement = 0; dropspaceElement < dropspaceElements.length; dropspaceElement++) {
            domRect = element.getBoundingClientRect();
            domRectDS = dropspaceElements[dropspaceElement].getBoundingClientRect();

            if (
                domRect.width < domRectDS.width &&
                domRect.height < domRectDS.height
            ) {
                if (
                    domRect.left <= domRectDS.right &&
                    domRect.left >= domRectDS.left &&
                    domRect.top <= domRectDS.bottom &&
                    domRect.top >= domRectDS.top ||

                    domRect.right <= domRectDS.right &&
                    domRect.right >= domRectDS.left &&
                    domRect.bottom <= domRectDS.bottom &&
                    domRect.bottom >= domRectDS.top ||

                    domRect.right <= domRectDS.right &&
                    domRect.right >= domRectDS.left &&
                    domRect.top <= domRectDS.bottom &&
                    domRect.top >= domRectDS.top ||

                    domRect.left <= domRectDS.right &&
                    domRect.left >= domRectDS.left &&
                    domRect.bottom <= domRectDS.bottom &&
                    domRect.bottom >= domRectDS.top
                ) {
                    element.style.left = (domRectDS.left + ((domRectDS.width - domRect.width) / 2)) + "px";
                    element.style.top = (domRectDS.top + ((domRectDS.height - domRect.height) / 2)) + "px";
                }
            }
        }
    }

}

function replaceDragables() {

    var element, domRect, width, height;
    dragables = document.getElementsByClassName("dragable");
    for (dragable = 0; dragable < dragables.length; dragable++) {
        element = dragables[dragable];
        domRect = element.getBoundingClientRect();
        width = document.documentElement.clientWidth;
        height = document.documentElement.clientHeight;
        if (domRect.bottom >= height) {
            element.style.top = (height - domRect.height) + "px";
        }
        if (domRect.right >= width) {
            element.style.left = (width - domRect.width) + "px";
        }
    }

}

function create(type) {
    var element = document.createElement("div");
    element.className = "box "+type+" dragable";
    document.getElementsByTagName("body")[0].appendChild(element);
    dragElement(element);
}

