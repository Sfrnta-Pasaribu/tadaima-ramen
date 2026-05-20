<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 sm:px-6">

        <div class="w-full max-w-md bg-[#0a0a0a] rounded-[2rem] p-10 shadow-2xl border border-zinc-800/50">
            
            <div class="mb-8">
                <h2 class="text-white text-xl font-black uppercase tracking-widest italic">
                    Admin Login
                </h2>
                <div class="h-1 w-10 bg-red-600 mt-3"></div>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-white mb-2">Admin Username</label>
                    <input type="text" name="username" :value="old('username')" required autofocus
                        class="w-full bg-gray-100 border-transparent text-zinc-900 rounded-xl focus:bg-white focus:ring-2 focus:ring-red-600 focus:border-red-600 transition-all p-3.5 text-sm font-medium"
                        placeholder="tadaima_1">
                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-[10px] text-red-500 font-bold" />
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-white mb-2">Security Password</label>
                    <input type="password" name="password" required autocomplete="current-password"
                        class="w-full bg-gray-100 border-transparent text-zinc-900 rounded-xl focus:bg-white focus:ring-2 focus:ring-red-600 focus:border-red-600 transition-all p-3.5 text-sm font-medium"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] text-red-500 font-bold" />
                </div>

                <div class="flex items-center pt-2">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded bg-zinc-900 border-zinc-700 text-red-600 focus:ring-red-600">
                    <span class="ms-3 text-[10px] text-white uppercase font-black tracking-widest">Ingat Saya</span>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#d62828] hover:bg-red-700 text-white font-black py-4 rounded-xl uppercase tracking-[0.3em] transition-all transform hover:-translate-y-1 active:scale-95 shadow-lg shadow-red-900/20">
                        Masuk Ke Kedai
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <a href="/" class="text-[10px] text-gray-400 hover:text-white transition uppercase font-black tracking-widest">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>

    </div>
</x-guest-layout>