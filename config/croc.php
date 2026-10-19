<?php

return [
    // GitHub repository of the macOS app; releases are published there.
    'repository_url' => env('CROC_REPOSITORY_URL', 'https://github.com/kimiyuch/croc.app'),

    // Always points at the DMG of the latest release.
    'download_url' => env('CROC_DOWNLOAD_URL', 'https://github.com/kimiyuch/croc.app/releases/latest/download/Croc.dmg'),

    // The app's CHANGELOG.md, attached to every release; the changelog page is built from it.
    'changelog_url' => env('CROC_CHANGELOG_URL', 'https://github.com/kimiyuch/croc.app/releases/latest/download/CHANGELOG.md'),
];
