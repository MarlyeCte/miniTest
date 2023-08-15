<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Logo_PogoMode/Logo_PogoMode_Foncés.png" type="image/x-icon">
    <link rel="stylesheet" href="styleCSS/style.css">
    <link rel="stylesheet" href="styleCSS/navbar.css">
</head>

<header>
    <nav class="nav">
        <div class="logoNav">
            <img src="Logo_PogoMode/Logo_PogoMode_Foncés.png" alt="">
        </div>
        <div class="navLink">
            <a href="catalogue.php">Catalogue</a>
            <a href="api_rest.php" target="_blank" onclick="return confirmGoPageApi()">Api Rest</a>
        </div>
    </nav>
</header>
</html>

<script>
    
    function confirmGoPageApi() {
        return confirm("Vous allez être redirigé vers l'interface API de notre catalogue.");
    }

</script>