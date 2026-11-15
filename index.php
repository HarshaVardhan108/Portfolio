<?php
$pageTitle = 'Harsha Vardhan — Portfolio';
$pageDescription = 'Passionate web developer and programmer building clean, user-friendly applications.';
require_once __DIR__ . '/includes/header.php';
?>

  <main id="main">
    <!-- Hero -->
    <section id="hero" class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy" data-animate="fade-up">
          <h1>
            Hello,<br>
            This is <span class="text-pink">HARSHA VARDHAN</span>, I'm a Professional
            <span class="text-green">Web Developer</span>.
          </h1>

          <div class="hero-social">
            <a href="<?= htmlspecialchars(SITE_GITHUB, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="GitHub"><i class="bi bi-github"></i></a>
            <a href="<?= htmlspecialchars(SITE_LINKEDIN, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a href="mailto:<?= htmlspecialchars(SITE_EMAIL, ENT_QUOTES, 'UTF-8') ?>" aria-label="Email"><i class="bi bi-envelope-fill"></i></a>
            <a href="<?= BASE_PATH ?>bucketList.html" aria-label="Bucket list"><i class="bi bi-journal-check"></i></a>
          </div>

          <div class="hero-actions">
            <a href="#contact" class="btn btn-outline">
              <i class="bi bi-person-fill"></i> Contact me
            </a>
            <a href="mailto:<?= htmlspecialchars(SITE_EMAIL, ENT_QUOTES, 'UTF-8') ?>?subject=Resume%20Request" class="btn btn-gradient">
              <i class="bi bi-download"></i> Get Resume
            </a>
          </div>
        </div>

        <div class="hero-code" data-animate="fade-left" data-delay="120">
          <div class="code-window">
            <div class="code-dots">
              <span class="dot red"></span>
              <span class="dot amber"></span>
              <span class="dot green"></span>
            </div>
            <pre class="code-body" aria-hidden="true"><code><span class="c-pink">const</span> <span class="c-white">coder</span> <span class="c-pink">=</span> <span class="c-gray">{</span>
  <span class="c-white">name:</span> <span class="c-amber">'Harsha Vardhan'</span><span class="c-gray">,</span>
  <span class="c-white">skills:</span> <span class="c-gray">[</span><span class="c-amber">'HTML'</span><span class="c-gray">,</span> <span class="c-amber">'CSS'</span><span class="c-gray">,</span> <span class="c-amber">'JavaScript'</span><span class="c-gray">,</span>
             <span class="c-amber">'Java'</span><span class="c-gray">,</span> <span class="c-amber">'React'</span><span class="c-gray">,</span> <span class="c-amber">'SQL'</span><span class="c-gray">,</span>
             <span class="c-amber">'MySQL'</span><span class="c-gray">,</span> <span class="c-amber">'Git'</span><span class="c-gray">],</span>
  <span class="c-white">hardWorker:</span> <span class="c-orange">true</span><span class="c-gray">,</span>
  <span class="c-white">quickLearner:</span> <span class="c-orange">true</span><span class="c-gray">,</span>
  <span class="c-white">problemSolver:</span> <span class="c-orange">true</span><span class="c-gray">,</span>
  <span class="c-green">hireable:</span> <span class="c-orange">function</span><span class="c-gray">() {</span>
    <span class="c-orange">return</span> <span class="c-gray">(</span>
      <span class="c-cyan">this.</span><span class="c-white">hardWorker</span> <span class="c-amber">&amp;&amp;</span>
      <span class="c-cyan">this.</span><span class="c-white">problemSolver</span> <span class="c-amber">&amp;&amp;</span>
      <span class="c-cyan">this.</span><span class="c-white">skills.length</span> <span class="c-amber">&gt;=</span> <span class="c-orange">5</span>
    <span class="c-gray">);</span>
  <span class="c-gray">};</span>
<span class="c-gray">};</span></code></pre>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="section about">
      <div class="container about-layout">
        <div class="about-body" data-animate="fade-up">
          <div class="section-rail">
            <span>ABOUT ME</span>
          </div>
          <h2 class="text-green section-title-lg">Who I am?</h2>
          <p>
            My name is <strong>HARSHA VARDHAN</strong>. I am a professional and enthusiastic programmer in my daily life.
            I am a quick learner with a self-learning attitude. I love to learn and explore new technologies and am
            passionate about problem-solving. I love almost all the stacks of web application development and love to
            make the web more open to the world. My core skill is based on web technologies and I love to build
            user-friendly applications. I am available for any kind of job opportunity that suits my skills and interests.
          </p>
        </div>
        <figure class="about-photo" data-animate="fade-left">
          <img src="<?= BASE_PATH ?>assets/img/My Image.jpg" alt="Harsha Vardhan" width="420" height="520">
        </figure>
      </div>
    </section>

    <!-- Experience -->
    <section id="experience" class="section experience">
      <div class="container">
        <div class="section-pill" data-animate="fade-up"><span>Experiences</span></div>

        <div class="experience-grid">
          <div class="experience-art" data-animate="fade-right" aria-hidden="true">
            <div class="exp-illustration">
              <i class="bi bi-laptop"></i>
              <div class="exp-glow"></div>
            </div>
          </div>

          <div class="experience-list">
            <article class="exp-card" data-animate="fade-up">
              <div class="exp-icon"><i class="bi bi-person-workspace"></i></div>
              <div class="exp-content">
                <span class="exp-date">(2020 — Present)</span>
                <h3>FRONTEND DEVELOPER</h3>
                <p>Personal &amp; freelance projects</p>
              </div>
            </article>
            <article class="exp-card" data-animate="fade-up" data-delay="80">
              <div class="exp-icon"><i class="bi bi-code-slash"></i></div>
              <div class="exp-content">
                <span class="exp-date">(2020 — 2024)</span>
                <h3>STUDENT DEVELOPER</h3>
                <p>SVU College of Engineering · C-Cube Club</p>
              </div>
            </article>
            <article class="exp-card" data-animate="fade-up" data-delay="160">
              <div class="exp-icon"><i class="bi bi-lightbulb"></i></div>
              <div class="exp-content">
                <span class="exp-date">(Ongoing)</span>
                <h3>SELF EMPLOYED</h3>
                <p>Code and build something every day.</p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- Skills -->
    <section id="skills" class="section skills">
      <div class="container">
        <div class="section-pill" data-animate="fade-up"><span>Skills</span></div>
      </div>

      <div class="skills-marquee" data-animate="fade-up">
        <div class="marquee-track">
          <?php
          $skills = ['HTML', 'CSS', 'JavaScript', 'Java', 'React', 'SQL', 'MySQL', 'Git', 'GitHub', 'VS Code', 'Postman', 'Bootstrap', 'Tailwind'];
          $loop = array_merge($skills, $skills);
          foreach ($loop as $skill):
          ?>
            <div class="skill-chip">
              <i class="bi bi-lightning-charge-fill"></i>
              <span><?= htmlspecialchars($skill, ENT_QUOTES, 'UTF-8') ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Projects -->
    <section id="projects" class="section projects">
      <div class="container">
        <div class="section-pill" data-animate="fade-up"><span>Projects</span></div>

        <div class="project-stack">
          <?php
          $projects = [
              [
                  'id' => 1,
                  'name' => 'Student Welfare Club',
                  'role' => 'Frontend Developer',
                  'tools' => ['React', 'Tailwind CSS', 'MySQL'],
                  'desc' => 'Website developed to showcase the activities of the Student Welfare Club at SVU.',
                  'live' => 'https://svustudentwelfareclub.netlify.app/',
                  'code' => '',
              ],
              [
                  'id' => 2,
                  'name' => 'Value Education Contest',
                  'role' => 'Web Developer',
                  'tools' => ['HTML', 'CSS', 'JavaScript'],
                  'desc' => 'Website for the Gita Value Education Contest at schools across Andhra Pradesh.',
                  'live' => 'https://valueeducation.netlify.app/',
                  'code' => '',
              ],
              [
                  'id' => 3,
                  'name' => 'Personality Assessment Test',
                  'role' => 'Full Stack Developer',
                  'tools' => ['HTML', 'CSS', 'JavaScript'],
                  'desc' => 'Web application designed to assess the personality traits of students.',
                  'live' => 'https://personality-assessment-quiz.netlify.app/',
                  'code' => 'https://github.com/HarshaVardhan108/personality-assessment-test',
              ],
          ];
          foreach ($projects as $i => $p):
              $tools = implode("', '", $p['tools']);
          ?>
          <article class="project-card sticky-card" id="sticky-card-<?= (int) $p['id'] ?>" style="--index: <?= $i + 1 ?>" data-animate="fade-up" data-delay="<?= $i * 60 ?>">
            <div class="project-head">
              <h3><?= htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8') ?></h3>
              <div class="project-links">
                <?php if ($p['live']): ?>
                  <a href="<?= htmlspecialchars($p['live'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="Live"><i class="bi bi-box-arrow-up-right"></i></a>
                <?php endif; ?>
                <?php if ($p['code']): ?>
                  <a href="<?= htmlspecialchars($p['code'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="Code"><i class="bi bi-github"></i></a>
                <?php endif; ?>
              </div>
            </div>
            <pre class="project-code"><code><span class="c-white">name:</span> <span class="c-amber">'<?= htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8') ?>'</span><span class="c-gray">,</span>
