<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>
<body>
    <header class="d-flex justify-content-center align-items-center">
        <h3 class="text-dark">MySpacer</h3>
    </header>
    <div class="displayedView p-1">
        @yield('content')   
    </div>
    <footer class="d-flex justify-content-center align-items-center text-dark">
        <p>MySpace @<?=date('Y');?></p>
    </footer>
</body>
</html>

<style>
    h3{
        margin: 0;
    }
    body{
        min-height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
    }
    header{
        background-color: #e5e5f7;
        background: repeating-linear-gradient( 45deg, #5fa472, #5fa472 5px, #e5e5f7 5px, #e5e5f7 25px );
        height: 50px;
    }
    footer{
        margin-top: auto;
        background-color: #e5e5f7;
        background: repeating-linear-gradient( -45deg, #5fa472, #5fa472 5px, #e5e5f7 5px, #e5e5f7 25px );
        height: 50px;
    }
</style>