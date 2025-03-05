{{-- 
            <!-- User Info (Replacing Recently Played Grid) -->
            @if ($spotifyUser)
                <div class="bg-zinc-800/40 rounded-md p-4 mb-8">
                    <h2 class="text-xl font-bold mb-4">Your Spotify Profile</h2>
                    <p class="mb-2">Spotify ID: <span class="font-semibold">{{ $spotifyUser['id'] }}</span></p>
                    @if ($spotifyUser['email'])
                        <p class="mb-2">Email: <span class="font-semibold">{{ $spotifyUser['email'] }}</span></p>
                    @endif
                    <p class="text-xs text-zinc-400 break-words">Access Token: {{ $spotifyUser['token'] }}</p>
                </div>
            @else
                <div class="bg-zinc-800/40 rounded-md p-4 mb-8">
                    <p class="text-sm">No Spotify data available. <a href="{{ route('spotify.login') }}" class="text-green-500 hover:underline">Login with Spotify</a></p>
                </div>
            @endif
 --}}
<!-- Main Container -->
<div class="flex flex-1 overflow-hidden">
    <!-- Sidebar -->
    <livewire:side-bar :spotify-user="$spotifyUser" />
    <livewire:mobile-nav :spotify-user="$spotifyUser" />

    <!-- Main Content -->
    <div class="flex-1 overflow-auto bg-gradient-to-b from-zinc-800 to-black pb-24 md:pb-0">
        <!-- Header -->
        <livewire:header :spotify-user="$spotifyUser" />

        <!-- Content -->
        <!-- Content -->
        <div class="px-4 py-2">
            <h1 class="text-2xl font-bold mb-6">Good afternoon, {{ $spotifyUser['name'] ?? 'Guest' }}</h1>

            <!-- Top Artists Section -->
            @if (!empty($topArtists))
                <div class="mb-8">
                    <h2 class="text-xl font-bold mb-4">Your Top Artists</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-5">
                        @foreach ($topArtists as $artist)
                            <div class="bg-zinc-800/40 p-4 rounded-md hover:bg-zinc-700/40 transition group">
                                @if (!empty($artist['images']))
                                    <div class="relative mb-4">
                                        <img src="{{ $artist['images'][0]['url'] }}" alt="{{ $artist['name'] }}"
                                            class="w-full aspect-square object-cover rounded shadow-lg" />
                                    </div>
                                @endif
                                <h3 class="font-semibold text-sm mb-1 truncate">{{ $artist['name'] }}</h3>
                                <p class="text-xs text-zinc-400">Popularity: {{ $artist['popularity'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-sm text-zinc-400 mb-8">Log in with Spotify to see your top artists.</p>
            @endif
            <livewire:genre />
        </div>
    </div>
</div>
