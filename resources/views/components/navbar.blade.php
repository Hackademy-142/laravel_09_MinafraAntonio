<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        @Auth{{-- se l utente ha l autenticazione --}}
        <li class="nav-item">
          <a class="nav-link" href="{{route('index')}}">Prodotti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('product.create')}}">Inserisci prodotti</a>
        </li>
        @endauth

        @guest
        {{-- se l utente non è registrato --}}
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Accedi</a>
        </li>

        @endguest

        @auth
        <li class="nav-item">
          <form
          method="POST"
          action="{{route('logout')}}">
          @csrf
          <button class="nav-link" type="submit">Logout</button>
        </form>
      </li>
        @endauth

    </ul>
  </div>
</div>
</nav>