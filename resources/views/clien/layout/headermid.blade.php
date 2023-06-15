<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>

            <a href="{{ route('pages.homepage') }}" class="logo">
                <img src="{{asset("assets/images/logo.png")}}" alt="Molla Logo" width="105" height="25">
            </a>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                <form action="#" method="get">
                    <div class="header-search-wrapper search-wrapper-wide">
                        <label style="height: 30px" for="q" class="sr-only">Search</label>
                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        <input type="search" class="form-control" name="q" id="q"
                            placeholder="Search product ..." required>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div>

        <div class="header-right">



            <div class="wishlist">
                <a href="{{route('pages.cart')}}" title="Wishlist">
                    <div class="icon">
                        <i class="icon-shopping-cart"></i>
                        <span class="wishlist-count badge">3</span>
                    </div>
                    <p>Cart</p>
                </a>
            </div>
            <div class="dropdown cart-dropdown">

            </div><!-- End .cart-dropdown -->
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->
