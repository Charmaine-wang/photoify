"use strict";

// /* NAVBAR START */

const hamburgerIcon = document.querySelector(".hamburger-icon");
const hamburgerMenu = document.querySelector(".nav-ist");
const nav = document.querySelector(".desktop-nav");
const firstpage = document.querySelector("#firstpage-sek");
//


// const postImage = [...document.querySelectorAll(".post-image")];
hamburgerIcon.addEventListener("click", () => {
  hamburgerMenu.classList.toggle("nav-ist__visible");
  hamburgerIcon.classList.toggle("transform");
});


// post button change comment or delete posts
const posts = [...document.querySelectorAll(".change-post")];
const postImage = [...document.querySelectorAll(".post-image")];

postImage.forEach(image => {
  image.addEventListener('click', event => {
    const imgId = event.target.dataset.id;
    const postBig = document.querySelector(`.post-image[data-id="${imgId}"]`);
    postBig.classList.toggle('post-image')
    image.addEventListener('click', event => {
      posts.forEach(post => {

        post.addEventListener('click', event => {
          const id = event.target.dataset.id;
          const postEdit = document.querySelector(`.post-edit[data-id="${id}"]`);
          postEdit.classList.toggle('slide-edit')
          // postEdit.classList.add('.slide-edit');
        });
      });
    })
  })
})



// postImage.forEach(image => {
//
//   image.addEventListener('click', event => {
//     const imgId = event.target.dataset.id;
//     const postBig = document.querySelector(`.post-image[data-id="${imgId}"]`);
//     postBig.classList.toggle('post-image')
//
//
//   })
// })

//
// const posts = [...document.querySelectorAll(".change-post")];
// posts.forEach(post => {
//
//   post.addEventListener('click', event => {
//     const id = event.target.dataset.id;
//     const postEdit = document.querySelector(`.post-edit[data-id="${id}"]`);
//     postEdit.classList.toggle('slide-edit')
//     // postEdit.classList.add('.slide-edit');
//   });
// });




//
// // set tiomout på firstpage-sek lägg till en ny
// // class och ge firstpage-sek display none
//
// // const fistpageSek = document.querySelector(".firstpage-sek");
// const navBar = document.querySelector(".navbar");
//
// console.log(".navbar");
// const landingPage = window.location.href = "";
//
// landingPage.setTimeout(function() {
//   // Move to a new location or you can do something else
//
//
//
// }, 3000);


//DENNA FUNKAR
// const posts = [...document.querySelectorAll(".change-post")];
//
//   posts.forEach(post => {
//
//     post.addEventListener('click', event => {
//       const id = event.target.dataset.id;
//       const postEdit = document.querySelector(`.post-edit[data-id="${id}"]`);
//       postEdit.classList.toggle('slide-edit')
//       // postEdit.classList.add('.slide-edit');
//     });
//
//