<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="background">
    <div class="container-fluid h-100 d-flex justify-content-center col-xl-12 margin">
        <div class="row">
            <div class="login halfpane">

                <article>
                    <div class="col-xl-12 center image">
                        <img src="imgs/pic2.png"></div>

                    <h1 class="font-size">Login to Donate For Kids</h1>
                    <p>Access your CMS to make changes to your website.</p>

                    <form method="post" action="actions/processLogin.php">
                        <input type="text" placeholder="Email Address" name="strEmail" required />
                        <input type="password" placeholder="Password" name="strPassword" required />
                        <input type="submit" value="Login">
                    </form>
                </article>
            </div>
        </div>
    </div>
    </script>
</body>

</html>