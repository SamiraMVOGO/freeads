import './bootstrap';
document.addEventListener("DOMContentLoaded", () => {
    const passIn = document.getElementById("password");
    const btn = document.getElementById("togglePassword");
    if (btn) {
              btn.addEventListener("click", function () {
        const type =
            passIn.getAttribute('type') ===
                "password" ? "text" : "password";
        passIn.setAttribute("type", type);
    });

    }
    
  
    const passIn2 = document.getElementById("password_confirmation");
    const btn2 = document.getElementById("togglePassword2");
    if (btn2){
          btn2.addEventListener("click", function () {
        const type =
            passIn2.getAttribute('type') ===
                "password" ? "text" : "password";
        passIn2.setAttribute("type", type);
    });
    }
  
var modal = document.getElementById("myModal");
var span = document.querySelectorAll(".close")[0];


if (span){
span.onclick = function() {
  modal.style.display = "none";
}
}

});

var modalDelete = document.getElementById("myModalDelete");

var spanDelete = document.querySelectorAll(".closeDelete")[0];

if (spanDelete){
spanDelete.onclick = function() {
  modalDelete.style.display = "none";
}
}
