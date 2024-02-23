const formContainer = document.getElementById("form");

formContainer.addEventListener("submit", function(event) {
    event.preventDefault();

    function checking () {
        var firstName = document.getElementById("prenom").value;
        var secondName = document.getElementById("nom").value;
        var mail = document.getElementById("email").value;
        var msg = document.getElementById("message").value;

        if (firstName.length >= 10 || secondName.length >= 10 || msg.length >= 100 || !/@/.test(mail) || !/\./.test(mail)) {
            alert("Maybe.");
        } else {
            alert("Nope.");
            
        }
    }

    checking();
});