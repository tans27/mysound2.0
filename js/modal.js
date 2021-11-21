// Form register
const registerBtns = document.querySelectorAll('.btn-sign-up')
const modalRegister = document.querySelector('.js-modal-register')
const modalCloses = document.querySelectorAll('.js-modal-close')

function showRegister() {
    modalRegister.classList.add('open')
    modalLogin.classList.remove('open')
}

function hideRegister() {
    modalRegister.classList.remove('open')
}

for (const registerBtn of registerBtns) {
    registerBtn.addEventListener('click',showRegister)
}

for (const modalClose of modalCloses) {
    modalClose.addEventListener('click',hideRegister)
}

//Form Login
const loginBtns = document.querySelectorAll('.btn-log-in')
const modalLogin = document.querySelector('.js-modal-login')
const modalClose = document.querySelectorAll('.js-modal-close')

function showLogin() {
    modalLogin.classList.add('open')
    modalRegister.classList.remove('open')
}

function hideLogin() {
    modalLogin.classList.remove('open')
}

for (const loginBtn of loginBtns) {
    loginBtn.addEventListener('click',showLogin)
}

for (const modalClose of modalCloses) {
    modalClose.addEventListener('click',hideLogin)
}
