@php
    $download = url('/download');
    $repository = config('croc.repository_url');

    $features = [
        ['icon' => 'arrow-down-on-square-stack', 'title' => 'Drop a whole batch', 'body' => 'Drop videos or a folder on the window or the Dock icon. Croc works through them one after the other.'],
        ['icon' => 'arrows-pointing-in', 'title' => 'The right size', 'body' => 'Pick 720p, 1080p, 1440p or the original size. Portrait videos are treated the same, and nothing is made bigger.'],
        ['icon' => 'adjustments-horizontal', 'title' => 'Three quality steps', 'body' => 'Smaller, Balanced or Better. Balanced looks the same as the original on a website, at a fraction of the size.'],
        ['icon' => 'sun', 'title' => 'HDR made normal', 'body' => 'iPhone videos are often HDR and look grey in the browser. Croc turns them into normal colours.'],
        ['icon' => 'bolt', 'title' => 'Starts right away', 'body' => 'MP4 files are written so the browser can start playing before the whole video has loaded.'],
        ['icon' => 'document-duplicate', 'title' => 'Originals stay put', 'body' => 'clip.mov becomes clip.web.mp4 next to it, or in a folder you pick. Nothing is ever overwritten.'],
        ['icon' => 'chart-bar', 'title' => 'See what you saved', 'body' => 'Each video shows its progress, and afterwards how big it was, how big it is and how much smaller it got.'],
        ['icon' => 'scissors', 'title' => 'A strong bite', 'body' => 'A saltwater crocodile bites harder than any other animal. Croc puts that into FFmpeg, the tool behind most video on the web.'],
    ];

    $formats = [
        [
            'name' => 'Web MP4', 'tag' => 'H.264 + AAC', 'for' => 'For any video with sound',
            'body' => 'Plays in every browser and on every phone. The safe choice for videos people press play on.',
            'snippet' => '<video src="clip.web.mp4" controls playsinline></video>',
        ],
        [
            'name' => 'WebM', 'tag' => 'VP9 + Opus', 'for' => 'For the smallest files',
            'body' => 'Often a third smaller than MP4 at the same quality, but it takes longer to make. Offer it first, with the MP4 as a fallback.',
            'snippet' => "<video controls playsinline>\n  <source src=\"clip.webm\" type=\"video/webm\">\n  <source src=\"clip.web.mp4\" type=\"video/mp4\">\n</video>",
        ],
        [
            'name' => 'Silent loop', 'tag' => 'H.264, no sound', 'for' => 'For backgrounds and heroes',
            'body' => 'Without a sound track, browsers let the video play on its own, over and over, behind your headline.',
            'snippet' => '<video src="clip.loop.mp4" autoplay muted loop playsinline></video>',
        ],
    ];

    // Feedback from people using Croc, one quote per line. The section stays hidden while this is empty.
    $testimonials = [];
@endphp

