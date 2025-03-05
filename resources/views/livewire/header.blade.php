<header class="sticky top-0 bg-zinc-800/80 backdrop-blur-md z-10 p-4 flex items-center justify-between">
    <div class="flex items-center space-x-2 md:ml-auto">
        <div
            class="flex items-center justify-center h-8 px-3 rounded-full bg-black text-white text-sm font-medium">
            @if ($spotifyUser)
                <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                    </path>
                </svg>
                {{ $spotifyUser['name'] }}
            @else
                <a href="{{ route('spotify.login') }}" class="flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                        </path>
                    </svg>
                    Login
                </a>
            @endif
        </div>
    </div>
</header>