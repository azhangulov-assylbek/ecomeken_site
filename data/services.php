<?php
/**
 * Structural service data (order + icon only). All display text — title,
 * description, duration, price — lives per-language in lang/*.php under
 * the "services" key, keyed by the same ids used here.
 */

return [
    ['id' => 'audit',      'icon' => 'audit'],
    ['id' => 'consulting', 'icon' => 'compass'],
    ['id' => 'delivery',   'icon' => 'build'],
    ['id' => 'retainer',   'icon' => 'shield'],
    ['id' => 'training',   'icon' => 'academic'],
];
