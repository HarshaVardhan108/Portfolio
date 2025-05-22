document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".php-email-form");
  const loadingDiv = form.querySelector(".loading");
  const errorDiv = form.querySelector(".error-message");
  const sentDiv = form.querySelector(".sent-message");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    // Show loading
    loadingDiv.style.display = "block";
    errorDiv.style.display = "none";
    sentDiv.style.display = "none";

    try {
      const formData = {
        name: form.querySelector('input[name="name"]').value,
        email: form.querySelector('input[name="email"]').value,
        subject: form.querySelector('input[name="subject"]').value,
        message: form.querySelector('textarea[name="message"]').value,
      };

      const response = await fetch("http://localhost:3000/api/contact", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      });

      const data = await response.json();

      if (response.ok) {
        // Show success message
        loadingDiv.style.display = "none";
        sentDiv.style.display = "block";
        form.reset();
      } else {
        throw new Error(data.message || "Something went wrong");
      }
    } catch (error) {
      // Show error message
      loadingDiv.style.display = "none";
      errorDiv.textContent = error.message;
      errorDiv.style.display = "block";
    }
  });
});
