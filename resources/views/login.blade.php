<x-layout title="Login">
    <div class="w-full max-w-xs mx-auto mt-5">
        <h1 class="mb-2 text-3xl font-semibold text-gray-900">Login</h1>
        <form method="POST" action="{{ route('login.do') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="password"
                    class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Login
                </button>
            </div>
        </form>
        <div class="mt-4 text-sm text-center">
            <a href="{{ route('register') }}"
                class="font-medium text-indigo-600 hover:text-indigo-500">Don't have an account?
                Register</a>
        </div>
    </div>
</x-layout>
