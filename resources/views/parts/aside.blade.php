@php
    $active = 'bg-gray-500 font-semibold';
    $normal = '';
@endphp
<aside class="adminAside">
    <!-- ハンバーガーメニュー -->
    <div class="header__hamburger">
        <button class="hamburger" id="js-hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    

    <!-- ナビ -->
    <nav class="adminAside__nav" id="js-nav">
        <ul>
            <li class="{{ request()->routeIs('admin.index') ? $active : $normal }}">
                <a href="/admin"><i class="fa-solid fa-house-chimney"></i>HOME</a>
            </li>
            <li class="{{ request()->routeIs('admin.users*') ? $active : $normal }}">
                <a href="/admin/users"><i class="fa-solid fa-envelopes-bulk"></i>アカウント一覧</a>
            </li>
            <li class="{{ request()->routeIs('admin.contact.*') ? $active : $normal }}">
                <a href="/admin/contact"><i class="fa-solid fa-envelopes-bulk"></i>お問い合わせ一覧</a>
            </li>
        </ul>
    </nav>
</aside>