const warpper = document.querySelector('.warpper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');

registerLink.onclick = () => {
    warpper.classList.add('active');
}

loginLink.onclick = () => {
    warpper.classList.remove('active');
}
