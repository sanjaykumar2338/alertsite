function singleSelection(id) {

    var myCheckbox = document.getElementsByName("alert_checkbox[]");
    Array.prototype.forEach.call(myCheckbox, function (el) {
        el.checked = false;
    });

    id.checked = true;
}

/* ON and off slide */
var onCurrent = document.querySelector('.slider');
var onOption = document.querySelector('.on-label');
var offOption = document.querySelector('.off-label');

var switcher = function (elemTarget) {

    if (elemTarget.classList.contains('end')) {
        elemTarget.classList.remove("end");
    } else {
        elemTarget.classList.add("end");
    }

}

if (offOption && onCurrent) {

    offOption.classList.add("end");
    onCurrent.addEventListener('click', function (ev) {
        switcher(onOption);
        switcher(offOption);
    });

}

/* Accordion */
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

const d = new Date();
let year = d.getFullYear();
document.getElementById("ftr_yr").innerHTML = `@` + year;
