<header x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo / Brand Name -->
            <div class="flex-shrink-0">
                <a href="{{ url('/kalkulator') }}" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-blue-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 21.38V12.38" stroke="#1d4ed8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4.88208 9.23999L12.0001 12.38L19.1181 9.23999" stroke="#1d4ed8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2 14.88H22" stroke="#1d4ed8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4.88197 9.23999C3.39197 9.23999 2.19197 8.03999 2.19197 6.54999C2.19197 5.05999 3.39197 3.85999 4.88197 3.85999C6.37197 3.85999 7.57197 5.05999 7.57197 6.54999C7.57197 8.03999 6.37197 9.23999 4.88197 9.23999Z" stroke="#60a5fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19.118 9.23999C17.628 9.23999 16.428 8.03999 16.428 6.54999C16.428 5.05999 17.628 3.85999 19.118 3.85999C20.608 3.85999 21.808 5.05999 21.808 6.54999C21.808 8.03999 20.608 9.23999 19.118 9.23999Z" stroke="#60a5fa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="font-extrabold text-xl text-slate-800">FaraidApp</span>
                </a>
            </div>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ url('/kalkulator') }}"
                    class="font-semibold text-gray-600 hover:text-blue-700 transition-colors duration-200 border-b-2 
                          {{ request()->is('kalkulator') ? 'border-blue-700 text-blue-700' : 'border-transparent' }}">
                    Kalkulator
                </a>
                <a href="{{ url('/edukasi') }}"
                    class="font-semibold text-gray-600 hover:text-blue-700 transition-colors duration-200 border-b-2 
                          {{ request()->is('edukasi') ? 'border-blue-700 text-blue-700' : 'border-transparent' }}">
                    Edukasi
                </a>
                {{-- LINK BARU --}}
                <a href="{{ url('/peta-waris') }}"
                    class="font-semibold text-gray-600 hover:text-blue-700 transition-colors duration-200 border-b-2 
                          {{ request()->is('peta-waris') ? 'border-blue-700 text-blue-700' : 'border-transparent' }}">
                    Peta Waris
                </a>
            </nav>

            <!-- Hamburger Button (Mobile) -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden" x-cloak>
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ url('/kalkulator') }}"
                class="block px-3 py-2 rounded-md text-base font-semibold 
                      {{ request()->is('kalkulator') ? 'bg-blue-100 text-blue-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                Hitung Waris
            </a>
            <a href="{{ url('/edukasi') }}"
                class="block px-3 py-2 rounded-md text-base font-semibold 
                      {{ request()->is('edukasi') ? 'bg-blue-100 text-blue-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                Edukasi
            </a>
            {{-- LINK BARU --}}
            <a href="{{ url('/peta-waris') }}"
                class="block px-3 py-2 rounded-md text-base font-semibold 
                      {{ request()->is('peta-waris') ? 'bg-blue-100 text-blue-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                Peta Waris
            </a>
        </div>
    </div>
</header>