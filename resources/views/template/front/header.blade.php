<header class="sticky top-0 z-50 w-full border-b border-neutral-200">
        <div class="text-primary-5 bg-primary-1 py-4">
            <div class="container grid grid-cols-3 justify-between items-center font-primary  overflow-auto">
                <div class="flex justify-start space-x-2">
                    <i class="fas fa-headphones"></i>
                    <span>24/7 +62 856-9565-8645</span>
                </div>
                <div class="flex justify-center">
                    <img src="../../../assets/front/image/Anindhaloka.png" class="" width="200px" alt="">
                </div>
                @if(!Auth::check())
                    <span href="{{route('login')}}" class="flex justify-end space-x-2 hover:text-red-500">
                            <a href="{{route('login')}}">
                                Masuk  
                            </a>
                            / 
                            <a href="{{ route('register') }}"> 
                                Daftar 
                            </a>
                        <i class="fas fa-user"></i>
                    </span>
                @else
                <div  class="relative flex justify-end space-x-2 hover:text-red-500 gap-2">
                    <button id="profileDropdownBtn"> 
                        {{ Auth::user()->profile->nama ?? '' }} 
                        <i class="fas fa-user"></i>
                    </button>
                    
                    <ul id="profileDropdown" class="absolute right-2 mt-8 w-48 bg-primary-1 border border-primary-5 rounded-md shadow-lg z-50 hidden">
                        <li>
                            <a href="{{ route('profil') }}" class="block px-4 py-2 text-primary-5 hover:bg-primary-2 hover:text-red-500">Profil</a>
                        </li>
                        <li>
                            <a href="{{ route('riwayat.transaksi') }}" class="block px-4 py-2 text-primary-5 hover:bg-primary-2 hover:text-red-500">Riwayat Transaksi</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="GET">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-primary-5 hover:bg-primary-2 hover:text-red-500">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="bg-primary-3">
            <div class="container flex items-center justify-center py-2 font-inter">
                <nav id="nav-menu"
                    class="absolute uppercase font-semibold flex-col hidden gap-2 p-6 text-sm text-center text-primary-5 border rounded-lg md:flex border-primary-500 md:border-none md:p-0 md:rounded-none top-full right-4 md:bg-transparent md:flex-row md:gap-3 lg:gap-8 md:space-x-2 lg:space-x-4 md:static ">
                    <a href="{{route('home')}}" class="hover:text-red-500">
                        Beranda
                    </a>
                    <a href="{{route('about')}}" class="hover:text-red-500">
                        Tentang Kami
                    </a>
                    <a href="{{route('promo')}}" class="hover:text-red-500">
                        Promo
                    </a>
                    <a href="{{route('room')}}" class="hover:text-red-500">
                        Ruangan
                    </a>
                    <a href="{{route('contact')}}" class="hover:text-red-500">
                        Kontak
                    </a>
                </nav>
                <button id="btn-menu"
                    class="flex px-4 py-2 mr-4 text-white rounded-lg md:hidden bg-primary-500 hover:bg-primary-600">
                    <i class="text-xl fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('profileDropdownBtn');
        const menu = document.getElementById('profileDropdown');

        btn.addEventListener('click', function () {
            menu.classList.toggle('hidden');
        });

        // Optional: Klik di luar untuk menutup
        document.addEventListener('click', function (e) {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });
</script>
@endsection