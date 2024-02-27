const maxLengthMessage = 600;
const minLengthName = 4;
const maxLengthName = 100;
const maxHeightComment = 350;

const message = document.querySelector("#message");
const nom = document.querySelector("#nom");
const prenom = document.querySelector("#prenom");
const email = document.querySelector("#email");
const infosLengthMessage = document.querySelector("#infosLengthMessage");

const messageError = document.querySelector("#message-error");
const nomError = document.querySelector("#nom-error");
const prenomError = document.querySelector("#prenom-error");
const emailError = document.querySelector("#email-error");

const messageLabel = document.querySelector("label[for='message']");
const nomLabel = document.querySelector("label[for='nom']");
const prenomLabel = document.querySelector("label[for='prenom']");
const emailLabel = document.querySelector("label[for='email']");

const comments = document.querySelectorAll(".comment");
const informationMessage = document.querySelector("#information-message");

function validateForm(){
    informationMessage.style.display = "none";

    let checkOK = true;
    if(!isValidNomLength(nom.value.trim())){
        checkOK = false;
        nomError.style.display = "block";
    } else nomError.style.display = "none";
    if(!isValidPrenomLength(prenom.value.trim())){
        checkOK = false;
        prenomError.style.display = "block";
    } else prenomError.style.display = "none";
    const messageLength = getLengthMessage(message.value.trim());
    if(!isValidMessageLength(messageLength)){
        checkOK = false;
        messageError.style.display = "block";
    }else messageError.style.display = "none";
    if(!validEmail(email.value.trim())){
        checkOK = false;
        emailError.style.display = "block";
    }else emailError.style.display = "none";
    // Si true, le formulaire s'envoie
    // Si false, le formulaire ne s'envoie pas
    if(checkOK) alert(`Bienvenue ${prenom.value} ${nom.value}`);
    return checkOK;
}

addEventListener("resize", checkScrollY);
function checkScrollY(){
    comments.forEach(comment=>{
        if(comment.scrollHeight <= maxHeightComment){
            comment.classList.remove("scrollY");
            return;
        }
        comment.classList.add("scrollY");
    })
}
checkScrollY();

nom.addEventListener("input", ()=>{
    const valid = isValidNomLength(nom.value.trim());
    if(valid){
        nomError.style.display = "none";
    }
    setClassColor(nomLabel, valid);
});

prenom.addEventListener("input", ()=>{
    const valid = isValidPrenomLength(prenom.value.trim());
    if(valid){
        prenomError.style.display = "none";
    }
    setClassColor(prenomLabel, valid);
});

email.addEventListener("input", ()=>{
    const valid = validEmail(email.value.trim());
    if(valid){
        emailError.style.display = "none";
    }
    setClassColor(emailLabel, valid);
});

message.addEventListener("input", ()=>{
    const messageLength = getLengthMessage(message.value.trim());
    const valid = isValidMessageLength(messageLength);
    infosLengthMessage.textContent = messageLength + " / " + maxLengthMessage;
    if(!valid && !infosLengthMessage.classList.contains("error")){
        setClassColor(infosLengthMessage, false);
        setClassColor(messageLabel, false);
    }else if(valid && !infosLengthMessage.classList.contains("success")){
        messageError.style.display = "none";
        setClassColor(infosLengthMessage, true);
        setClassColor(messageLabel, true);
    }
});

/**
 * 
 * @param {HTMLElement} htmlElement 
 * @param {boolean} success
 */
function setClassColor(htmlElement, success){
    if(success){
        htmlElement.classList.add("success");
        htmlElement.classList.remove("error");
    }else{
        htmlElement.classList.add("error");
        htmlElement.classList.remove("success");
    }
}

/**
 * 
 * @param {string} prenom
 * @returns {boolean}
 */
function isValidPrenomLength(prenom){
    const length = getLengthMessage(prenom);
    return length >= minLengthName && length <= maxLengthName;
}

/**
 * 
 * @param {string} nom
 * @returns {boolean}
 */
function isValidNomLength(nom){
    const length = getLengthMessage(nom);
    return length === 0 || (length >= minLengthName && length <= maxLengthName);
}

/**
 *
 * @param {number} messageLength
 * @returns {boolean}
 */
function isValidMessageLength(messageLength){
    return messageLength != 0 && messageLength <= maxLengthMessage;
}

/**
 * 
 * @param {string} email 
 * @returns {boolean}
 */
function validEmail(email){
    return /\S+@\S+.*\.\S+/.test(email) && !/\s/.test(email);
}

/**
 * 
 * @param {string} message 
 * @returns {number}
 */
function getLengthMessage(message){
    return Array.from(message).length;
}