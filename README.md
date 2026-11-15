# Harsha Vardhan — Portfolio

Modern PHP portfolio with Baskervville typography, Motion animations, and a PHP contact API.

## Run locally

Needs PHP 8+ (XAMPP, Laragon, or built-in server):

```bash
php -S localhost:8080
```

Open `http://localhost:8080/index.php`.

## Structure

| Path | Purpose |
|------|---------|
| `index.php` | Main portfolio page |
| `includes/` | Config, header, footer |
| `api/contact.php` | Contact form endpoint |
| `storage/` | Message log (not web-accessible) |
| `assets/css/style.css` | Design system |
| `assets/js/` | Motion + contact form |

## Contact form

Posts JSON to `api/contact.php` with CSRF + honeypot protection. Messages are emailed via `mail()` when available and always appended to `storage/messages.jsonl`.
