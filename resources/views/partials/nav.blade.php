<nav>
    <div class="logo">
        <img src="assets/Logo64x64.png" alt="logo" />
        <h1>LOGO</h1>
    </div>
    <ul>
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Blog</a>
        </li>
        @guest
        <li>
            <a href="{{ route('login.index')}}">Login</a>
        </li>
        @endguest


        @auth
        <li>
            <a href="#">Logout</a>
        </li>
        @endauth
    </ul>
    <div class="hamburger">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </div>
</nav>
    <div class="menubar">
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Blog</a>
            </li>
            @auth
            <li>
                <a href="#">Login</a>
            </li>
            @endauth

        </ul>
    </div>
