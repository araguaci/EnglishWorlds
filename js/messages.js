function toggle() {
  var id = document.getElementById('id').innerText;
  var ele = document.getElementById('toggleText' + id);
  var text = document.getElementById('displayText');
  if (ele.style.display == "block"){
    ele.style.display = "none";
  } else {
    ele.style.display = "block";
  }
}
