<?php
/**
 * Contact form handler. Plain PHP mail() — no third-party form service,
 * per the agreed stack. hoster.kz/Plesk mail() delivery depends on the
 * server having a working sendmail/Postfix setup with SPF/DKIM for
 * ecomeken.kz; if messages land in spam or don't arrive, swap the
 * mail() call below for SMTP (e.g. PHPMailer talking to Plesk's mail
 * service on 587) without touching the rest of this file.
 */
require_once __DIR__ . '/includes/functions.php';

$lang = isset($_POST['lang']) && in_array($_POST['lang'], ECOMEKEN_LANGS, true)
    ? $_POST['lang']
    : ECOMEKEN_DEFAULT_LANG;

function ecomeken_redirect(string $lang, string $status): void
{
    header('Location: ' . ecomeken_lang_url($lang) . '?sent=' . $status . '#contact', true, 303);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . ecomeken_lang_url($lang), true, 302);
    exit;
}

// Honeypot: real visitors never see or fill this field. Pretend success so
// bots don't learn the field was rejected, but skip actually sending mail.
if (!empty($_POST['website'])) {
    ecomeken_redirect($lang, 'ok');
}

$name    = trim((string)($_POST['name'] ?? ''));
$email   = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

// Strip anything that could be used for header injection via a crafted name/email.
$name  = preg_replace('/[\r\n]+/', ' ', $name);
$email = preg_replace('/[\r\n]+/', ' ', $email);

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    ecomeken_redirect($lang, 'error');
}

$to      = 'info@ecomeken.kz';
$subject = 'ECOMEKEN website — new contact form submission';
$body    = "Name: $name\nEmail: $email\nLanguage: $lang\n\nMessage:\n$message\n";

// Envelope "From" should stay on the site's own domain (some mail relays
// reject/flag mail claiming to be From: an external address); the
// visitor's address goes in Reply-To so replying just works.
$headers = [
    'From: ECOMEKEN Website <no-reply@ecomeken.kz>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'Content-Type: text/plain; charset=UTF-8',
];

$sent = @mail($to, $subject, $body, implode("\r\n", $headers));

ecomeken_redirect($lang, $sent ? 'ok' : 'error');
