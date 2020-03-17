<!DOCTYPE html>
<html>

<head>

    <script src="https://www.google.com/recaptcha/api.js?render=your client side key here"></script>

</head>

<body>
    
    <form method="post" action="action.php">
        <input type="text" name="nama" placeholder="Nama ">
        <input type="submit" value="Submit" name="post">

        <input type="hidden" id="token" name="token">
    </form>
</body>

<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('your client side key here', {
            action: 'homepage'
        }).then(function(token) {
            console.log(token);
            document.getElementById("token").value = token;
        });
    });
</script>

</html>