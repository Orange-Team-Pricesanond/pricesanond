<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}">
    <title>Recover Password</title>

    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/styles2.css') }}" />

</head>
<body>

    <main class="login">
        <div class="box bg_l">
            <form method="POST" action="{{ route('password.update') }}">
                <h1 class="site-title">
                    <span>{{ __('Reset Password') }}</span>
                </h1>

                <div class="mb-4">
                    <label>Your email</label>
                    <input placeholder="Enter Your email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-block btn-primary my-4" type="submit">{{ __('Reset Password') }}</button>
            </form>
        </div>
        <div class="box bg_r">
        </div>
    </main>

    <!-- Site JS -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <!-- Site JS -->
    
</body>
</html>