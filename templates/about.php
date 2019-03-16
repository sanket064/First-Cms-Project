<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>About</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>

<body>
    <div class="container-fluid col-xl-12">
        <div class="row">
            <div class="wrapper">
                <div class="new-header" id="hero" data-image="<?=$arrPageDetails["strImage"]?>">
                    <nav>

                        <div class="menu-icon">
                            <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                            <img src="assets/<?=$arrPageDetails["strLogoImage"]?>" alt="<?=$arrPageDetails["strLogoImageAlt"]?>">
                        </div>

                        <div class="menu">
                            <ul>
								<li><?=getNavLinks(1, "li")?></li>
                            </ul>
                        </div>
                    </nav>

                </div>


                <div class="content new-margin">
                    <h2 class="text-center margin-bottom size"><?=$arrPageDetails["strMainTitle"]?></h2>
                    <p><?=$arrPageDetails["strContent"]?></p>
                    <p><?=$arrPageDetails["strSubContent"]?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 content2">
                <h3 class="text-center"><?=$arrPageDetails["strSubTitle"]?></h3>
                <p><?=$arrPageDetails["strDataFromTable"]?></p>
            </div>
            <div class="col-xl-6 padding">
                <img src="assets/<?=$arrPageDetails["strSubImage"]?>" alt="<?=$arrPageDetails["strImageAlt"]?>" class="image-size">
            </div>
        </div>
    </div>

     <div class="container-fluid">
        <div class="row">
            <div class="footer footer-color">
                <div class="col-xl-12">
                    <div class="footer-align">
                   <a><?=getNavLinks(2, "a")?></a>
                    </div>
                </div>
                <div class="footer-width">
                    <div class="col-xl-4 position">
                        <h6><strong>Address:-</strong><?=$arrGlobals["Address"]?></h6>
                    </div>
                    <h6 class="align-footer"><strong>Phone No:-</strong><?=$arrGlobals["Number"]?></h6>
                    <div class="col-xl-4 position1">
                        <h6 class="align-footer"><strong>Email:-</strong><?=$arrGlobals["Email"]?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 text-center footer-color-again">
                <p><?=$arrGlobals["Copyright"]?></p>
            </div>
        </div>
    </div>
    <script src="templates/javascript/style.js"></script>
</body>

</html>