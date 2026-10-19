@php($repository = config('croc.repository_url'))

<header class="mx-auto flex max-w-6xl items-center justify-between gap-x-6 px-6 py-5 lg:px-8">
    <a href="/" aria-label="Homepage" class="font-display text-xl font-semibold text-billabong-950">Croc</a>
    <nav class="flex items-center gap-x-8">
        <a href="/#formats" class="text-sm/6 font-medium text-neutral-700 hover:text-billabong-700 max-sm:hidden">Formats</a>
        <a href="/#features" class="text-sm/6 font-medium text-neutral-700 hover:text-billabong-700 max-sm:hidden">Features</a>
        <a href="/#install" class="text-sm/6 font-medium text-neutral-700 hover:text-billabong-700 max-sm:hidden">Install</a>
        <a href="{{ $repository }}" class="rounded-full px-3 py-1.5 text-sm/6 font-medium text-billabong-800 ring-1 ring-billabong-950/10 hover:bg-billabong-50">GitHub</a>
    </nav>
</header>
