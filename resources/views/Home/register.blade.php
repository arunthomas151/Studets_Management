<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('css/bootstrap.min.js') }}"></script>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Registration</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form class="form" action="{{ route('registration') }}" method="post">
                            @csrf
                            <h3 class="text-center text-info">Registration</h3>
                            <label style="color:red">@isset($msg)
                                {{ $msg }}
                            @endisset </label>
                            <div class="form-group">
                                <label for="username" class="text-info">Name :</label><br>
                                <input type="text" name="name" id="name" autocomplete="off" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">User Name :</label><br>
                                <input type="text" name="username" id="username" autocomplete="off" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password :</label><br>
                                <input type="text" name="password" id="password" autocomplete="off" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Address:</label><br>
                                <textarea type="text" name="address" id="address" autocomplete="off" required class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="{{ route('login') }}" class="text-info">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
