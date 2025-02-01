<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>@yield('title')</title>
</head>
<body class="container d-flex flex-column min-vh-100">
    <header>
        <nav class="mb-4 navbar navbar-expand-lg bg-info rounded">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">CRUD</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('clients.index') ? 'active' : '' }}" aria-current="page" href="{{route('clients.index')}}">Clients</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('produits.index') ? 'active' : '' }}" href="{{route('produits.index')}}">Produits</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('commandes.index') ? 'active' : '' }}" id="lien3" href="{{route('commandes.index')}}">Commandes</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <div class="container mt-auto">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="{{route('clients.index')}}" class="nav-link px-2 text-muted">Clients</a></li>
            <li class="nav-item"><a href="{{route('produits.index')}}" class="nav-link px-2 text-muted">Produits</a></li>
            <li class="nav-item"><a href="{{route('commandes.index')}}" class="nav-link px-2 text-muted">Commandes</a></li>
          </ul>
          <p class="text-center text-muted">© 2025 HESTIM, Inc</p>
        </footer>
    </div>

</body>
</html>