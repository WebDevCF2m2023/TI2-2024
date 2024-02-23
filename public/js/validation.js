const form = document.querySelector("form");

function submitForm() {
  let nom = document.getElementById("#prenom").value;
  let prenom = document.getElementById("#nom").value;
  let mail = document.getElementById("#message").value;
  let message = document.getElementById("#email").value;

  const scoreDiv = document.getElementById("#score");

  let Amessage = "Bienvenue " + prenom + " " + nom + "!";

  if (
    prenom.length <= 100 &&
    nom.length <= 100 &&
    message.length <= 600 &&
    /@/.test(mail)
  ) {
    alert(Amessage);
    scoreDiv.textContent = "Insertion réussie !";
    scoreDiv.textAlign = "center";
    scoreDiv.style.color = "lightgreen";
    scoreDiv.style.fontWeight = "bold";
    setTimeout(function () {
      form.submit();
    }, 1000);
  } else {
    scoreDiv.textContent = "Veuillez remplir tous les critères.";
    scoreDiv.style.textAlign = "Center";
    scoreDiv.style.color = "red";
  }

  return false;
}
