const formContainer = document.getElementById("form");
    
formContainer.addEventListener("submit"), function(event) {
    event.preventDefault();

    function checking () {
        var firstName = document.getElementById("#prenom");
        var secondName = document.getElementById("#nom");
        var mail = document.getElementById("#email");
        var msg = document.getElementById("#message");

        if (firstName.lenght < 10 && secondName.lenght < 10 && mail && /[!@#$%^&*(),.?":{}|<>'-+/]/.test(mail) && msg.lenght < 100)
        alert("les conditions n'ont pas été respectées.");

        else
        alert("Bienvenu !");
        window.location.replace("http://2023.webdev-cf2m.be/");
}

        checking();
}