
document.addEventListener("DOMContentLoaded", function () {
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    const logIn = $('.header_login'); // Nút "Login"
    const sigUp = $('.header_register'); // Nút "Signup"

    logIn.onclick = function () {
        window.location.href = '../admin/login.php'
    }
    sigUp.onclick = function () {
        window.location.href = '../admin/register.php'
    }

})
