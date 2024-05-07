let userBox = document.querySelector('.header .flex .account-box');
let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#user-btn').onclick = () => {
    userBox.classList.toggle('active');
    navbar.classList.remove('active');
}

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    userBox.classList.remove('active');
}

window.onscroll = () =>{
    userBox.classList.remove('active');
    navbar.classList.remove('active');
}




// get the modal
var modal = document.getElementById('myModal');

// get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('maisy');
var modalImg = document.getElementById("modal-img");


if(img !== null){
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}}

// get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// when the user clicks on <span> (x), close the modal
if(span){
    span.onclick = function(){
        modal.style.display = "none";
    }
}




$(document).ready(function(){  
    $(".box:gt(3)").addClass("hidden");
    
    $("#load-button").click(function() {
        $(".box.hidden").slice(0, 3).removeClass("hidden"); // Show the next 3 hidden posts
        if ($(".box.hidden").length === 0) {
            $(this).hide(); // Hide the button when all posts are shown
        }
    });
})