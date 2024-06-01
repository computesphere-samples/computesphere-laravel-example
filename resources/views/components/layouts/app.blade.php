<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Welcome to ComputeSphere' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="/assets/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="watermark">
        <header class="flex-center">
            <img src="/assets/images/logo.svg">
            <h2 class="text">ComputeSphere</h2>
        </header>
        <div class="container flex-center">
            <p class="logo-text">Welcome to <span class="logo-gradient">ComputeSphere</span></p>

            {{ $slot }}
            <br>
            <a class="text link" href="https://docs.computesphere.com/">Explore our documentation</a>
            <a class="text link" href="https://support.computesphere.com/">Reach out to support</a>
        </div>
        <footer class="flex-center">
            <p>Copyright &copy; <span id="currentYear"></span> ComputeSphere LLC</p>
            <div class="footer-links">
                <span>All Rights Reserved |</a>
                    <a class="text link" href="https://computesphere.com/">Terms & Conditions |</a>
                    <a class="text link" href="https://computesphere.com/">Privacy Policy</a>
            </div>
        </footer>
    </div>
    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>
</body>

</html>
