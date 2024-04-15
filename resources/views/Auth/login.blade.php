@extends('partials.layout')

@section('content')
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true" checked>

        <div class="signup">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true" class="signup-label">Sign up</label>
                <input type="text" name="name" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Sign up</button>
            </form>
            <div>
                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit">Login</button>
            </form>
            <div>
                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                <h1>{{session('success')}}</h1>
                <ul>
                    <li style="color: green">{{session('success')}}</li>
                </ul>
                @endif
            </div>
        </div>

</div>

@endsection
