<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-green-500 mb-4">Welcome</h1>
    @if (session('error'))
        <p class="text-red-500 mb-4">{{ session('error') }}</p>
    @endif
    <a href="{{ route('spotify.login') }}" class="block w-full text-center bg-green-500 text-white py-2 rounded hover:bg-green-600">
        Login with Spotify
    </a>
</div>