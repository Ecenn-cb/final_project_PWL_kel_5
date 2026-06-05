<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="bg-white shadow-lg rounded-xl p-8">

            <div class="text-center mb-6">

                <h1 class="text-3xl font-bold text-blue-600">
                    Mini Market Jayusman
                </h1>

                <p class="text-gray-500 mt-2">
                    Sistem Informasi Manajemen Mini Market
                </p>

            </div>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <!-- Email -->
                <div>
                    <x-input-label
                        for="email"
                        :value="__('Email')" />

                    <x-text-input
                        id="email"
                        class="block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">

                    <x-input-label
                        for="password"
                        :value="__('Password')" />

                    <x-text-input
                        id="password"
                        class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required />

                </div>

                <!-- Remember -->
                <div class="mt-4">

                    <label class="inline-flex items-center">

                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300">

                        <span class="ml-2 text-sm text-gray-600">
                            Remember Me
                        </span>

                    </label>

                </div>

                <div class="mt-6">

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold">

                        Login

                    </button>

                </div>

            </form>

            <div class="mt-6 border-t pt-4 text-center">

                <p class="text-sm text-gray-500">
                    Hak akses:
                </p>

                <div class="text-xs text-gray-400 mt-2">

                    Owner • Manager • Supervisor • Kasir • Gudang

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
```
