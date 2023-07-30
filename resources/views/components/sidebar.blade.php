<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="/assets/dist/img/enjedata-64.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-bold">ENJEDATA</span>
    </a>

    <div class="sidebar text-xs">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                    <li class="nav-item">
                        <a href="/person/create" class="nav-link {{ $title == 'Formulir' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Formulir
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/invalid" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fas fa-qrcode"></i>
                        <p>
                            QR Code
                        </p>
                    </a>
                </li>
                <li class="nav-header">DATA POKOK</li>
                <li class="nav-item">
                    <a href="/person" class="nav-link {{ $title == 'Data Person' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Person
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Peserta Didik
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/santri" class="nav-link {{ $title == 'Data Santri' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-caret-right"></i>
                        <p>
                            Santri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pelajar" class="nav-link {{ $title == 'Data Pelajar' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-caret-right"></i>
                        <p>
                            Pelajar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/invalid" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fas fa-blind"></i>
                        <p>
                            Wali
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pengurus" class="nav-link {{ $title == 'Data Pengurus' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Pengurus
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/karyawan" class="nav-link {{ $title == 'Data Karyawan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/invalid" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fab fa-black-tie"></i>
                        <p>
                            Alumni
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/document/foto-diri" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Foto Diri
                        </p>
                    </a>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Berkas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/document/kartu-keluarga" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fas fa-caret-right"></i>
                        <p>
                            Kartu Keluarga
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/document/akte" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fas fa-caret-right"></i>
                        <p>
                            Akte
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/document/ijazah" class="nav-link {{ $title == 'XXX' ? 'XXX' : 'XXX' }}">
                        <i class="nav-icon fas fa-caret-right"></i>
                        <p>
                            Ijazah
                        </p>
                    </a>
                </li>
                <li class="nav-header">KEPESANTRENAN</li>
                <li class="nav-item">
                    <a href="/laporan-kosmara?bulan={{ Str::lower(\Carbon\Carbon::now()->isoFormat('MMMM')) }}&tahun={{ Str::lower(\Carbon\Carbon::now()->isoFormat('Y')) }}"
                        class="nav-link {{ $title == 'Laporan Kos Makan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/invalid" class="nav-link {{ $title == 'xxx' ? 'xxx' : 'xxx' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Perizinan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/invalid" class="nav-link {{ $title == 'xxx' ? 'xxx' : 'xxx' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Pelanggaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/invalid" class="nav-link {{ $title == 'xxx' ? 'xxx' : 'xxx' }}">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>
                            Presensi
                        </p>
                    </a>
                </li>
                @if (auth()->user()->role === 'sysadmin')
                    <li class="nav-header">PENGATURAN</li>
                    <li class="nav-item">
                        <a href="/invalid" class="nav-link {{ $title == 'xxx' ? 'xxx' : 'xxx' }}">
                            <i class="nav-icon fas fa-receipt"></i>
                            <p>
                                Tagihan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/wilayah" class="nav-link {{ $title == 'Data Wilayah' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hotel"></i>
                            <p>
                                Wilayah
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kamar" class="nav-link {{ $title == 'Data Kamar' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-campground"></i>
                            <p>
                                Kamar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lembaga" class="nav-link {{ $title == 'Data Lembaga' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-landmark"></i>
                            <p>
                                Lembaga
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kelas" class="nav-link {{ $title == 'Data Kelas' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-store"></i>
                            <p>
                                Kelas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/jabatan" class="nav-link {{ $title == 'Data Jabatan' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-random"></i>
                            <p>
                                Jabatan
                            </p>
                        </a>
                    </li>
                @endif
                @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                    <li class="nav-header">ADMINISTRASI</li>
                    <li class="nav-item">
                        <a href="/user" class="nav-link {{ $title == 'Data User' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Users Account
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/peserta-kosmara"
                            class="nav-link {{ $title == 'Data Peserta Kosmara' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-utensils"></i>
                            <p>
                                Peserta Kosmara
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
