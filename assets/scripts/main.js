"use strict";

console.log("hej");
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