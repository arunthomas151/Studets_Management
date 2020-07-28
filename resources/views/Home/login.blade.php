<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('css/bootstrap.min.js') }}"></script>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form class="form" action="{{ route('authentication') }}" method="post">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <label style="color:red">@isset($notify)
                                {{ $notify }}
                            @endisset </label>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="{{ route('register') }}" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
