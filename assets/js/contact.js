/**
 * Contact form → PHP API
 */
const form = document.getElementById("contact-form");
if (!form) {
  // page without contact form
} else {
  const status = form.querySelector(".form-status");
  const submitBtn = form.querySelector('button[type="submit"]');
  const label = submitBtn?.querySelector(".btn-label");
  const loading = submitBtn?.querySelector(".btn-loading");

  const setBusy = (busy) => {
    if (!submitBtn) return;
    submitBtn.disabled = busy;
    if (label) label.hidden = busy;
    if (loading) loading.hidden = !busy;
  };

  const showStatus = (ok, message) => {
    if (!status) return;
    status.hidden = false;
    status.textContent = message;
    status.classList.toggle("is-success", ok);
    status.classList.toggle("is-error", !ok);
  };

  form.addEventListener("submit", async (event) => {
    event.preventDefault();
    setBusy(true);
    if (status) status.hidden = true;

    const payload = {
      csrf_token: form.querySelector('[name="csrf_token"]')?.value || "",
      website: form.querySelector('[name="website"]')?.value || "",
      name: form.querySelector('[name="name"]')?.value?.trim() || "",
      email: form.querySelector('[name="email"]')?.value?.trim() || "",
      subject: form.querySelector('[name="subject"]')?.value?.trim() || "",
      message: form.querySelector('[name="message"]')?.value?.trim() || "",
    };

    try {
      const res = await fetch("api/contact.php", {
        method: "POST",
        headers: { "Content-Type": "application/json", Accept: "application/json" },
        body: JSON.stringify(payload),
        credentials: "same-origin",
      });

      const data = await res.json().catch(() => ({}));
      if (!res.ok || !data.ok) {
        throw new Error(data.message || "Could not send your message. Please try again.");
      }

      showStatus(true, data.message || "Message sent. Thank you!");
      form.reset();
    } catch (err) {
      showStatus(false, err.message || "Something went wrong.");
    } finally {
      setBusy(false);
    }
  });
}
