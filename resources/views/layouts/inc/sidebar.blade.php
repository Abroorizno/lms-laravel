@php
    $user = auth()->user();
@endphp

<div class="app-brand demo">
    <a href="#" class="app-brand-link">
        <span class="app-brand-text menu-text fw-bolder fs-3 ms-2">LMS PPKD-JP</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">


    @if ($user && $user->level_id === 1)
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="/admin" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Data PPKD</span></li>

        <li class="menu-item">
            <a href="/class" class="menu-link">
                <i class='menu-icon tf-icons bx bx-chalkboard'></i>
                <div data-i18n="Analytics">Class</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-group"></i>
                <div data-i18n="Form Elements">Instructors Data</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/instructor" class="menu-link">
                        <div data-i18n="Basic Inputs">Web Programming</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="instructor/mobile" class="menu-link">
                        <div data-i18n="Input groups">Mobile Programming</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-group"></i>
                <div data-i18n="Form Elements">Students Data</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/pos" class="menu-link">
                        <div data-i18n="Basic Inputs">Web Programming</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="forms-input-groups.html" class="menu-link">
                        <div data-i18n="Input groups">Mobile Programming</div>
                    </a>
                </li>
            </ul>
        </li>
    @else
        <li class="menu-item active">
            <a href="/instruktur" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Schedule</span></li>

        <li class="menu-item active">
            <a href="/instruktur" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-calendar-event"></i>
                <div data-i18n="Analytics">On Demand</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Modul</span></li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-file-archive"></i>
                <div data-i18n="Form Elements">Moduls</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/pos" class="menu-link">
                        <div data-i18n="Basic Inputs">Week 1</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="forms-input-groups.html" class="menu-link">
                        <div data-i18n="Input groups">Week 2</div>
                    </a>
                </li>
            </ul>
        </li>
    @endif

    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
    <li class="menu-item">
        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
            class="menu-link">
            <i class="menu-icon tf-icons bx bx-support"></i>
            <div data-i18n="Support">Support</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
            class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="Documentation">Documentation</div>
        </a>
    </li>
</ul>
