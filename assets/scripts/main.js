"use strict";

// /* NAVBAR START */

const hamburgerIcon = document.querySelector(".hamburger-icon");
const hamburgerMenu = document.querySelector(".nav-ist");
const nav = document.querySelector(".desktop-nav");
//

// const postImage = [...document.querySelectorAll(".post-image")];
hamburgerIcon.addEventListener("click", () => {
  hamburgerMenu.classList.toggle("nav-ist__visible");
  hamburgerIcon.classList.toggle("transform");
});

// post button change comment or delete posts
const posts = [...document.querySelectorAll(".change-post")];

posts.forEach(post => {
  post.addEventListener("click", () => {
    const id = post.dataset.id;
    //dont need to selectAll only one with id
    const postsEdit = document.querySelector(`.post-edit[data-id="${id}"]`);

    postsEdit.classList.toggle("slide-edit");
  });
});

// });

// Get the modal
// var imagesPop = [...document.querySelectorAll(".img-pop")];

// Get the image and insert it inside the modal - use its "alt" text as a caption
var images = [...document.querySelectorAll(".img-small")];
// var modalImg = [...document.querySelectorAll(".img01")];
// var captionText = document.getElementById("caption");

images.forEach(img => {
  img.onclick = function() {
    scrollTo(0, 0);
    hamburgerIcon.classList.remove("hamburger-icon");
    const id = event.target.dataset.id;
    const imagesPop = [
      ...document.querySelectorAll(`.img-pop[data-id="${id}"]`)
    ];

    imagesPop.forEach(imgPop => {
      imgPop.style.display = "block";
    });
  };
});

const descriptions = [...document.querySelectorAll(".description-btn")];
const texts = [...document.querySelectorAll(".description-text")];

descriptions.forEach(description => {
  description.addEventListener("click", () => {
    texts.forEach(text => {
      text.scrollIntoView(text);
    });
  });
});

// Get the <span> element that closes the modal
var spander = document.querySelectorAll(".close");

spander.forEach(span => {
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    const id = event.target.dataset.id;
    var imagesPop = [...document.querySelectorAll(`.img-pop[data-id="${id}"]`)];
    imagesPop.forEach(imgPop => {
      imgPop.style.display = "none";
      hamburgerIcon.classList.add("hamburger-icon");
    });
  };
});

const formsLikes = document.querySelectorAll(".likes-form");

formsLikes.forEach(form => {
  form.addEventListener("submit", event => {

    event.preventDefault();

    const formData = new FormData(form);

    fetch('app/posts/likes.php', {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(json => form[1].children[0].children[1].textContent = json);
  });
});

const likesHeart = document.querySelectorAll(".likes-heart");

likesHeart.forEach(heart => {
  if (heart) {
    heart: active.style.color = "red";
  }
})