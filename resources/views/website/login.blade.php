<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="png" href="{{ url('public/website') }}/assets/img/Logo.png">
    <title>Login SignUp</title>
    <link rel="stylesheet" type="text/css" href="{{ url('public/website') }}/assets/css/loginStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- It will redirect to the Home Page after submitting the form -->
</head>

<body>
    <div class="form-box" style="overflow-y: scroll !important;">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" id="log" onclick="login()" style="color: #fff;">Log
                In</button>
            <button type="button" class="toggle-btn" id="reg" onclick="register()">Register</button>
        </div>
        <div class="social-icons">
            <a href="https://www.facebook.com/ash.kun.14473"><img
                    src="{{ url('public/website') }}/assets/img/icons/fb2.png"></a>
            <a href="https://www.instagram.com/milotic_ash/"><img
                    src="{{ url('public/website') }}/assets/img/icons/insta2.png"></a>
            <a href="https://twitter.com/AshDas19"><img src="{{ url('public/website') }}/assets/img/icons/tt2.png"></a>
        </div>

        <!-- Login Form -->
        <form id="login" class="input-group" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="inp">
                <img src="{{ url('public/website') }}/assets/img/icons/user.png"><input type="text" id="email"
                    class="input-field" name="email" placeholder="Username or Phone Number"
                    style="width: 88%; border:none;" required="required">
            </div>
            <div class="inp">
                <img src="{{ url('public/website') }}/assets/img/icons/password.png"><input type="password"
                    id="password" name="password" class="input-field" placeholder="Password"
                    style="width: 88%; border: none;" required="required">
            </div>
            <input type="checkbox" class="check-box">Remember Password
            <button type="submit" class="submit-btn">Log In</button>
        </form>


        <div class="other" id="other">
            <div class="instead">
                <h3>or</h3>
            </div>
            <button class="connect" onclick="google()">
                <img src="{{ url('public/website') }}/assets/img/icons/google.png"><span>Sign in with Google</span>
            </button>
        </div>

        <!-- Registration Form -->
        <form id="register" method="POST" action="{{ route('register') }}" class="input-group">
            @csrf
            <input type="text" class="input-field" placeholder="Full Name" name="name" required="required">
            <input type="email" class="input-field" placeholder="Email Address" name="email" required="required">

            <input type="date" class="input-field" placeholder="" name="dob" required="required">
            <input type="number" class="input-field" placeholder="Phone" name="phone" required="required">
            <input type="text" class="input-field" placeholder="Address" name="address" required="required">
            <select name="city" class="input-field" required>
                <option value="">Select City</option>
                @foreach ($data as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>
            <input type="text" class="input-field" placeholder="State" name="state" required="required">


            <input type="password" class="input-field" placeholder="Create Password" name="password" name="psame"
                required="required">
            <input type="password" class="input-field" placeholder="Confirm Password" name="password_confirmation"
                name="psame" required="required">
            <input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()">I agree to the Terms &
            Conditions
            <button type="submit" id="btnSubmit" class="submit-btn reg-btn">Register</button>
        </form>
    </div>
    <script type="text/javascript" src="{{ url('public/website') }}/assets/js/script.js"></script>
</body>

</html>
