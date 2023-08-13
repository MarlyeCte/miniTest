<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<header>
    <nav class="nav">
        <a href="catalogue.php">Catalogue</a>
        <a href="api_rest.php" onclick="return confirmGoPageApi()">Api Rest</a>
    </nav>
</header>
</html>

<script>
    
    function confirmGoPageApi() {
        return confirm("Vous allez être redirigé vers l'interface API de notre catalogue.");
    }

</script>