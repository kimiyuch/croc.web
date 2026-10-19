<!DOCTYPE html>
<html lang="en" class="bg-white antialiased motion-safe:scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Croc: make your videos fit for the web' }}</title>
    <meta name="description" content="Croc is a small, native video converter for macOS. Drop in MOV and MP4 files from your phone, camera or screen recordings and get small, fast-starting MP4 and WebM files for your website.">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Croc">
    <meta property="og:title" content="Croc: make your videos fit for the web">
    <meta property="og:description" content="A small, native video converter for macOS. Croc chews big MOV and MP4 files down to small, fast-starting videos for the web.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('images/og.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="The Croc app icon next to the words: Chew big videos down to size.">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    @fonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-neutral-950">
    <div class="isolate">
        {{ $slot }}
    </div>
</body>
</html>
