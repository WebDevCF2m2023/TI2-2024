function validateForm(e){

    const nom = document.querySelector("#firstname").value;
    const email = document.querySelector("#usermail").value;
    const theMessage = document.querySelector("#message").value;

    const validNom = nom.length >= 100;
    const validEmail = /@/.test(usermail) && /\./.test(usermail);
    const validTheMessage = theMessage.trim().length > 600;
}