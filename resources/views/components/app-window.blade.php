@php
    // A made-up batch: a phone video that's done, a screen recording halfway and a hero loop waiting.
    $formats = [
        ['icon' => 'play', 'title' => 'Web MP4', 'detail' => 'H.264 and AAC. Plays in every browser, starts before it has fully loaded.', 'selected' => true],
        ['icon' => 'sparkles', 'title' => 'WebM', 'detail' => 'VP9 and Opus. Smaller files, takes longer to make.', 'selected' => false],
        ['icon' => 'arrow-path-rounded-square', 'title' => 'Silent loop', 'detail' => 'H.264 without sound, for background and hero videos.', 'selected' => false],
    ];
    $sizes = ['720p', '1080p', '1440p', 'Original'];
    $qualities = ['Smaller', 'Balanced', 'Better'];
    $videos = [
        ['name' => 'IMG_4821.MOV', 'detail' => 'IMG_4821.web.mp4 · Web MP4', 'state' => 'done', 'from' => '412 MB', 'to' => '9.8 MB', 'saved' => '98% smaller'],
        ['name' => 'Product demo.mov', 'detail' => '2880×1800 · 1:42 · 286 MB · → 1728×1080', 'state' => 'converting', 'progress' => 63],
        ['name' => 'Hero background.mov', 'detail' => '3840×2160 · 0:12 · HDR · 154 MB', 'state' => 'waiting'],
    ];
@endphp

{{-- A mock of the Croc window: format cards, settings and the list of videos, like in the app. --}}
<div {{ $attributes->class('overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-billabong-950/10') }} aria-hidden="true">
    <div class="relative text-xs/5 sm:text-sm/5">
        {{-- The light green band at the top of the window --}}
        <div class="border-b border-billabong-950/10 bg-linear-to-b from-billabong-100 to-billabong-200 px-4 pt-3 pb-4 sm:px-6 sm:pb-5">
            <div class="flex gap-x-2">
                <div class="size-3 rounded-full bg-[#ff5f57]"></div>
                <div class="size-3 rounded-full bg-[#febc2e]"></div>
                <div class="size-3 rounded-full bg-[#28c840]"></div>
            </div>

            <div class="mt-4 flex items-center gap-x-3">
                <img src="{{ asset('images/croc.webp') }}" alt="" class="size-8 sm:size-9">
                <div>
                    <div class="font-display text-base font-semibold text-billabong-950">Croc</div>
                    <div class="text-billabong-900/70 tabular-nums">3 videos · 1 done · 402 MB saved</div>
                </div>
                <span class="ml-auto inline-flex items-center gap-x-1.5 rounded-full bg-white/60 px-3 py-1 font-semibold text-billabong-700 ring-1 ring-billabong-950/10">
                    <x-heroicon-m-stop class="size-4 shrink-0 fill-billabong-700" />
                    Stop
                </span>
            </div>
        </div>

        <div class="bg-linear-to-b from-billabong-50 to-white px-4 pt-5 pb-6 sm:px-6 sm:pt-6 sm:pb-8">
            {{-- Format cards --}}
            <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                @foreach ($formats as $format)
                    <div @class([
                        'flex items-start gap-x-3 rounded-lg bg-white p-3 sm:p-4',
                        'ring-2 ring-billabong-500' => $format['selected'],
                        'ring-1 ring-billabong-950/10 max-md:hidden' => ! $format['selected'],
                    ])>
                        <span @class([
                            'grid size-7 shrink-0 place-items-center rounded-md',
                            'bg-billabong-600' => $format['selected'],
                            'bg-billabong-50' => ! $format['selected'],
                        ])>
                            <x-dynamic-component :component="'heroicon-m-'.$format['icon']" @class(['size-4', 'fill-white' => $format['selected'], 'fill-billabong-600' => ! $format['selected']]) />
                        </span>
                        <div>
                            <div class="font-display font-semibold text-billabong-950 sm:text-base">{{ $format['title'] }}</div>
                            <div class="mt-0.5 text-xs/4 text-neutral-500">{{ $format['detail'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Size and quality --}}
            <div class="mt-4 flex flex-wrap items-center gap-x-6 gap-y-2">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs/4 font-semibold text-neutral-500">Size</span>
                    <div class="flex rounded-md bg-neutral-950/5 p-0.5">
                        @foreach ($sizes as $size)
                            <span @class(['rounded-[5px] px-2 py-0.5 sm:px-2.5', 'bg-white font-medium text-billabong-950 shadow-xs' => $size === '1080p', 'text-neutral-600' => $size !== '1080p'])>{{ $size }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center gap-x-2 max-sm:hidden">
                    <span class="text-xs/4 font-semibold text-neutral-500">Quality</span>
                    <div class="flex rounded-md bg-neutral-950/5 p-0.5">
                        @foreach ($qualities as $quality)
                            <span @class(['rounded-[5px] px-2.5 py-0.5', 'bg-white font-medium text-billabong-950 shadow-xs' => $quality === 'Balanced', 'text-neutral-600' => $quality !== 'Balanced'])>{{ $quality }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- The list of videos --}}
            <div class="mt-6 font-display font-semibold text-billabong-950 sm:text-base">Videos</div>
            <ul class="mt-2 divide-y divide-neutral-950/5 rounded-lg bg-white ring-1 ring-billabong-950/10">
                @foreach ($videos as $video)
                    <li class="flex items-center gap-x-3 px-3 py-3 sm:px-4">
                        <span @class([
                            'grid size-7 shrink-0 place-items-center rounded-md',
                            'bg-green-600/10' => $video['state'] === 'done',
                            'bg-billabong-600/10' => $video['state'] !== 'done',
                        ])>
                            @if ($video['state'] === 'done')
                                <x-heroicon-m-check class="size-4 fill-green-600" />
                            @else
                                <x-heroicon-m-film class="size-4 fill-billabong-600" />
                            @endif
                        </span>
                        <div class="min-w-0 grow">
                            <div class="truncate font-medium text-billabong-950">{{ $video['name'] }}</div>
                            <div class="truncate text-xs/4 text-neutral-500 tabular-nums">{{ $video['detail'] }}</div>
                        </div>
                        @if ($video['state'] === 'done')
                            <div class="shrink-0 text-right tabular-nums">
                                <div class="text-neutral-800">{{ $video['from'] }} → {{ $video['to'] }}</div>
                                <div class="text-xs/4 font-semibold text-green-600">{{ $video['saved'] }}</div>
                            </div>
                        @elseif ($video['state'] === 'converting')
                            <div class="h-1.5 w-20 shrink-0 overflow-hidden rounded-full bg-neutral-950/10 sm:w-36">
                                <div class="h-full rounded-full bg-billabong-500" style="width: {{ $video['progress'] }}%"></div>
                            </div>
                            <span class="w-9 shrink-0 text-right text-neutral-800 tabular-nums">{{ $video['progress'] }}%</span>
                        @else
                            <span class="shrink-0 text-neutral-500">Waiting</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