<x-layouts.app>
    <div class="absolute inset-x-0 top-0 -z-10 h-[44rem] bg-linear-to-b from-billabong-50 to-white"></div>

    <x-site-header />

    <main>
        {{-- Hero --}}
        <section class="relative pt-10 pb-24 sm:pt-16 sm:pb-32">
            <div class="mx-auto max-w-6xl px-6 text-center lg:px-8">
                <img src="{{ asset('images/croc.webp') }}" width="384" height="384" fetchpriority="high" alt="The Croc app icon: a crocodile peeking over a film clapperboard" class="mx-auto size-32 sm:size-40">
                <h1 class="mx-auto mt-8 max-w-[16ch] font-display text-5xl font-semibold tracking-tight text-balance text-billabong-950 sm:text-7xl">
                    Chew big videos down to size
                </h1>
                <p class="mx-auto mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600 sm:text-xl/8">
                    Croc is a small, native video converter for your Mac. Drop in the MOV and MP4 files from your phone, camera or screen recordings, and get small, fast-starting videos for your website. The originals stay as they are.
                </p>
                <div class="mt-10 flex flex-wrap items-center justify-center gap-x-8 gap-y-4">
                    <a href="{{ $download }}" class="inline-flex items-center gap-x-2 rounded-full bg-billabong-600 py-3 pr-5 pl-4 text-base/6 font-semibold text-white shadow-sm hover:bg-billabong-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-billabong-600">
                        <x-heroicon-m-arrow-down-tray class="size-5 shrink-0 fill-white" />
                        <span>Download for Mac<span aria-hidden="true">*</span></span>
                    </a>
                    <a href="{{ $repository }}" class="inline-flex items-center gap-x-1.5 text-base/6 font-semibold text-billabong-800 hover:text-billabong-600">
                        View on GitHub
                        <x-heroicon-m-arrow-right class="size-5 shrink-0 fill-current" />
                    </a>
                </div>
                <p class="mt-6 text-base/7 text-neutral-500 sm:text-sm/6">Free · Apple Silicon · macOS 14 or later</p>
                <p class="mt-1 text-base/7 text-pretty text-neutral-500 sm:text-sm/6">
                    <span aria-hidden="true">*</span>Croc isn’t notarized by Apple, so the first launch needs one extra step.
                    <a href="#install" class="font-medium whitespace-nowrap text-billabong-700 hover:text-billabong-600">See how <span aria-hidden="true">↓</span></a>
                </p>

                <x-app-window class="mx-auto mt-16 max-w-5xl text-left sm:mt-20" />
            </div>
        </section>

        {{-- Formats --}}
        <section id="formats" class="scroll-mt-8 bg-billabong-950 py-24 sm:py-32">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <p class="text-base/7 font-semibold text-billabong-300">Formats</p>
                <h2 class="mt-2 max-w-[24ch] font-display text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">
                    Three ways to serve it
                </h2>
                <p class="mt-6 max-w-[52ch] text-lg/8 text-pretty text-billabong-100/70">
                    A minute of 4K from an iPhone is about 400 MB. For a website, 10 MB looks just as good. Pick what the video is for, and Croc chooses the codecs and settings.
                </p>

                <div class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 lg:grid-cols-3">
                    @foreach ($formats as $format)
                        <div class="flex flex-col rounded-2xl bg-white/5 p-8 ring-1 ring-white/10">
                            <div class="flex items-center gap-x-3">
                                <span class="text-base/7 font-semibold text-white">{{ $format['name'] }}</span>
                                <span class="rounded-full px-2 text-sm/6 font-medium text-billabong-300 ring-1 ring-billabong-300/50">{{ $format['tag'] }}</span>
                            </div>
                            <p class="mt-4 text-sm/6 font-semibold text-billabong-200">{{ $format['for'] }}</p>
                            <p class="mt-2 text-base/7 text-pretty text-billabong-100/70">{{ $format['body'] }}</p>
                            <pre class="mt-8 rounded-lg whitespace-pre-wrap [overflow-wrap:anywhere] bg-black/30 p-4 font-mono text-xs/5 text-billabong-100 ring-1 ring-white/5 sm:mt-auto"><code>{{ $format['snippet'] }}</code></pre>
                        </div>
                    @endforeach
                </div>

                <p class="mt-12 max-w-[60ch] text-base/7 text-pretty text-billabong-100/70">
                    Each comes in three sizes and three quality steps, and every result keeps the original’s shape: portrait stays portrait, and nothing is stretched or made bigger.
                </p>
            </div>
        </section>

        {{-- Features --}}
        <section id="features" class="scroll-mt-8 py-24 sm:py-32">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <p class="text-base/7 font-semibold text-billabong-600">Features</p>
                <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-billabong-950 sm:text-5xl">
                    Everything you need, nothing you don’t
                </h2>
                <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                    No timeline, no export dialog with forty options. Drop the videos, pick a format and press Convert. Croc remembers your choice for next time.
                </p>

                <dl class="mt-16 grid grid-cols-1 gap-x-12 gap-y-12 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($features as $feature)
                        <div>
                            <dt class="flex items-start gap-x-3 text-base/7 font-semibold text-billabong-950">
                                <x-dynamic-component :component="'heroicon-m-'.$feature['icon']" class="size-5 h-lh shrink-0 fill-billabong-500" />
                                {{ $feature['title'] }}
                            </dt>
                            <dd class="mt-1 pl-8 text-base/7 text-pretty text-neutral-600">{{ $feature['body'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </section>

        {{-- Testimonials --}}
        @if ($testimonials)
            <section class="pb-24 sm:pb-32">
                <div class="mx-auto max-w-6xl px-6 lg:px-8">
                    <p class="text-base/7 font-semibold text-billabong-600">Kind words</p>
                    <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-billabong-950 sm:text-5xl">
                        What people say about Croc
                    </h2>

                    <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($testimonials as $quote)
                            <figure class="rounded-2xl bg-billabong-50 p-8 ring-1 ring-billabong-950/5">
                                <svg viewBox="0 0 32 24" aria-hidden="true" class="h-6 fill-billabong-300"><path d="M0 24V14.4C0 6.24 4.48 1.44 12.8 0l1.28 3.2C9.6 4.48 7.36 7.04 7.04 11.2H12.8V24H0Zm19.2 0V14.4C19.2 6.24 23.68 1.44 32 0l1.28 3.2c-4.48 1.28-6.72 3.84-7.04 8H32V24H19.2Z"/></svg>
                                <blockquote class="mt-6 text-lg/8 text-pretty text-billabong-950">
                                    <p>{{ $quote }}</p>
                                </blockquote>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Under the hood --}}
        <section class="bg-billabong-50 py-24 sm:py-32">
            <div class="mx-auto grid max-w-6xl grid-cols-1 gap-x-12 gap-y-16 px-6 lg:grid-cols-2 lg:px-8">
                <div>
                    <p class="text-base/7 font-semibold text-billabong-600">Under the hood</p>
                    <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-billabong-950 sm:text-5xl">
                        Small, native, and stays on your Mac
                    </h2>
                    <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                        Croc is written in Swift and SwiftUI, so it looks and feels like it belongs on your Mac. Inside is FFmpeg, the same encoder that big video sites use, built for Apple Silicon. Your videos are converted on your Mac and never uploaded anywhere.
                    </p>
                </div>
                <dl class="divide-y divide-billabong-950/10 self-center">
                    <div class="flex items-baseline justify-between gap-x-6 pb-6">
                        <dt class="text-base/7 text-neutral-600">Download size</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight text-billabong-950 tabular-nums">About 32 MB</dd>
                    </div>
                    <div class="flex items-baseline justify-between gap-x-6 py-6">
                        <dt class="text-base/7 text-neutral-600">Ads, accounts and analytics</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight text-billabong-950">None</dd>
                    </div>
                    <div class="flex items-baseline justify-between gap-x-6 py-6">
                        <dt class="text-base/7 text-neutral-600">Internet connection</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight text-billabong-950">Never</dd>
                    </div>
                    <div class="flex items-baseline justify-between gap-x-6 py-6">
                        <dt class="text-base/7 text-neutral-600">Overwrites your originals</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight text-billabong-950">Never</dd>
                    </div>
                    <div class="flex items-baseline justify-between gap-x-6 pt-6">
                        <dt class="text-base/7 text-neutral-600">Source code</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight">
                            <a href="{{ $repository }}" class="text-billabong-700 underline decoration-billabong-300 underline-offset-4 hover:decoration-billabong-600">GitHub</a>
                        </dd>
                    </div>
                </dl>
            </div>
        </section>

        {{-- Install --}}
        <section id="install" class="scroll-mt-8 py-24 sm:py-32">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <p class="text-base/7 font-semibold text-billabong-600">Install</p>
                <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-billabong-950 sm:text-5xl">
                    Let Croc into the billabong
                </h2>
                <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                    Croc isn’t on the App Store and isn’t notarized by Apple, so macOS asks you to confirm it the first time. It takes about a minute, and you only do it once.
                </p>

                <ol role="list" class="mt-16 grid grid-cols-1 gap-x-12 gap-y-12 sm:grid-cols-2 lg:grid-cols-4">
                    <li>
                        <div class="font-display text-base/7 font-semibold text-billabong-600 tabular-nums">01</div>
                        <h3 class="mt-2 text-base/7 font-semibold text-billabong-950">Download</h3>
                        <p class="mt-1 text-base/7 text-pretty text-neutral-600">
                            Download <a href="{{ $download }}" class="font-semibold text-billabong-700 underline decoration-billabong-300 underline-offset-4 hover:decoration-billabong-600">Croc.dmg</a> and open it.
                        </p>
                    </li>
                    <li>
                        <div class="font-display text-base/7 font-semibold text-billabong-600 tabular-nums">02</div>
                        <h3 class="mt-2 text-base/7 font-semibold text-billabong-950">Drag to Applications</h3>
                        <p class="mt-1 text-base/7 text-pretty text-neutral-600">Drag Croc onto the Applications folder in the window that opens.</p>
                    </li>
                    <li>
                        <div class="font-display text-base/7 font-semibold text-billabong-600 tabular-nums">03</div>
                        <h3 class="mt-2 text-base/7 font-semibold text-billabong-950">Open Anyway</h3>
                        <p class="mt-1 text-base/7 text-pretty text-neutral-600">
                            Open Croc. When macOS says it can’t verify the developer, go to System Settings → Privacy &amp; Security, scroll down and click Open Anyway.
                        </p>
                    </li>
                    <li>
                        <div class="font-display text-base/7 font-semibold text-billabong-600 tabular-nums">04</div>
                        <h3 class="mt-2 text-base/7 font-semibold text-billabong-950">Feed it a video</h3>
                        <p class="mt-1 text-base/7 text-pretty text-neutral-600">
                            Drop a video on the window, pick a format and press Convert. The new file shows up next to the original.
                        </p>
                    </li>
                </ol>

                <p class="mt-16 border-t border-neutral-950/5 pt-8 text-base/7 text-neutral-600 sm:text-sm/6">
                    Croc needs a Mac with Apple Silicon (M1 or newer) and macOS 14 or later. It doesn’t update itself yet: new versions show up in the <a href="/changelog" class="font-medium text-billabong-700 hover:text-billabong-600">changelog</a>.
                </p>
            </div>
        </section>
    </main>

    <x-site-footer />
</x-layouts.app>
