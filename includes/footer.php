<?php
$year = (int) date('Y');
?>
  <footer class="site-footer">
    <div class="container footer-inner">
      <p>&copy; <?= $year ?> Developer Portfolio by <a href="<?= BASE_PATH ?>index.php"><?= htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8') ?></a></p>
      <div class="footer-social">
        <a href="<?= htmlspecialchars(SITE_GITHUB, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="GitHub"><i class="bi bi-github"></i></a>
        <a href="<?= htmlspecialchars(SITE_LINKEDIN, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
        <a href="<?= BASE_PATH ?>bucketList.html" aria-label="Bucket list"><i class="bi bi-list-check"></i></a>
      </div>
    </div>
  </footer>

  <button class="back-to-top" type="button" aria-label="Back to top">
    <i class="bi bi-arrow-up"></i>
  </button>

  <script type="module" src="<?= BASE_PATH ?>assets/js/main.js"></script>
  <script type="module" src="<?= BASE_PATH ?>assets/js/contact.js"></script>
</body>
</html>
