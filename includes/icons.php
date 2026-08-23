<?php
/**
 * Minimal inline SVG icon set (24x24, stroke = currentColor) so the site
 * has no external icon-font dependency. Add new names here as needed.
 */
function ecomeken_icon(string $name, int $size = 22): string
{
    $paths = [
        'audit'    => '<path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/>',
        'compass'  => '<circle cx="12" cy="12" r="9"/><path d="M15.5 8.5l-2.2 5.8-5.8 2.2 2.2-5.8z"/>',
        'build'    => '<path d="M14.5 6.5l3 3-8 8H6.5v-3z"/><path d="M17 4l3 3-1.5 1.5-3-3z"/>',
        'shield'   => '<path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z"/>',
        'academic' => '<path d="M12 4l9 4-9 4-9-4z"/><path d="M6.5 10.5V15c0 1.5 2.5 3 5.5 3s5.5-1.5 5.5-3v-4.5"/>',
        'leaf'     => '<path d="M19 5c-7 0-13 4-13 12 8 0 13-5 13-12z"/><path d="M6 19l6-6"/>',
        'sun'      => '<circle cx="12" cy="12" r="4"/><path d="M12 3v2M12 19v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M3 12h2M19 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/>',
        'people'   => '<circle cx="9" cy="8" r="3"/><path d="M3 20c0-3.5 2.5-6 6-6s6 2.5 6 6"/><circle cx="17" cy="9" r="2.4"/><path d="M15.5 20c.3-2.6 1.8-4.6 4-5.3"/>',
        'shop'     => '<path d="M4 9l1-4h14l1 4"/><path d="M4 9h16v9a1 1 0 01-1 1H5a1 1 0 01-1-1z"/><path d="M9 13a3 3 0 006 0"/>',
        'cap'      => '<path d="M12 4l9 4-9 4-9-4z"/><path d="M6.5 10.5V15c0 1.5 2.5 3 5.5 3s5.5-1.5 5.5-3v-4.5"/><path d="M21 10v5"/>',
        'mail'     => '<rect x="3.5" y="5.5" width="17" height="13" rx="2"/><path d="M4 6.5l8 6.5 8-6.5"/>',
        'phone'    => '<path d="M6 3.5h3l1.5 4L8 9.5c1 2.5 3 4.5 5.5 5.5l2-2.5 4 1.5v3a2 2 0 01-2.2 2C10.5 18.6 5.4 13.5 4.9 6.7A2 2 0 016 3.5z"/>',
        'linkedin' => '<rect x="3.5" y="3.5" width="17" height="17" rx="3"/><path d="M8 10v6M8 7.5v.01M12 16v-3.5c0-1.4 1-2.5 2.3-2.5S16.5 11 16.5 12.5V16" />',
        'check'    => '<path d="M5 12.5l4.5 4.5L19 7"/>',
        'arrow'    => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'menu'     => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'close'    => '<path d="M6 6l12 12M18 6L6 18"/>',
    ];

    $inner = $paths[$name] ?? $paths['check'];

    return sprintf(
        '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%2$s</svg>',
        $size,
        $inner
    );
}
