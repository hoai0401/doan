<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/signup_style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body class="body">
    <a href="https://github.com/Mehedi61/Login-form-Sign-up-form"
        ><img
        style="position: absolute; top: 0; left: 0; border: 0"
        src="https://camo.githubusercontent.com/c6625ac1f3ee0a12250227cf83ce904423abf351/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f677261795f3664366436642e706e67"
        alt="Fork me on GitHub"
        data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_gray_6d6d6d.png"
    /></a>

    <div class="login-page">
        <div class="form">
            <!-- Hiển thị thông báo lỗi -->
            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('signup') }}" onsubmit="return validateForm();">
                @csrf
                <lottie-player
                    src="https://assets4.lottiefiles.com/datafiles/XRVoUu3IX4sGWtiC3MPpFnJvZNq7lVWDCa8LSqgS/profile.json"
                    background="transparent"
                    speed="1"
                    style="justify-content: center"
                    loop
                    autoplay
                ></lottie-player>
                <input type="text" name="name" placeholder="Full Name" required pattern="[a-zA-Z\sáàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵ]+" title="Only letters and spaces are allowed">
                <input type="email" name="email" id="email" placeholder="Email Address" required>
                <input type="tel" name="phone" placeholder="Phone Number" required pattern="0[0-9]{9}" title="Phone number must start with 0 and have 10 digits">
                <input type="password" name="password" id="password" placeholder="Set a Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one digit, one lowercase and one uppercase letter, and be at least 6 characters long.">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                <button type="submit">SIGN UP</button>
            </form>

            <form class="login-form">
                <a href="{{ route('login') }}"><button type="button">LOGIN</button></a>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var nameInput = document.getElementsByName("name")[0];
            var emailInput = document.getElementById("email");
            var phoneInput = document.getElementsByName("phone")[0];
            var passwordInput = document.getElementById("password");
            var confirmPasswordInput = document.getElementById("password_confirmation");

            // Validate name (only letters and spaces)
            var namePattern = /^[a-zA-Z\sáàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵ]+$/;
            if (!namePattern.test(nameInput.value)) {
                alert("Vui lòng nhập tên hợp lệ (chỉ chấp nhận chữ và khoảng trắng).");
                return false;
            }

            // Validate email
            var emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
            if (!emailPattern.test(emailInput.value)) {
                alert("Vui lòng nhập địa chỉ Gmail hợp lệ.");
                return false;
            }

            // Validate if email already exists in the database
            var existingEmails = <?php echo json_encode($existingEmails); ?>;
            if (existingEmails.includes(emailInput.value)) {
                alert("Địa chỉ Gmail đã tồn tại trong cơ sở dữ liệu.");
                return false;
            }

            // Validate phone (starts with 0 and has 10 digits)
            var phonePattern = /^0[0-9]{9}$/;
            if (!phonePattern.test(phoneInput.value)) {
                alert("Vui lòng nhập số điện thoại hợp lệ (bắt đầu bằng số 0 và có 10 chữ số).");
                return false;
            }

            // Validate password match
            if (passwordInput.value !== confirmPasswordInput.value) {
                alert("Mật khẩu và xác nhận mật khẩu không khớp.");
                return false;
            }

            // Validate password strength
            var passwordStrength = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
            if (!passwordStrength.test(passwordInput.value)) {
                alert("Mật khẩu phải chứa ít nhất một chữ số, một chữ cái viết thường và một chữ cái viết hoa, và ít nhất 6 ký tự.");
                return false;
            }

            return true;
        }

        // Ẩn thông báo lỗi khi người dùng bắt đầu nhập
        document.addEventListener('input', function() {
            var errorMessage = document.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        });
    </script>
</body>
</html>
