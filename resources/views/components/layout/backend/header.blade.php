<header class="h-[68px] bg-white border-b border-slate-200 flex items-center justify-between px-6 sticky top-0 z-30"
    style="box-shadow:0 1px 6px rgba(15,31,82,.07)">
    <div class="flex items-center gap-4">
        <button @click="sidebar=true" class="md:hidden text-slate-500 hover:text-slate-700">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
        <a href="{{ url('backend') }}">
            <div class="flex items-center gap-2 text-sm text-slate-500">
                <i class="fa-solid fa-house text-xs"></i>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="font-semibold text-slate-700">@yield('page-title', 'Dashboard')</span>
            </div>
        </a>
    </div>
    <div class="flex items-center gap-3">

        <div class="text-right hidden sm:block">
            <p class="text-sm font-bold text-slate-800">{{ Auth::guard('admin')->user()->nama }}</p>
            <p class="text-[11px] text-slate-400 capitalize">Admin</p>
        </div>
        <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold text-sm"
            style="background:linear-gradient(135deg,#1e40af,#0f1f52)">
            Admin
        </div>
    </div>
</header>
