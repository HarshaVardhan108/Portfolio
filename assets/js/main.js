/**
 * Portfolio interactions — Motion + abusaid-style chrome
 */
import {
  animate,
  inView,
  stagger,
} from "https://cdn.jsdelivr.net/npm/motion@11.15.0/+esm";

const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
const viewTarget = (entry) => (entry instanceof Element ? entry : entry?.target);

const revealAll = () => {
  document.querySelectorAll("[data-animate]").forEach((el) => {
    el.style.opacity = "1";
    el.style.transform = "none";
  });
};

window.setTimeout(() => {
  const hidden = [...document.querySelectorAll("[data-animate]")].some(
    (el) => getComputedStyle(el).opacity === "0"
  );
  if (hidden) revealAll();
}, 1800);

/* Header */
const header = document.getElementById("site-header");
const navToggle = document.querySelector(".nav-toggle");
const navLinks = document.querySelectorAll(".site-nav .nav-link[data-section]");
const backToTop = document.querySelector(".back-to-top");

const onScrollChrome = () => {
  const y = window.scrollY;
  header?.classList.toggle("is-scrolled", y > 16);
  backToTop?.classList.toggle("is-visible", y > 480);
};

window.addEventListener("scroll", onScrollChrome, { passive: true });
onScrollChrome();

navToggle?.addEventListener("click", () => {
  const open = document.body.classList.toggle("nav-open");
  navToggle.setAttribute("aria-expanded", String(open));
  navToggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
});

document.querySelectorAll('.site-nav a[href^="#"]').forEach((link) => {
  link.addEventListener("click", () => {
    document.body.classList.remove("nav-open");
    navToggle?.setAttribute("aria-expanded", "false");
  });
});

backToTop?.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: prefersReduced ? "auto" : "smooth" });
});

/* Active nav */
const sections = [...document.querySelectorAll("section[id]")];
const setActiveNav = () => {
  const pos = window.scrollY + 140;
  let current = "";
  for (const section of sections) {
    if (pos >= section.offsetTop) current = section.id;
  }
  navLinks.forEach((link) => {
    link.classList.toggle("is-active", link.dataset.section === current);
  });
};
window.addEventListener("scroll", setActiveNav, { passive: true });
setActiveNav();

/* Motion */
if (prefersReduced) {
  revealAll();
} else {
  document.querySelectorAll("#hero [data-animate]").forEach((el, i) => {
    const delay = Number(el.dataset.delay || i * 80) / 1000;
    animate(
      el,
      { opacity: 1, y: 0, x: 0 },
      { duration: 0.8, delay: 0.1 + delay, easing: [0.22, 1, 0.36, 1] }
    );
  });

  inView(
    "[data-animate]",
    (entry) => {
      const el = viewTarget(entry);
      if (!(el instanceof Element) || el.closest("#hero")) return;
      const delay = Number(el.dataset.delay || 0) / 1000;
      animate(
        el,
        { opacity: 1, y: 0, x: 0 },
        { duration: 0.65, delay, easing: [0.22, 1, 0.36, 1] }
      );
    },
    { margin: "0px 0px -8% 0px", amount: 0.12 }
  );

  inView(
    ".experience-list",
    (entry) => {
      const list = viewTarget(entry);
      if (!(list instanceof Element)) return;
      animate(
        list.querySelectorAll(".exp-card"),
        { opacity: [0, 1], y: [18, 0] },
        { delay: stagger(0.08), duration: 0.45, easing: [0.22, 1, 0.36, 1] }
      );
    },
    { amount: 0.2 }
  );

  document.querySelectorAll(".btn-gradient").forEach((btn) => {
    btn.addEventListener("pointermove", (e) => {
      const rect = btn.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      animate(btn, { x: x * 0.1, y: y * 0.15 }, { duration: 0.25 });
    });
    btn.addEventListener("pointerleave", () => {
      animate(btn, { x: 0, y: 0 }, { duration: 0.4, easing: [0.22, 1, 0.36, 1] });
    });
  });
}
