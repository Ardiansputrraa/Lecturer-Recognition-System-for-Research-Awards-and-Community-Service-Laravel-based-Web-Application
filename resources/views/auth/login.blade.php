<x-header></x-header>

<script></script>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center px-6 py-8 bg-gray-100">
        <div class="w-full bg-white rounded-3xl shadow-lg sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <a href="/" class="flex items-center mb-8 text-lg font-semibold text-gray-900 mt-4">
                    <!-- Heroicons login SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Masuk dengan akun Anda
                </a>
    
                <form class="space-y-4 md:space-y-6" method="POST">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                            Email</label>
                        <input type="email" name="login" id="email"
                            class="bg-gray-100 border border-gray-400 text-gray-900 sm:text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                            placeholder="masukan email anda" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukan password anda"
                            class="bg-gray-100 border border-gray-400 text-gray-900 sm:text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-400 rounded bg-gray-100 focus:ring-3 focus:ring-[#48A6A7]">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500">Ingat saya</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-[#48A6A7] hover:underline">Lupa password?</a>
                    </div>
    
                    <button type="submit"
                        class="text-white bg-[#48A6A7] hover:bg-[#006A71] py-2.5 px-4 rounded-2xl font-medium text-md w-full mt-4 mb-4">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
    
</body>

</html>
