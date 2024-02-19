const formContainer = document.getElementById("form");
    
formContainer.addEventListener("submit", function(event) {
    event.preventDefault();

    function checkPassword() {
        var age = document.getElementById("age").value;

        if (age < 18) {
            alert("Vous n'êtes pas majeur. Acces refusé.");
        } else {
            alert("Good");
            window.location.href = "";
        }
    }

    checkPassword();
});