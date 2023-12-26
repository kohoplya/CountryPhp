
var but = document.getElementById("submitbutton");

/*********************************************************/

var name_input = document.getElementById("name_text");

name_input.addEventListener("input", function() {
    this.value = this.value[0].toUpperCase() + this.value.slice(1);
    but.disabled = false;
})

/*********************************************************/


var tel_input = document.getElementById("tel");

function phoneFormat(e) {
    if (e.data == null) {
        return
    }
    let str = e.target.value;
    let cleaned = ("" + str).replace(/\D/g, "");
    e.target.value = cleaned;
    let match = cleaned.match(/^(38|)?(\d{3})(\d{3})(\d{4})$/);
    if (match) {
        e.target.value = ["+38", "(", match[2], ")-", match[3], "-", match[4]].join("")
    }
}

tel_input.addEventListener("input", phoneFormat);

/*********************************************************/

var country_input = document.getElementById("country_text");

country_input.addEventListener("input", function() {
    this.value = this.value[0].toUpperCase() + this.value.slice(1);
  })

/*********************************************************/

var capital_input = document.getElementById("capital_text");

capital_input.addEventListener("input", function() {
    this.value = this.value[0].toUpperCase() + this.value.slice(1);
})

/*********************************************************/

var area_input = document.getElementById("area_text");

area_input.addEventListener("focusout", function() {
    if (area_input.value != ""){
        area_input.value = area_input.value + " км²";
    }
});

/*********************************************************/

function validateInput(inputElement, pattern) {
    var errorElement = inputElement.nextElementSibling;
    
    if (!errorElement || !errorElement.classList.contains('error-message')) {
        errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        inputElement.insertAdjacentElement('afterend', errorElement);
    }

    if (inputElement.value == "") {
        inputElement.style.backgroundColor = "var(--main_color)";
        if (errorElement.nextElementSibling.innerHTML.trim() == ''){
            errorElement.textContent = 'Поле має бути заповнене';
        }else{
            errorElement.nextElementSibling.textContent = ''
            errorElement.textContent = 'Поле має бути заповнене';
        }
        return false;
    } else if (pattern && !pattern.test(inputElement.value)) {
        inputElement.style.backgroundColor = "var(--main_color)";
        if (errorElement.nextElementSibling.innerHTML.trim() == ''){
            errorElement.textContent = 'Поле заповнене не за шаблоном';
        } else {
            errorElement.nextElementSibling.textContent = ''
            errorElement.textContent = 'Поле заповнене не за шаблоном';
        }
        return false;
    } else {
        inputElement.style.backgroundColor = "";
        errorElement.textContent = '';
        return true;
    }
}

name_input.addEventListener('input', function () {
    validateInput(name_input, /^[A-Za-zА-Яа-яЁёІі]+$/u);
});

tel_input.addEventListener('input', function () {
    validateInput(tel_input, /^(\+38|\+380)?\(\d{3}\)-\d{3}-\d{4}$/);
});

country_input.addEventListener('input', function () {
    validateInput(country_input);
});


area_input.addEventListener("focusout", function() {
    area_pattern = /^\d+ км²$/;
    var errorElement = area_input.nextElementSibling;

    if (!area_pattern.test(area_input.value)) {
        if (!errorElement || !errorElement.classList.contains('error-message')){
            errorElement.textContent = 'Поле заповнене не за шаблоном';
        }
    }else {
        errorElement.textContent = '';
    }

    if (area_input.value == ""){
        errorElement.textContent = '';
    }
});

var form = document.getElementById('form');

// form.addEventListener('submit', function (event) {
//     event.preventDefault();

//     var isNameValid = validateInput(name_input);
//     var isTelValid = validateInput(tel_input, /^(\+38|\+380)?\(\d{3}\)-\d{3}-\d{4}$/);
//     var isCountryValid = validateInput(country_input);

//     if (isNameValid && isTelValid && isCountryValid) {
//         form.submit();
//     }
// });