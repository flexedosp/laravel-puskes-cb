@extends('layouts.app')

@section('container')
<section class="vw-100 vh-auto" style="padding-top: 3cm">
    <nav id="navbar-example2" class="navbar bg-body-tertiary rounded px-3 shadow-sm position-fixed" style="margin: 0px 100px; top:25%">
        <a class="navbar-brand" href="#">Navigasi</a>
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading1">Tentang Puskesmas Curugbitung</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading2">Struktur Organisasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading3">Visi & Misi</a>
          </li>
        </ul>
      </nav>
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3" tabindex="0" style="margin:100px 100px 200px 100px; padding-bottom:300px;">
        <div id="scrollspyHeading1" style="padding-top:80px;">
            <h4 >Tentang Puskesmas Curugbitung</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas libero necessitatibus laudantium vero, facilis ipsa consequatur aut impedit voluptate ullam praesentium, repellendus quos aliquam consectetur non culpa dolor fugit assumenda, enim officia mollitia eius. Similique, quasi? Reiciendis quod consequuntur ipsum vel, aperiam similique, inventore possimus nostrum soluta ab eum eius!</p>
        </div>
        <div id="scrollspyHeading2" style="padding-top:80px;">
            <h4 >Struktur Organisasi</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas libero necessitatibus laudantium vero, facilis ipsa consequatur aut impedit voluptate ullam praesentium, repellendus quos aliquam consectetur non culpa dolor fugit assumenda, enim officia mollitia eius. Similique, quasi? Reiciendis quod consequuntur ipsum vel, aperiam similique, inventore possimus nostrum soluta ab eum eius!</p>
        </div>
        <div id="scrollspyHeading3" style="padding-top:80px;">
            <h4 >Visi & Misi</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas libero necessitatibus laudantium vero, facilis ipsa consequatur aut impedit voluptate ullam praesentium, repellendus quos aliquam consectetur non culpa dolor fugit assumenda, enim officia mollitia eius. Similique, quasi? Reiciendis quod consequuntur ipsum vel, aperiam similique, inventore possimus nostrum soluta ab eum eius!</p>
        </div>
      </div>
</section>
@endsection