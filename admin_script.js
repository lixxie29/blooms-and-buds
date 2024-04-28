let navbar = document.querySelector('.header .flex .navbar');
let userBox = document.querySelector('.header .flex .account-box');

document.querySelector('#menu-btn').onclick = () => {
    console.log("da un semn")
    navbar.classList.toggle('active');
    userBox.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () => {
    navbar.classList.remove('active');
    userBox.classList.toggle('active');
}

window.onscroll = () => {
    navbar.classList.remove('active');
    userBox.classList.remove('active');
}