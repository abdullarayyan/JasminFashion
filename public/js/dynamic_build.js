let isEventsAttached = false;
let isDraggingStarted = false;
let placeholder;
let selectedItem;

// The current dragging item
let draggingEle;

// The current position of mouse relative to the dragging element
let x = 0;
let y = 0;

const isAbove = function (nodeA, nodeB) {
    // Get the bounding rectangle of nodes
    const rectA = nodeA.getBoundingClientRect();
    const rectB = nodeB.getBoundingClientRect();

    return (rectA.top + rectA.height / 2 < rectB.top + rectB.height / 2);
};

const swap = function (nodeA, nodeB) {
    const parentA = nodeA.parentNode;
    const siblingA = nodeA.nextSibling === nodeB ? nodeA : nodeA.nextSibling;

    // Move `nodeA` to before the `nodeB`
    nodeB.parentNode.insertBefore(nodeA, nodeB);

    // Move `nodeB` to before the sibling of `nodeA`
    parentA.insertBefore(nodeB, siblingA);
};

const mouseDownHandler = function (e) {
    placeholder = undefined;
    draggingEle = e.target;

    // Calculate the mouse position
    const rect = draggingEle.getBoundingClientRect();
    x = e.pageX - rect.left;
    y = e.pageY - rect.top;

    // Attach the listeners to `document`
    document.addEventListener('mousemove', mouseMoveHandler);
    document.addEventListener('mouseup', mouseUpHandler);
};

const mouseMoveHandler = function (e) {
    const draggingRect = draggingEle.getBoundingClientRect();

    if (!isDraggingStarted) {
        // Update the flag
        isDraggingStarted = true;

        // Let the placeholder take the height of dragging element
        // So the next element won't move up
        placeholder = document.createElement('div');
        placeholder.classList.add('placeholder');
        draggingEle.parentNode.insertBefore(
            placeholder,
            draggingEle.nextSibling
        );

        // Set the placeholder's height
        placeholder.style.height = `${draggingRect.height}px`;
    }

    // Set position for dragging element
    draggingEle.style.position = 'absolute';
    draggingEle.style.top = `${e.pageY - (y + 170)}px`;
    // draggingEle.style.left = `${e.pageX - x}px`;

    const prevEle = draggingEle.previousElementSibling;
    const nextEle = placeholder.nextElementSibling;

    // User moves item to the top
    if (prevEle && isAbove(draggingEle, prevEle)) {
        // The current order    -> The new order
        // prevEle              -> placeholder
        // draggingEle          -> draggingEle
        // placeholder          -> prevEle
        swap(placeholder, draggingEle);
        swap(placeholder, prevEle);
        return;
    }

    // User moves the dragging element to the bottom
    if (nextEle && isAbove(nextEle, draggingEle)) {
        // The current order    -> The new order
        // draggingEle          -> nextEle
        // placeholder          -> placeholder
        // nextEle              -> draggingEle
        swap(nextEle, placeholder);
        swap(nextEle, draggingEle);
    }
};

const mouseUpHandler = function () {
    // Remove the placeholder
    placeholder && placeholder.parentNode.removeChild(placeholder);
    // Reset the flag
    isDraggingStarted = false;

    // Remove the position styles
    draggingEle.style.removeProperty('top');
    draggingEle.style.removeProperty('left');
    draggingEle.style.removeProperty('position');

    x = null;
    y = null;
    draggingEle = null;

    // Remove the handlers of `mousemove` and `mouseup`
    document.removeEventListener('mousemove', mouseMoveHandler);
    document.removeEventListener('mouseup', mouseUpHandler);
};

function attachEvents() {
    if (!isEventsAttached) {
        // Query the list element
        const list1 = document.getElementById('list1');
        const list2 = document.getElementById('list2');

        // Query all items
        [].slice.call(list1.querySelectorAll('.draggable')).forEach(function (item) {
            item.addEventListener('mousedown', mouseDownHandler);
        });

        [].slice.call(list2.querySelectorAll('.draggable')).forEach(function (item) {
            item.addEventListener('mousedown', mouseDownHandler);
        });

        isEventsAttached = true;
        attachMove();
    }
}

function clearEvents() {
    if (isEventsAttached) {
        let list1 = document.getElementById('list1');
        listChildren = list1.children;
        listChildrenCount = list1.children.length;

        let newList1Children = [];

        for (let i = 0; i < listChildrenCount; i++) {
            newList1Children.push(listChildren[i].cloneNode(true));
        }

        $("#list1").empty();

        newList1Children.forEach(item => {
            list1.appendChild(item);
        });

        let list2 = document.getElementById('list2');
        listChildren = list2.children;
        listChildrenCount = list2.children.length;

        let newList2Children = [];

        for (let i = 0; i < listChildrenCount; i++) {
            newList2Children.push(listChildren[i].cloneNode(true));
        }

        $("#list2").empty();

        newList2Children.forEach(item => {
            list2.appendChild(item);
        });

        isEventsAttached = false;
    }

}

function attachMove() {
    var rows = document.querySelectorAll(".draggable");

    function selectItem(e) {
        var list1 = document.getElementById("list1");
        var list2 = document.getElementById("list2");

        selectedItem = e.target;

        for (var i = 0; i < rows.length; i++) {
            $(rows[i]).removeClass("selected");
        }

        $(selectedItem).addClass("selected");

        let parentElement = selectedItem.parentElement == list1 ? list2 : list1;
        if (parentElement == list1) {
            document.getElementById('add_button').disabled = true;
            document.getElementById('remove_button').disabled = false;
        } else {
            document.getElementById('add_button').disabled = false;
            document.getElementById('remove_button').disabled = true;
        }
    }

    for (var i = 0; i < rows.length; i++) {
        rows[i].addEventListener("click", selectItem);
    }
}

function move() {
    var list1 = document.getElementById("list1");
    var list2 = document.getElementById("list2");

    var moveTo = selectedItem.parentElement == list1 ? list2 : list1;
    moveTo.appendChild(selectedItem);
    $(selectedItem).removeClass("selected");
    selectedItem = undefined;
    document.getElementById('add_button').disabled = true;
    document.getElementById('remove_button').disabled = true;
}

function filterChanged(e) {
    let dataId = e.target.dataset.id;
    let isChecked = e.target.checked;

    if (isChecked) {
        $(`#${dataId}_row`).removeClass('hide');
    } else {
        $(`#${dataId}_row`).addClass('hide');
    }
}

function attachFiltersEvents() {
    let checkboxes = document.querySelectorAll('.filters-list [id$=_checkbox]');

    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', filterChanged)
    }
}

function filterColumns() {
    let searchTerm = document.getElementById('filter_columns').value;
    
    if (searchTerm.trim().length > 0)  {
        showAllItems();
        filterItems(searchTerm);
    } else {
        showAllItems();
    }

}

function filterItems(searchTerm) {
    let listItems = document.getElementById('list1').children;
    let itemsCount = listItems.length;

    for (let i = 0; i < itemsCount; i++) {
        let itemText = listItems[i].innerText;
        if (!itemText.includes(searchTerm)) {
            listItems[i].classList.add('hide');
        }
    }
}

function showAllItems() {
    let listItems = document.getElementById('list1').children;
    let itemsCount = listItems.length;

    for (let i = 0; i < itemsCount; i++) {
        listItems[i].classList.remove('hide');
    }
}

attachEvents();
attachFiltersEvents();

document.getElementById("add_button").addEventListener("click", move)
document.getElementById("remove_button").addEventListener("click", move)