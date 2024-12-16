<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo" style="padding-top: 20%;padding-bottom:20%">
        <!--begin::Logo-->
        <a href="/dashboard">
            {{-- <img alt="Logo" src="/admin/dist/assets/media/logos/logowijaya.png" class="h-200px logo" /> --}}
            <h1 class="text-white">Toko Depo Bangunan</h1>
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="black" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <a href="/dashboard">
                        <span class="menu-link {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                            fill="black" />
                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                            fill="black" />
                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>

                            <span class="menu-title">Dashboards</span>
                        </span>
                    </a>
                </div>
                @if (auth()->user()->role == 1)
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">MENU</span>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ 'kategori' == request()->path() || 'produk' == request()->path() ? 'hover show active' : '' }}">
                        <span class="menu-link ">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                            fill="black" />
                                        <path
                                            d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Kelola Produk</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion{{ 'kategori' == request()->path() || 'produk' == request()->path() ? ' show' : '' }}"
                            {{ 'kategori' == request()->path() || 'produk' == request()->path() ? 'style=display: none; overflow: hidden;' : 'style=flex=0;' }}>
                            <div class="menu-item">
                                <a class="menu-link  {{ 'kategori' == request()->path() ? 'active' : '' }}"
                                    href="/kategori">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Kategori</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ 'produk' == request()->path() ? 'active' : '' }}"
                                    href="/produk">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Produk</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <a href="/pengguna">
                            <span class="menu-link {{ 'pengguna' == request()->path() ? 'active' : '' }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art009.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                fill="black" />
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8"
                                                rx="4" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Pengguna</span>
                            </span>
                        </a>
                    </div>
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ 'laporan/index_produk' == request()->path() || 'laporan/index_supplier' == request()->path() || 'laporan/index_penjualan' == request()->path() || 'laporanpendapatan' == request()->path() ? 'hover show active' : '' }}">
                        <span class="menu-link ">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                                            fill="black" />
                                        <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="black" />
                                        <path
                                            d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Daftar Laporan</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion{{ 'laporan/index_produk' == request()->path() || 'laporan/index_supplier' == request()->path() || 'laporan/index_penjualan' == request()->path() || 'laporanpendapatan' == request()->path() ? ' show' : '' }}"
                            {{ 'laporan/index_produk' == request()->path() || 'laporan/index_supplier' == request()->path() || 'laporan/index_penjualan' == request()->path() || 'laporanpendapatan' == request()->path() ? 'style=display: none; overflow: hidden;' : 'style=flex=0;' }}>
                            <div class="menu-item">
                                <a class="menu-link  {{ 'laporan/index_produk' == request()->path() ? 'active' : '' }}"
                                    href="/laporan/index_produk">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Laporan Produk</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ 'laporan/index_supplier' == request()->path() ? 'active' : '' }}"
                                    href="/laporan/index_supplier">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Laporan Supplier</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ 'laporan/index_penjualan' == request()->path() ? 'active' : '' }}"
                                    href="/laporan/index_penjualan">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Laporan Penjualan</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ 'laporanpendapatan' == request()->path() ? 'active' : '' }}"
                                    href="/laporanpendapatan">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Laporan Pendapatan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">TRANSAKSI</span>
                    </div>
                </div>
                @if (auth()->user()->role == 1)
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ 'supplier' == request()->path() || 'pembelian' == request()->path() ? 'hover show active' : '' }}">
                        <span class="menu-link ">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z"
                                            fill="black" />
                                        <path
                                            d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Kelola Pembelian</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion{{ 'supplier' == request()->path() || 'pembelian' == request()->path() ? ' show' : '' }}"
                            {{ 'supplier' == request()->path() || 'pembelian' == request()->path() ? 'style=display: none; overflow: hidden;' : 'style=flex=0;' }}>
                            <div class="menu-item">
                                <a class="menu-link  {{ 'supplier' == request()->path() ? 'active' : '' }}"
                                    href="/supplier">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Supplier</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ 'pembelian' == request()->path() ? 'active' : '' }}"
                                    href="/pembelian">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Pembelian</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <a href="{{ route('transaksi.baru') }}">
                        <span class="menu-link {{ 'transaksi' == request()->path() ? 'active' : '' }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/art/art009.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Penjualan</span>
                        </span>
                    </a>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <a href="/penjualan">
                        <span class="menu-link {{ 'penjualan' == request()->path() ? 'active' : '' }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/art/art009.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M22 7H2V11H22V7Z" fill="black" />
                                        <path opacity="0.3"
                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Riwayat Penjualan</span>
                        </span>
                    </a>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

</div>
