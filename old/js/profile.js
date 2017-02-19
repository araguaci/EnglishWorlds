function ShowMessage() {
  var XmlHttp = new XMLHttpRequest();
  XmlHttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("MessageBox").innerHTML = "You must wait to be poked back";
    }
  };
  XmlHttp.open("GET", "./profile.php", true);
  XmlHttp.send();
}
