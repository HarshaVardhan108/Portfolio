document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".php-email-form");
  const loadingDiv = form.querySelector(".loading");
  const errorDiv = form.querySelector(".error-message");
  const sentDiv = form.querySelector(".sent-message");
  const submitButton = form.querySelector("button[type='submit']");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    // Disable submit button and show loading
    submitButton.disabled = true;
    loadingDiv.style.display = "block";
    errorDiv.style.display = "none";
    sentDiv.style.display = "none";

    try {
      const formData = {
        name: form.querySelector('input[name="name"]').value.trim(),
        email: form.querySelector('input[name="email"]').value.trim(),
        subject: form.querySelector('input[name="subject"]').value.trim() || "No Subject",
        message: form.querySelector('textarea[name="message"]').value.trim()
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
        // Show success message and reset form
        loadingDiv.style.display = "none";
        sentDiv.style.display = "block";
        form.reset();
        submitButton.disabled = false;
      } else {
        throw new Error(data.message || "Failed to send message");
      }
    } catch (error) {
      // Show error message and re-enable submit button
      loadingDiv.style.display = "none";
      errorDiv.textContent = error.message;
      errorDiv.style.display = "block";
      submitButton.disabled = false;
    }
  });
});
