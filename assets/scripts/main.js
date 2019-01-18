"use strict";

// /* NAVBAR START */
const hamburgerIcon = document.querySelector(".hamburger-icon");
const hamburgerMenu = document.querySelector(".nav-ist");
const nav = document.querySelector(".desktop-nav");
//for navbar
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


//for all img so that they popup
var images = [...document.querySelectorAll(".img-small")];
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

//when img popup, click on button then scroll
const descriptions = [...document.querySelectorAll(".description-btn")];
const texts = [...document.querySelectorAll(".description-text")];
descriptions.forEach(description => {
  description.addEventListener("click", () => {
    texts.forEach(text => {
      text.scrollIntoView(text);
    });
  });
});


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

//fetch database for likes
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

//fetch database for edit post
const slideEdit = document.querySelectorAll(".update-form");
slideEdit.forEach(edit => {
  edit.addEventListener("submit", event => {
    event.preventDefault();
    const formData = new FormData(edit);
    const postDescription = document.querySelector(".text-des");
    fetch('app/posts/update.php', {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(json => postDescription.textContent = json);
  });
});