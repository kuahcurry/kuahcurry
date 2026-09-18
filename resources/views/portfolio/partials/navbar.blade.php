<header class="sticky top-0 z-50 bg-[#FAF9F6]/90 backdrop-blur-md border-b border-[#E8E5DC] transition-all duration-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand / Classical Monogram -->
            <a href="#hero" class="group flex items-center space-x-3 text-decoration-none">
                <span class="w-10 h-10 rounded-lg bg-[#1C1917] text-[#FAF9F6] flex items-center justify-center font-serif text-lg font-bold shadow-sm transition-transform duration-200 group-hover:scale-105">
                    {{ substr($profile->name ?? 'AV', 0, 1) }}
                </span>
                <div class="flex flex-col">
                    <span class="font-serif text-lg font-bold tracking-tight text-[#1C1917] group-hover:text-[#8F6A3B] transition-colors">
                        {{ $profile->name ?? 'Alexander Vance' }}
                    </span>
                    <span class="text-xs uppercase tracking-widest text-[#78716C] font-medium font-sans">
                        Architect & Engineer
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-[#57534E]">
                <a href="#bio" class="hover:text-[#1C1917] transition-colors">Bio</a>
                <a href="#experience" class="hover:text-[#1C1917] transition-colors">Experience</a>
                <a href="#education" class="hover:text-[#1C1917] transition-colors">Education</a>
                <a href="#projects" class="hover:text-[#1C1917] transition-colors">Projects</a>
                <a href="#skills" class="hover:text-[#1C1917] transition-colors">Stack</a>
                <a href="#contact" class="hover:text-[#1C1917] transition-colors">Contact</a>
            </nav>

            <!-- Actions: Invitation CTA Button via Material Web M3 -->
            <div class="hidden sm:flex items-center space-x-4 ml-6 pl-4 border-l border-[#E8E5DC]">
                <a href="#work-together" class="inline-block text-decoration-none my-1">
                    <md-filled-button style="--md-filled-button-container-color: #1C1917; --md-filled-button-label-text-color: #FAF9F6; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.875rem; padding-left: 20px; padding-right: 20px; margin: 0 4px;">
                        <span slot="icon" class="material-symbols-outlined text-base">handshake</span>
                        Work Together
                    </md-filled-button>
                </a>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <div class="md:hidden flex items-center ml-2">
                <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 rounded-md text-[#1C1917] hover:bg-[#E8E5DC]/50 focus:outline-none" aria-label="Toggle navigation menu">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-[#E8E5DC] py-4 px-3 space-y-2 bg-[#FAF9F6]">
            <a href="#bio" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block px-3 py-2 text-sm font-medium text-[#57534E] hover:text-[#1C1917] hover:bg-[#F4F2EB] rounded-md">Bio</a>
            <a href="#experience" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block px-3 py-2 text-sm font-medium text-[#57534E] hover:text-[#1C1917] hover:bg-[#F4F2EB] rounded-md">Experience</a>
            <a href="#education" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block px-3 py-2 text-sm font-medium text-[#57534E] hover:text-[#1C1917] hover:bg-[#F4F2EB] rounded-md">Education</a>
            <a href="#projects" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block px-3 py-2 text-sm font-medium text-[#57534E] hover:text-[#1C1917] hover:bg-[#F4F2EB] rounded-md">Projects</a>
            <a href="#skills" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block px-3 py-2 text-sm font-medium text-[#57534E] hover:text-[#1C1917] hover:bg-[#F4F2EB] rounded-md">Stack</a>
            <a href="#contact" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block px-3 py-2 text-sm font-medium text-[#57534E] hover:text-[#1C1917] hover:bg-[#F4F2EB] rounded-md">Contact</a>
            <div class="pt-4 pb-2 px-1">
                <a href="#work-together" onclick="document.getElementById('mobile-menu').classList.add('hidden')" class="block w-full">
                    <md-filled-button style="width: 100%; --md-filled-button-container-color: #1C1917; --md-filled-button-label-text-color: #FAF9F6; height: 44px;">
                        <span slot="icon" class="material-symbols-outlined text-base">handshake</span>
                        Work Together
                    </md-filled-button>
                </a>
            </div>
        </div>
    </div>
</header>
