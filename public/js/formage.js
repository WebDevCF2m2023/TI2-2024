// document.querySelector("form").addEventListener("submit", verifAge);
// Coder en négativité qui permet d'éviter l'effet cascade if if if if else else else else
function verifAge(event){
    const age = document.querySelector("#age").value;
    if(age <= 20){
        document.querySelector("#error-mineur").style.display = "block";
        // alert("Tu n'es pas majeur");
        return false; // Lui est comme notre else, il stop le code ici
    }

    // Redirection si l'age est correct
    window.location.href = "/?p=livredor&age=" + age;

    return false; // Dans tout les cas, on utilise pas le form. On fait une redirection custom.
}