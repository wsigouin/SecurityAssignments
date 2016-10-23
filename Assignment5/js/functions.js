function register(){
  var form = document.forms["loginForm"];
  var username = form["username"].value;
  var hash = CryptoJS.SHA512(form["password"]);

}
