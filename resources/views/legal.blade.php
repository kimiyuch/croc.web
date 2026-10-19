@php($repository = config('croc.repository_url'))

<x-layouts.app title="Legal Notice · Croc">
    <div class="absolute inset-x-0 top-0 -z-10 h-[44rem] bg-linear-to-b from-billabong-50 to-white"></div>

    <x-site-header />

    <main class="mx-auto max-w-6xl px-6 pt-10 pb-24 sm:pt-16 sm:pb-32 lg:px-8">
        <p class="text-base/7 font-semibold text-billabong-600">Legal notice</p>
        <h1 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-billabong-950 sm:text-5xl">
            The small print
        </h1>
        <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
            Croc is a free app that converts videos on your Mac. Here’s what that means for you, and what it doesn’t.
        </p>

        <div class="mt-16 divide-y divide-neutral-950/5 border-t border-neutral-950/5">
            <section id="videos" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-billabong-950">Your videos</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Croc never changes or deletes your original videos. It writes new files next to them, or into a folder
                        you pick, and gives them a new name instead of overwriting anything.
                    </p>
                    <p>
                        Converting makes videos smaller by leaving out detail, so check the result before you delete an original.
                        Make sure you have the right to publish the videos you put on your website.
                    </p>
                </div>
            </section>

            <section id="warranty" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-billabong-950">No warranty</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Croc is provided free of charge and “as is”, without any warranty, as described in sections 15 and 16 of
                        its license, the <a href="{{ $repository }}/blob/main/LICENSE" class="font-medium text-billabong-800 hover:text-billabong-600">GNU General Public License v3</a>.
                        It includes <a href="https://ffmpeg.org" class="font-medium text-billabong-800 hover:text-billabong-600">FFmpeg</a>, which is under the same license.
                        To the extent the law allows, we’re not liable for any damage or loss from using it, including lost data.
                    </p>
                </div>
            </section>

            <section id="privacy" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-billabong-950">Privacy</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Croc has no accounts, ads or analytics, and doesn’t connect to the internet. Your videos are
                        converted on your Mac and never uploaded anywhere.
                    </p>
                    <p>
                        This website doesn’t use analytics or tracking. It counts how often the download link is clicked,
                        as a number per day, without storing anything about you. It sets a session cookie that the website
                        framework needs to work, and our host keeps the usual server logs.
                    </p>
                </div>
            </section>

            <section id="trademarks" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-billabong-950">Trademarks</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Mac and macOS are trademarks of Apple Inc. FFmpeg is a trademark of Fabrice Bellard.
                        Croc isn’t affiliated with or endorsed by either.
                    </p>
                </div>
            </section>

            <section id="contact" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-billabong-950">Contact</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Croc is made by <a href="https://kimiyu.ch" class="font-medium text-billabong-800 hover:text-billabong-600">kimiyu.ch</a>.
                        For questions or problems with the app, please
                        <a href="{{ $repository }}/issues" class="font-medium text-billabong-800 hover:text-billabong-600">open an issue on GitHub</a>.
                    </p>
                </div>
            </section>
        </div>
    </main>

    <x-site-footer />
</x-layouts.app>
