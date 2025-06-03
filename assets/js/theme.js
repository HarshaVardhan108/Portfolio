// Theme toggle functionality
function setTheme(theme) {
  document.documentElement.setAttribute("data-theme", theme);
  localStorage.setItem("theme", theme);

  // Update moon/sun icon
  const themeIcon = document.querySelector("#theme-toggle i");
  if (themeIcon) {
    if (theme === "dark") {
      themeIcon.classList.remove("bx-moon");
      themeIcon.classList.add("bx-sun");
    } else {
      themeIcon.classList.remove("bx-sun");
      themeIcon.classList.add("bx-moon");
    }
  }
}

function toggleTheme() {
  const currentTheme = document.documentElement.getAttribute("data-theme");
  const newTheme = currentTheme === "dark" ? "light" : "dark";
  setTheme(newTheme);
}

// Initialize theme
const savedTheme = localStorage.getItem("theme") || "light";
setTheme(savedTheme);
