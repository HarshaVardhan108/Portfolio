<?php
require_once __DIR__ . '/config.php';
$pageTitle = $pageTitle ?? SITE_NAME . ' — Portfolio';
$pageDescription = $pageDescription ?? 'Portfolio of Harsha Vardhan — Web Developer & Programmer based in Tirupati.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="theme-color" content="#0d1224">

  <link rel="icon" href="<?= BASE_PATH ?>assets/img/favicon.png">
  <link rel="apple-touch-icon" href="<?= BASE_PATH ?>assets/img/apple-touch-icon.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="<?= BASE_PATH ?>assets/css/style.css" rel="stylesheet">
  <script>
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      document.documentElement.classList.add('motion-on');
    }
  </script>
</head>
<body>
  <header class="site-header" id="site-header">
    <div class="header-inner container">
      <a href="<?= BASE_PATH ?>index.php" class="brand">HARSHA VARDHAN</a>

      <button class="nav-toggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="site-nav">
        <span></span><span></span>
      </button>

      <nav class="site-nav" id="site-nav" aria-label="Primary">
        <ul>
          <li><a href="#about" class="nav-link" data-section="about">ABOUT</a></li>
          <li><a href="#experience" class="nav-link" data-section="experience">EXPERIENCE</a></li>
          <li><a href="#skills" class="nav-link" data-section="skills">SKILLS</a></li>
          <li><a href="#education" class="nav-link" data-section="education">EDUCATION</a></li>
          <li><a href="<?= BASE_PATH ?>blogs/blog.html" class="nav-link">BLOGS</a></li>
          <li><a href="#projects" class="nav-link" data-section="projects">PROJECTS</a></li>
        </ul>
      </nav>
    </div>
  </header>
