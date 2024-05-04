<?php
// Import Symfony Translation Component classes
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\MoFileLoader;

// List of supported locales
$supportedLocales = ['fr', 'en'];

// Get the requested locale (default to 'fr' if not provided)
$locale = $_GET['lang'] ?? $_COOKIE['lang'] ?? 'fr';

// Ensure the requested locale is supported
if (!in_array($locale, $supportedLocales)) {
    $locale = 'fr'; // Default to 'fr'
}

// Save the locale setting to a cookie
setcookie('lang', $locale, 0, '/');

// Initialize a translator object for the specified locale
$translator = new Translator($locale);

// Add a loader for .mo files
$translator->addLoader('mo', new MoFileLoader());

// Grab the .mo file resource from the locales folder
$translator->addResource('mo', "./locales/$locale/LC_MESSAGES/messages.mo", $locale);

// Define a helper function to load translations
function __($message) {
    global $translator;
    return $translator->trans($message);
}
