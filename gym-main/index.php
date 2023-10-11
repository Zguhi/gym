<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Public/css/Register.css">
</head>


<!--<form action="cRegistry.php" method="post">-->
<!--    Username<input name="tusername" id="username" type="text">-->
<!--    Password<input name="tpassword" id="password" type="password">-->
<!--    <input type="submit" value="Log in">-->
<!--    chua co tai khoan ?-->
<!--    <a href="DangKi.php">Dang ki </a>-->
<!--</form>-->
<body style="background-color: #3c3f41">
<div class="container" id="container">

    <div class="form-container sign-up-container">

        <form action="xulyDangKi.php" method="Post" enctype="multipart/form-data">
            <h1>Create Account</h1>
            <span>or use your email for registration</span>
            <input type="text" name="username" id="username" placeholder="username" />
            <input type="password" name="password" id="password" placeholder="Password" />
            <input type="submit" value="Sign Up">
        </form>

    </div>

    <div class="form-container sign-in-container">

        <form action="cRegistry.php" method="post" enctype="multipart/form-data">
            <h1>Sign in</h1>

            <span>or use your account</span>
            <input name="tusername" id="username" type="text" placeholder="username">
            <input input name="tpassword" id="password" type="password" placeholder="password">
            <a href="ForgotPassword.php">Forgot your password?</a>
            <input type="submit" id="button" value="Log in">
        </form>


    </div>
    <div class="overlay-container">
        <div class="overlay">
            <!--            //di chuyen-->
            <div class="overlay-panel overlay-left">
                <h1>Already have an account ?!</h1>
                <p>Log in now to become healthy</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <!--            //di chuyen-->
            <div class="overlay-panel overlay-right">
                <h1>Want to become better now ?</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>

        </div>
    </div>
</div>
</body>
<footer>
    <p>
        Created with <i class="fa fa-heart"></i> by
        <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
        - Read how I created this and how you can join the challenge
        <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
    </p>
</footer>
</html>
<script src="Public/js/Register.js"></script>

<script>
    // Đối tượng `Validator`
    function Validator(options) {
        function getParent(element, selector) {
            while (element.parentElement) {
                if (element.parentElement.matches(selector)) {
                    return element.parentElement;
                }
                element = element.parentElement;
            }
        }

        var selectorRules = {};

        // Hàm thực hiện validate
        function validate(inputElement, rule) {
            var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
            var errorMessage;

            // Lấy ra các rules của selector
            var rules = selectorRules[rule.selector];

            // Lặp qua từng rule & kiểm tra
            // Nếu có lỗi thì dừng việc kiểm
            for (var i = 0; i < rules.length; ++i) {
                switch (inputElement.type) {
                    case 'radio':
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        );
                        break;
                    default:
                        errorMessage = rules[i](inputElement.value);
                }
                if (errorMessage) break;
            }

            if (errorMessage) {
                errorElement.innerText = errorMessage;
                getParent(inputElement, options.formGroupSelector).classList.add('invalid');
            } else {
                errorElement.innerText = '';
                getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
            }

            return !errorMessage;
        }

        // Lấy element của form cần validate
        var formElement = document.querySelector(options.form);
        if (formElement) {
            // Khi submit form
            formElement.onsubmit = function (e) {
                e.preventDefault();

                var isFormValid = true;

                // Lặp qua từng rules và validate
                options.rules.forEach(function (rule) {
                    var inputElement = formElement.querySelector(rule.selector);
                    var isValid = validate(inputElement, rule);
                    if (!isValid) {
                        isFormValid = false;
                    }
                });

                if (isFormValid) {
                    // Trường hợp submit với javascript
                    if (typeof options.onSubmit === 'function') {
                        var enableInputs = formElement.querySelectorAll('[name]');
                        var formValues = Array.from(enableInputs).reduce(function (values, input) {

                            switch(input.type) {
                                case 'radio':
                                    values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                                    break;
                                case 'checkbox':
                                    if (!input.matches(':checked')) {
                                        values[input.name] = '';
                                        return values;
                                    }
                                    if (!Array.isArray(values[input.name])) {
                                        values[input.name] = [];
                                    }
                                    values[input.name].push(input.value);
                                    break;
                                case 'file':
                                    values[input.name] = input.files;
                                    break;
                                default:
                                    values[input.name] = input.value;
                            }

                            return values;
                        }, {});
                        options.onSubmit(formValues);
                    }
                    // Trường hợp submit với hành vi mặc định
                    else {
                        formElement.submit();
                    }
                }
            }

            // Lặp qua mỗi rule và xử lý (lắng nghe sự kiện blur, input, ...)
            options.rules.forEach(function (rule) {

                // Lưu lại các rules cho mỗi input
                if (Array.isArray(selectorRules[rule.selector])) {
                    selectorRules[rule.selector].push(rule.test);
                } else {
                    selectorRules[rule.selector] = [rule.test];
                }

                var inputElements = formElement.querySelectorAll(rule.selector);

                Array.from(inputElements).forEach(function (inputElement) {
                    // Xử lý trường hợp blur khỏi input
                    inputElement.onblur = function () {
                        validate(inputElement, rule);
                    }

                    // Xử lý mỗi khi người dùng nhập vào input
                    inputElement.oninput = function () {
                        var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                        errorElement.innerText = '';
                        getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                    }
                });
            });
        }

    }



    // Định nghĩa rules
    // Nguyên tắc của các rules:
    // 1. Khi có lỗi => Trả ra message lỗi
    // 2. Khi hợp lệ => Không trả ra cái gì cả (undefined)
    Validator.isRequired = function (selector, message) {
        return {
            selector: selector,
            test: function (value) {
                return value ? undefined :  message || 'Vui lòng nhập trường này'
            }
        };
    }

    Validator.isEmail = function (selector, message) {
        return {
            selector: selector,
            test: function (value) {
                var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                return regex.test(value) ? undefined :  message || 'Trường này phải là email';
            }
        };
    }

    Validator.minLength = function (selector, min, message) {
        return {
            selector: selector,
            test: function (value) {
                return value.length >= min ? undefined :  message || `Vui lòng nhập tối thiểu ${min} kí tự`;
            }
        };
    }

    Validator.isConfirmed = function (selector, getConfirmValue, message) {
        return {
            selector: selector,
            test: function (value) {
                return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
            }
        }
    }

</script>