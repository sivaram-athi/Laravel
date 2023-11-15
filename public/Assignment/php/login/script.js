const containerBox = document.querySelector(".container");
const signInBtn = document.querySelector(".select-sign-in-btn");
const signUpBtn = document.querySelector(".select-sign-up-btn");

signInBtn.addEventListener("click", function() {
  containerBox.classList.toggle("active");
});

signUpBtn.addEventListener("click", function() {
  containerBox.classList.toggle("active");
});