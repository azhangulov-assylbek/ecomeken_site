<?php
/**
 * Structural project data (link, status code, icon). Title/description/CTA
 * text lives per-language in lang/*.php under "projects", keyed by the same
 * ids used here. Status codes are resolved to translated labels via the
 * "project_status" map in each language file.
 *
 * electronik.kz currently serves an expired SSL certificate (checked
 * 2026-08-23) — flagged to the client; they chose to keep the link live.
 */

return [
    [
        'id'     => 'smartecofield',
        'icon'   => 'leaf',
        'status' => 'rnd',
        'link'   => 'https://smartecofield.ecomeken.kz',
        'external' => true,
    ],
    [
        'id'     => 'taza_kuat',
        'icon'   => 'sun',
        'status' => 'idea',
        'link'   => null,
        'external' => false,
    ],
    [
        'id'     => 'isker',
        'icon'   => 'people',
        'status' => 'live',
        'link'   => 'https://isker.net',
        'external' => true,
    ],
    [
        'id'     => 'electronik',
        'icon'   => 'shop',
        'status' => 'live',
        'link'   => 'https://electronik.kz',
        'external' => true,
    ],
    [
        'id'     => 'gpm',
        'icon'   => 'cap',
        'status' => 'partner',
        'link'   => '#services',
        'external' => false,
    ],
];
