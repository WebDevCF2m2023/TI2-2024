const formContainer = document.getElementById("form");
    
formContainer.addEventListener("submit"), function(event) {
    event.preventDefault()

    function checking () {
        var names = document.getElementById("nom");

        var lengthCheck = names.lenght === 8;
        var funnyCharCheck = /[@+-*/"'()§!&^?]/.test(names);

        if (names === true) {
            alert("Bienvenue !")
            window.location.replace("")
        }
    }

   
}