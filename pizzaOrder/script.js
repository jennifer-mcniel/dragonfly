// main
const email = document.getElementById("inputEmail");

function validateForm() {
    return validateEmail() && validatePhone() && validateCity() && validateToppings();
}

// email - yadira
function validateEmail() {
    const re= /[^\s@]+@[^\s@]+\.[^\s@]+/;

    if(email.value.includes("@greenriver.edu") && email.value.match(re)) {
        return true;
    }
    alert("Invalid Email: email must end in @greenriver.edu");

    return false;
}

//topping validator
function validateToppings() {
    var inputs = document.getElementsByTagName('input');
    count = 0;
    for(var i = 0; i<inputs.length; i++) {
        if(inputs[i].type === "checkbox" && inputs[i].checked === true) {
            count++;
        }
    }
    if (count > 3) {
        alert("too many toppings!");
        event.preventDefault();
    } else if (count < 3) {
        alert("too little toppings!")
        event.preventDefault();
    }
}

//city/state validator
function validateCity(){
    let city = document.getElementById('inputCity');
    let cityLower = city.value.toLowerCase();

    switch (cityLower.trim()){
        case ('seattle'):
        case ('kent'):
        case ('auburn'):
        case ('burien'):
        case ('seatac'):
            return true;
        case (''):
        case null:
            alert("City cannot be blank.")
            return false;
        default:
            alert("A $25 delivery fee will be added to you order total!")
            return true;
    }
}

//phone/email validator

function validatePhone() {
    const phoneRe =  /^1?[0-9]{3}-?[0-9]{3}-?[0-9]{4}$/

    let phone = document.querySelector("input[name='Telephone']").value;
    console.log(phone);

    if (String(phone)
        .match(phoneRe)) {
        console.log("matched");
        return true;
    }

    alert("Must use a phone number.");
    return false;
}


