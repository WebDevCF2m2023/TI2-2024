function validateForm(e) {
  const form = document.querySelector(".form");
  const nom = document.getElementById("firstname").value;
  const prenom = document.getElementById("lastname").value;
  const mail = document.getElementById("usermail").value;
  const mess = document.getElementById("message").value;


  if (nom.length > 100 || prenom.length > 100) {
    alert("Le nom ou prénom doit avoir au max 100 caractéres");
    return false;
  } else if (!/@/.test(mail) || !/\./.test(mail)) {
    alert("email doit contenir un @ ");
    return false;
  }

  alert("Bienvenue " + firstname);
  return true;
}
