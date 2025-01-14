<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300 flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-md mx-auto">
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden transform transition-all duration-300 hover:scale-[1.02]">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="mb-4 flex justify-center">
                            <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                        </div>

                        <h1 class="text-3xl font-extrabold text-gray-900 mb-3 tracking-tight">
                            Bem-vindo de Volta
                        </h1>
                        <p class="text-sm text-gray-600 max-w-xs mx-auto">
                            Faça login para acessar sua conta
                        </p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status 
                        class="mb-4 text-center bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" 
                        :status="session('status')" 
                    />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2 sr-only">Email</label>
                            <div class="relative">
                                <input 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition duration-300 @error('email') border-red-500 @enderror"
                                    placeholder="Seu email"
                                >
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.406a8.991 8.991 0 01-4.5 1.406"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2 sr-only">Senha</label>
                            <div class="relative">
                                <input 
                                    id="password" 
                                    type="password" 
                                    name="password" 
                                    required 
                                    autocomplete="current-password"
                                    class="block w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition duration-300 @error('password') border-red-500 @enderror"
                                    placeholder="Sua senha"
                                >
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input 
                                    id="remember_me" 
                                    type="checkbox" 
                                    name="remember"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                >
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                    Lembrar de mim
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500 transition duration-300">
                                    Esqueceu a senha?
                                </a>
                            @endif
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out transform hover:scale-[1.02] shadow-lg hover:shadow-xl"
                            >
                                Entrar
                            </button>
                        </div>
                    </form>

                    <!-- GitHub Login Button -->
                    <div class="mt-6 text-center">
                        <a href="{{ route('auth.github') }}" class="w-full flex justify-center items-center bg-gray-900 text-white py-3 rounded-xl hover:bg-gray-800 transition duration-300 ease-in-out transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 0C5.373 0 0 5.373 0 12c0 5.182 3.196 9.596 7.595 11.181.557.103.759-.239.759-.533 0-.261-.009-.953-.015-1.871-2.897.63-3.5-1.396-3.5-1.396-.472-1.2-1.153-1.522-1.153-1.522-.945-.645.072-.633.072-.633 1.043.074 1.59 1.072 1.59 1.072.928 1.59 2.435 1.133 3.03.869.094-.671.366-1.133.667-1.394-2.335-.265-4.8-1.168-4.8-5.206 0-1.148.41-2.08 1.085-2.816-.108-.265-.47-.868.063-1.8 0 0 .93.39 2.96 1.146a10.89 10.89 0 013.02-.407c1.032 0 2.054.129 3.03.388 2.03.74 2.95 1.131 2.95 1.131.536.933.199 1.535.199 1.535-.847 3.979-2.073 5.207-4.72 5.473-.233.124-.454.309-.693.548.636 1.253.978 2.728.978 4.133 0 6.627-5.373 12-12 12z"></path>
                            </svg>
                            <span>Entrar com GitHub</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center text-gray-600 text-sm">
                <p>Não tem uma conta? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 transition duration-300">
                        Cadastre-se
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
