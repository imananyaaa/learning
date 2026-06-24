<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — Learning Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        .sidebar-bg { background: linear-gradient(175deg,#0f1f52 0%,#1e3a8a 60%,#1e40af 100%); }
        .nav-link { display:flex;align-items:center;gap:12px;padding:10px 14px;border-radius:10px;font-size:.875rem;font-weight:500;color:rgba(255,255,255,.65);transition:all .2s;text-decoration:none; }
        .nav-link:hover { background:rgba(255,255,255,.10);color:#fff; }
        .nav-link.active { background:rgba(255,255,255,.18);color:#fff;font-weight:700;box-shadow:inset 0 0 0 1px rgba(255,255,255,.12); }
        .nav-icon { width:30px;height:30px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0;background:rgba(255,255,255,.08); }
        .nav-link.active .nav-icon { background:rgba(255,255,255,.22); }
        .nav-section { font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:rgba(255,255,255,.3);padding:0 14px;margin:14px 0 6px; }
        .card { background:#fff;border-radius:16px;border:1px solid #e8edf5;box-shadow:0 1px 6px rgba(15,31,82,.06); }
        .btn-primary { background:#1e40af;color:#fff;border-radius:10px;padding:9px 20px;font-size:.85rem;font-weight:700;display:inline-flex;align-items:center;gap:7px;transition:all .2s;text-decoration:none;border:none;cursor:pointer; }
        .btn-primary:hover { background:#1b3a99;transform:translateY(-1px);color:#fff; }
        .btn-danger { background:#fef2f2;color:#dc2626;border-radius:8px;padding:6px 13px;font-size:.78rem;font-weight:700;display:inline-flex;align-items:center;gap:5px;transition:all .2s;border:none;cursor:pointer; }
        .btn-danger:hover { background:#dc2626;color:#fff; }
        .btn-warning { background:#fffbeb;color:#d97706;border-radius:8px;padding:6px 13px;font-size:.78rem;font-weight:700;display:inline-flex;align-items:center;gap:5px;transition:all .2s;text-decoration:none;border:none;cursor:pointer; }
        .btn-warning:hover { background:#f59e0b;color:#fff; }
        .btn-info { background:#eff6ff;color:#2563eb;border-radius:8px;padding:6px 13px;font-size:.78rem;font-weight:700;display:inline-flex;align-items:center;gap:5px;transition:all .2s;text-decoration:none;border:none;cursor:pointer; }
        .btn-info:hover { background:#2563eb;color:#fff; }
        .tbl-head { background:linear-gradient(90deg,#0f1f52,#1e40af); }
        .tbl-head th { padding:12px 16px;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:rgba(255,255,255,.85); }
        .tbl-row td { padding:12px 16px;font-size:.84rem;border-bottom:1px solid #f1f5f9;color:#1e293b; }
        .tbl-row:last-child td { border-bottom:none; }
        .tbl-row:hover td { background:#f8faff; }
        .badge { padding:3px 10px;border-radius:20px;font-size:.7rem;font-weight:700;display:inline-block; }
        .badge-blue { background:#dbeafe;color:#1e40af; }
        .badge-green { background:#dcfce7;color:#16a34a; }
        .badge-yellow { background:#fef9c3;color:#a16207; }
        .badge-red { background:#fee2e2;color:#dc2626; }
        .badge-gray { background:#f1f5f9;color:#475569; }
        .form-input { width:100%;padding:10px 14px;border:1.5px solid #e2e8f0;border-radius:10px;font-family:inherit;font-size:.88rem;color:#0f172a;outline:none;transition:all .2s;background:#fff; }
        .form-input:focus { border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.12); }
        textarea.form-input { resize:vertical;min-height:90px; }
        .form-label { font-size:.8rem;font-weight:700;color:#0f172a;margin-bottom:6px;display:block; }
        .form-error { font-size:.74rem;color:#dc2626;margin-top:4px; }
        .alert-s { background:#f0fdf4;border:1px solid #bbf7d0;color:#15803d;padding:12px 16px;border-radius:10px;font-size:.85rem;display:flex;align-items:center;gap:8px;margin-bottom:16px; }
        .alert-e { background:#fef2f2;border:1px solid #fecaca;color:#dc2626;padding:12px 16px;border-radius:10px;font-size:.85rem;display:flex;align-items:center;gap:8px;margin-bottom:16px; }
        .stars { color:#f59e0b; }
    </style>
</head>
<body class="bg-slate-50" x-data="{ sidebar: false }">

{{-- SIDEBAR --}}
<x-layout.backend.sidebar/>

<div x-show="sidebar" x-cloak @click="sidebar=false" class="fixed inset-0 z-40 bg-black/50 md:hidden"></div>

{{-- MAIN --}}
<div class="md:ml-64 min-h-screen flex flex-col">
    <x-layout.backend.header/>
    <main class="flex-1 p-6 md:p-8">
        @if(session('success'))
        <div class="alert-s mb-4"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert-e mb-4"><i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}</div>
        @endif
        {{ $slot }}
    </main>
</div>

{{-- DELETE MODAL --}}
<div id="delModal" style="display:none" class="fixed inset-0 z-[9999] bg-black/50 backdrop-blur-sm flex items-center justify-center" onclick="if(event.target===this)closeDel()">
    <div class="bg-white rounded-2xl p-7 max-w-sm w-full mx-4 text-center shadow-2xl">
        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fa-solid fa-trash text-red-500 text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-800 mb-2">Hapus Data?</h3>
        <p class="text-slate-500 text-sm mb-6">Data yang dihapus <strong>tidak dapat dikembalikan</strong>.</p>
        <div class="flex gap-3">
            <button onclick="closeDel()" class="flex-1 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50">Batal</button>
            <form id="delForm" method="POST" class="flex-1">
                @csrf @method('DELETE')
                <button type="submit" class="w-full py-2.5 rounded-xl bg-red-500 text-white font-bold text-sm hover:bg-red-600">Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
function openDel(url){ document.getElementById('delForm').action=url; document.getElementById('delModal').style.display='flex'; }
function closeDel(){ document.getElementById('delModal').style.display='none'; }
document.querySelectorAll('.alert-s,.alert-e').forEach(el=>{
    setTimeout(()=>{ el.style.transition='opacity .5s'; el.style.opacity='0'; setTimeout(()=>el.remove(),500); },4000);
});
</script>
@stack('scripts')
</body>
</html>
