"use strict";

// /* NAVBAR START */

const hamburgerIcon = document.querySelector(".hamburger-icon");
const hamburgerMenu = document.querySelector(".nav-ist");
const nav = document.querySelector(".desktop-nav");

hamburgerIcon.addEventListener("click", () => {
  hamburgerMenu.classList.toggle("nav-ist__visible");
  hamburgerIcon.classList.toggle("transform");
});


// post button change comment or delete posts
const posts = [...document.querySelectorAll(".change-post")];

posts.forEach(post => {

  post.addEventListener('click', event => {
    const id = event.target.dataset.id;
    const postEdit = document.querySelector(`.post-edit[data-id="${id}"]`);
    postEdit.classList.toggle('slide-edit')
    // postEdit.classList.add('.slide-edit');
  });
});

// set tiomout på firstpage-sek lägg till en ny
// class och ge firstpage-sek display none

// const fistpageSek = document.querySelector(".firstpage-sek");