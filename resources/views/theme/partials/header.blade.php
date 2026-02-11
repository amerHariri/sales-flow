<!-- Header -->
<header id="header">
    <div class="logo">
        <a href="{{ route('theme.index') }}">Sales Flow</a>
    </div>

    <div style="z-index:99">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn" type="submit">Logout</button>
        </form>
    </div>
</header>