<span class="c-white">tools:</span> <span class="c-gray">['</span><span class="c-amber"><?= htmlspecialchars($tools, ENT_QUOTES, 'UTF-8') ?></span><span class="c-gray">'],</span>
<span class="c-white">myRole:</span> <span class="c-orange">'<?= htmlspecialchars($p['role'], ENT_QUOTES, 'UTF-8') ?>'</span><span class="c-gray">,</span>
<span class="c-white">Description:</span> <span class="c-cyan">'<?= htmlspecialchars($p['desc'], ENT_QUOTES, 'UTF-8') ?>'</span><span class="c-gray">,</span></code></pre>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Education -->
    <section id="education" class="section education">
      <div class="container">
        <div class="section-pill" data-animate="fade-up"><span>Educations</span></div>

        <div class="edu-grid">
          <article class="edu-card" data-animate="fade-up">
            <span class="edu-date">2020 — 2024</span>
            <h3>Bachelor Degree</h3>
            <p class="edu-school">SVU College of Engineering, Tirupati</p>
            <p>B.Tech — Electrical &amp; Electronics Engineering · CGPA 6.94/10</p>
          </article>
          <article class="edu-card" data-animate="fade-up" data-delay="80">
            <span class="edu-date">2017 — 2019</span>
            <h3>Higher Secondary Certificate</h3>
            <p class="edu-school">Sri Viswasanthi College, Vuyyuru</p>
            <p>MPC Stream · 97%</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Certificates -->
    <section id="certificates" class="section certificates">
      <div class="container">
        <div class="section-pill" data-animate="fade-up"><span>Certificates</span></div>
        <div class="cert-grid">
          <?php
          $certs = [
              ['img' => 'certificate-1.png', 'title' => 'The Joy of Computing with Python', 'issuer' => 'NPTEL'],
              ['img' => 'c-2.png', 'title' => 'JavaScript for Beginners', 'issuer' => 'Simplilearn'],
              ['img' => 'c-3.png', 'title' => '100 Days of Code: Python', 'issuer' => 'Udemy'],
              ['img' => 'certificate-4.png', 'title' => 'Full Stack Web Development', 'issuer' => 'Edureka'],
          ];
          foreach ($certs as $i => $cert):
          ?>
          <a class="cert-card" href="<?= BASE_PATH ?>assets/certificates/<?= htmlspecialchars($cert['img'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" data-animate="fade-up" data-delay="<?= $i * 60 ?>">
            <img src="<?= BASE_PATH ?>assets/certificates/<?= htmlspecialchars($cert['img'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($cert['title'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
            <div>
              <h3><?= htmlspecialchars($cert['title'], ENT_QUOTES, 'UTF-8') ?></h3>
              <p><?= htmlspecialchars($cert['issuer'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="section contact">
      <div class="container contact-layout">
        <div class="contact-intro" data-animate="fade-up">
          <h2>Contact with me</h2>
          <p>If you have any questions or concerns, please don't hesitate to contact me. I am open to any work opportunities that align with my skills and interests.</p>

          <ul class="contact-meta">
            <li><i class="bi bi-envelope"></i> <a href="mailto:<?= htmlspecialchars(SITE_EMAIL, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(SITE_EMAIL, ENT_QUOTES, 'UTF-8') ?></a></li>
            <li><i class="bi bi-telephone"></i> <a href="tel:+918885254742"><?= htmlspecialchars(SITE_PHONE, ENT_QUOTES, 'UTF-8') ?></a></li>
            <li><i class="bi bi-geo-alt"></i> <?= htmlspecialchars(SITE_LOCATION, ENT_QUOTES, 'UTF-8') ?></li>
          </ul>
        </div>

        <form id="contact-form" class="contact-form" data-animate="fade-left" novalidate>
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
          <div class="hp-field" aria-hidden="true">
            <label for="website">Website</label>
            <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
          </div>

          <label class="sr-only" for="name">Your Name</label>
          <input type="text" id="name" name="name" required placeholder="Your Name *" autocomplete="name">

          <label class="sr-only" for="email">Your Email</label>
          <input type="email" id="email" name="email" required placeholder="Your Email *" autocomplete="email">

          <label class="sr-only" for="subject">Subject</label>
          <input type="text" id="subject" name="subject" required placeholder="Subject *">

          <label class="sr-only" for="message">Your Message</label>
          <textarea id="message" name="message" rows="6" required placeholder="Your Message *"></textarea>

          <div class="form-status" role="status" aria-live="polite" hidden></div>

          <button type="submit" class="btn btn-gradient btn-block">
            <span class="btn-label">Send Message</span>
            <span class="btn-loading" hidden>Sending…</span>
            <i class="bi bi-send-fill"></i>
          </button>
        </form>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
