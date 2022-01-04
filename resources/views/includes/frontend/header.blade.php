<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li class="active"><a href="{{ route('home.index') }}">Home</a></li>
                        <li><a href="shop.html">Shop page</a></li>
                        <li><a href="">Single product</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="{{ route('contact.show') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./"><img src="img/logo.png"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{ route('cart.show') }}">Cart - <span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i>
                        <span class="product-count">
                            @if (Session::get('cart'))
                            {{ count(Session::get('cart')) }}
                            @else
                            0
                            @endif
                        </span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    @foreach($categories as $value)
                    <li class="active"><a href="{{ route('home.index') }}">{{ $value->name }}</a></li>
                    @if($subCategories->count() > 0)
                    <ul>
                        @foreach ($subCategories as $subMenu)
                        @if ($value->id == $subMenu->parent_id)
                        <li><a href="{{ route('home.category', $subMenu->slug) }}" id="list-submenu">{{ $subMenu->name }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                    @endforeach


                </ul>
            </div> -->
            <ul class="nav navbar-nav">
                @foreach($categories as $value)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">{{ $value->name }}</span> <span class="caret"></span></a>
                    @if($subCategories->count() > 0 )
                    <ul class="dropdown-menu">
                        @foreach($subCategories as $submenu)
                        @if($value->id == $submenu->parent_id)
                        <li><a href="#">{{ $submenu->name }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
               

                <li class="dropdown">
                    @if(Auth::guard('customer')->user())
                    <img class="user-image" style="height: 20px;margin: 27px;" src="{{ Auth::guard('customer')->user()->avatar }}" alt="">
                    <a href="#">{{ Auth::guard('customer')->user()->name }}</a> 
                    <a href="#" id="profile" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="icon_clock_alt"></i> Logout</a>
                    <form id="frm-logout" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @else
                    <a href="{{ route('login.provider', 'google') }}">{{ __('G-SUITE LOGIN') }}</a>
                    @endif
                </li>
             
            </ul>
        </div>
    </div>
</div> <!-- End mainmenu area -->