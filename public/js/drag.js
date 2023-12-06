document.addEventListener('dragstart', function(){
    beingDragged(event);
});

document.addEventListener('dragend', function(){
    dragEnd(event);
});

document.addEventListener('dragover', function(){
   var beingDragged = document.querySelector(".dragging")
  if (event.target.matches('.card')) {
        if (beingDragged.classList.contains('card')) {
          allowDrop(event);
        }
  }
  if (event.target.matches('.col')) {
    if (beingDragged.classList.contains('card')) {
          colDraggedOver(event);
    }
    if (beingDragged.classList.contains('col')) {
      allowDrop(event);
    }
  }
});

function beingDragged(ev) {
  var draggedEl = ev.target;
  draggedEl.classList.add("dragging");
}

function dragEnd(ev) {
  var draggedEl = ev.target;
  draggedEl.classList.remove("dragging");
  console.log(ev.target);
  let arry = ev.target.id.split('-');
  let id = arry[arry.length - 1];
  console.log(id);
  let arry2 = ev.target.parentNode.id.split('-');
  let completion = arry2[arry2.length - 1];
  console.log(completion);
  sendAjaxRequest('put', '/task/' + id + '/update-completion/', {completion: completion}, emptyHandler);
}

function emptyHandler() {
  console.log('Hello World');
}

function allowDrop(ev) {
  ev.preventDefault();
  var dragOver = ev.target;
  var dragOverParent = dragOver.parentElement;
  var beingDragged = document.querySelector(".dragging");
  var draggedParent = beingDragged.parentElement;
  var draggedIndex = whichChild(beingDragged);
  var dragOverIndex = whichChild(dragOver);
  if (draggedParent === dragOverParent) {
    if (draggedIndex < dragOverIndex) {
      draggedParent.insertBefore(dragOver, beingDragged);
    }
    if (draggedIndex > dragOverIndex) {
      draggedParent.insertBefore(dragOver, beingDragged.nextSibling);
    }
  }
  if (draggedParent !== dragOverParent) {
    dragOverParent.insertBefore(beingDragged, dragOver);
  }
}
function colDraggedOver(event) {
  var dragOver = event.target;
  var beingDragged = document.querySelector(".dragging");
  var draggedParent = beingDragged.parentElement;
  if (draggedParent.id !== dragOver.id && draggedParent.classList.contains('col') && dragOver.classList.contains('col')) {
    if (dragOver.childElementCount == 0 || event.clientY > dragOver.children[dragOver.childElementCount - 1].offsetTop) {
      dragOver.appendChild(beingDragged)
    }
  }
  
}
function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}
function whichChild(el) {
  var i = 0;
  while ((el = el.previousSibling) != null) ++i;
  return i;
}