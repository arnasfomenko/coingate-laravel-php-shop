
    <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <a class="navbar-brand SimplifiedShop" href="/">Simple Shop</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Products Catalog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cart">Cart
                <span class="badge badge-default badge-pill"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span>
              </a>
            </li>
            @if(!Auth::check())
              <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/myorders">My orders</a>
                <a class="dropdown-item" href="/logout">Logout</a>
              </div>
          </li>
          @endif
          </ul>
        </div>
      </nav>
