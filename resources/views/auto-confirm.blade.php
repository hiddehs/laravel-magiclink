<!DOCTYPE html>
<html>
<head>
    <title>Confirmation</title>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <style>
        .wrapper {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>

<script !src="">
    function onSubmit(token) {
        document.getElementsByTagName("form")[0].submit()
    }
    window.onload = function () {
        hcaptcha.execute();
    }
</script>
<div class="wrapper">
    <form method="get">
        {{ csrf_field() }}
        <input type="hidden" value="true" name="auto-confirm">
        <div class="h-captcha"
             data-callback="onSubmit"
             data-size="invisible"
             data-sitekey="{{config('magiclink.confirmation.hcaptcha_sitekey')}}"></div>
    </form>
</div>
</body>
</html>
