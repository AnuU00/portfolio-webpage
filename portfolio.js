// Wait for the DOM to fully load
document.addEventListener("DOMContentLoaded", function () {
    // Image Slider
    const images = [
      "work1.jpeg",
      "work2.jpeg",
      "work3.jpeg",
      "work4.jpeg",
    ];
    let currentImageIndex = 0;
  
    const sliderImage = document.getElementById("sliderImage");
  
    function changeImage(index) {
      sliderImage.src = images[index];
    }
  
    function nextImage() {
      currentImageIndex = (currentImageIndex + 1) % images.length;
      changeImage(currentImageIndex);
    }
  
    function prevImage() {
      currentImageIndex =
        (currentImageIndex - 1 + images.length) % images.length;
      changeImage(currentImageIndex);
    }
  
    const nextButton = document.getElementById("nextButton");
    const prevButton = document.getElementById("prevButton");
  
    nextButton.addEventListener("click", nextImage);
    prevButton.addEventListener("click", prevImage);
  
    // Smooth Scrolling
    const navLinks = document.querySelectorAll("nav a");
  
    navLinks.forEach((link) => {
      link.addEventListener("click", (event) => {
        event.preventDefault();
        const targetId = link.getAttribute("href");
        const targetElement = document.querySelector(targetId);
        targetElement.scrollIntoView({ behavior: "smooth" });
      });
    });
  
    // Form Validation
    const contactForm = document.getElementById("contactForm");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");
  
    contactForm.addEventListener("submit", function (event) {
      let isValid = true;
  
      if (!isValidEmail(emailInput.value)) {
        isValid = false;
        emailInput.classList.add("invalid");
      } else {
        emailInput.classList.remove("invalid");
      }
  
      if (!isValidPhone(phoneInput.value)) {
        isValid = false;
        phoneInput.classList.add("invalid");
      } else {
        phoneInput.classList.remove("invalid");
      }
  
      if (!isValid) {
        event.preventDefault();
      }
    });
  
    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  
    function isValidPhone(phone) {
      const phoneRegex = /^[0-9]{10}$/;
      return phoneRegex.test(phone);
    }
  
    // Custom Animation
    const animateElements = document.querySelectorAll(".animate");
  
    animateElements.forEach((element) => {
      element.style.opacity = 0;
      element.style.transform = "translateY(20px)";
    });
  
    function animateOnScroll() {
      animateElements.forEach((element) => {
        const rect = element.getBoundingClientRect();
        if (rect.top < window.innerHeight - 50) {
          element.style.opacity = 1;
          element.style.transform = "translateY(0)";
        }
      });
    }
  
    window.addEventListener("scroll", animateOnScroll);
  });
  
