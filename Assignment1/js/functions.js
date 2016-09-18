function encrypt(){
  var answer;
  var form = document.forms["form"];
  if(form["cipherType"].value == "1"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var encrypted = CryptoJS.AES.encrypt(message, key);
  }
  else if(form["cipherType"].value == "2"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var encrypted = CryptoJS.TripleDES.encrypt(message, key);
  }
  else if(form["cipherType"].value == "3"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var encrypted = CryptoJS.Rabbit.encrypt(message, key);
  }
  else if(form["cipherType"].value == "4"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var encrypted = CryptoJS.RC4.encrypt(message, key);
  }
  else if(form["cipherType"].value == "5"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var encrypted = new Blowfish(key);
      encoded = encrypted.base64Encode(encrypted.encrypt(message));
      encrypted = encrypted.encrypt(message);
  }

  if(form["cipherType"].value <= "3"){
    document.getElementById("output").innerHTML =
      "<h4>Base64 Object: </h4>" + encrypted +"<br>" +
      "<h4>Ciphertext: </h4>" + encrypted.ciphertext + "<br>" +
      "<h4>Actual Key: </h4>" + encrypted.key + "<br>" +
      "<h4>IV: </h4>" +   encrypted.iv + "<br>" +
      "<h4>Salt: </h4>" + encrypted.salt;
  }
  else if(form["cipherType"].value == "4"){
    document.getElementById("output").innerHTML =
      "<h4>Base64 Object: </h4>" + encrypted +"<br>" +
      "<h4>Ciphertext: </h4>" + encrypted.ciphertext + "<br>" +
      "<h4>Actual Key: </h4>" + encrypted.key + "<br>" +
      "<h4>Salt: </h4>" + encrypted.salt;
  }
  else{
    document.getElementById("output").innerHTML =
      "Base64 Object: " + encoded + "<br>" +
      "Ciphertext: " + encrypted;
  }
  return false;
}

function decrypt(){
  var answer;
  var form = document.forms["form"];
  if(form["cipherType"].value == "1"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var decrypted = CryptoJS.AES.decrypt(message, key);
      decrypted = decrypted.toString(CryptoJS.enc.Utf8);
  }
  else if(form["cipherType"].value == "2"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var decrypted = CryptoJS.TripleDES.decrypt(message, key);
      decrypted = decrypted.toString(CryptoJS.enc.Utf8);
  }
  else if(form["cipherType"].value == "3"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var decrypted = CryptoJS.Rabbit.decrypt(message, key);
      decrypted = decrypted.toString(CryptoJS.enc.Utf8);
  }
  else if(form["cipherType"].value == "4"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;
      var decrypted = CryptoJS.RC4.decrypt(message, key);
      decrypted = decrypted.toString(CryptoJS.enc.Utf8);
  }
  else if(form["cipherType"].value == "5"){
      var message = form["textInput"].value;
      var key = form["keyInput"].value;

      var decrypted = new Blowfish(key);
      decrypted = decrypted.trimZeros(decrypted.decrypt(message));
  }

  document.getElementById("output").innerHTML =
    "<h4>Decrypted String: </h4>" + decrypted;


  return false;
}
