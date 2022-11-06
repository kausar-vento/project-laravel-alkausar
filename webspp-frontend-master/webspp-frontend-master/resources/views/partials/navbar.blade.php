<header>

    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background-color: #576ACA">
      <div class="position-sticky">
        <div class="container">
          <h2 class="text-light text-center" style="font-weight: 100">WEB<span class="" style="font-weight: 500">SPP</span></h2>
        </div>
        <br>
        <div class="list-group-mine list-group-flush mx-2 mt-1">

            <a href="/home" class="list-group-item list-group-item-action py-2 ripple text-white {{ $title === 'home' ? 'active' : '' }}">
                <i class="bi bi-house-fill me-3"></i><span>Beranda</span>
            </a>

            <a href="/spp" class="list-group-item list-group-item-action py-2 ripple text-white {{ $title === 'spp' ? 'active' : '' }}">
                <i class="bi bi-wallet-fill me-3"></i><span>SPP</span>
            </a>

            <a href="/data_diri" class="list-group-item list-group-item-action py-2 ripple text-white {{ $title === 'data_diri' ? 'active' : '' }}">
                <i class="fbi bi-person-fill me-3"></i><span>Data Diri</span>
            </a>

            <a href="#" class="list-group-item list-group-item-action py-2 ripple text-white ">
                <i class="fbi bi-door-open-fill me-3"></i><span>Keluar</span>
            </a>

        </div>
      </div>
    </nav>

</header>
