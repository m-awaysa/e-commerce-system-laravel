<li class="nav-item  align-items-center d-flex justify-content-center me-3">
    <a href="{{route('cart')}}" class="nav-link text-light  ">
      
        <i class="fa-solid fa-cart-shopping text-light mt-lg-3 d-none d-lg-inline"></i>
        <span class=" d-lg-none">cart</span>
        @auth
            <span class="badge badge-danger text-danger badge-counter cart-count ">
             
                +{{$cartCounter}}
              
            </span>
            @endauth
  
    </a>
</li>