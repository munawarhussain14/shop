<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset("assets/img/sidebar-1.jpg")}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item @if(Route::currentRouteName()=="dashboard") active @endif">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./user.html">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./tables.html">
                    <i class="material-icons">content_paste</i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item @if(Route::currentRouteName()=="products"||Route::currentRouteName()=="product.add"||Route::currentRouteName()=="product.edit") active @endif">
                <a class="nav-link collapsed" data-toggle="collapse" href="#pagesProducts" aria-expanded="false">
                    <i class="material-icons">shopping_basket</i>
                    <p> Products
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(Route::currentRouteName()=="products"||Route::currentRouteName()=="product.add") show @endif" id="pagesProducts" style="">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url("products")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">list</i>
                                </span>
                                <span class="sidebar-normal"> All Products </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url("product/add")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">add</i>
                                </span>
                                <span class="sidebar-normal"> Add Product </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if(Route::currentRouteName()=="categories"||Route::currentRouteName()=="category.add"||Route::currentRouteName()=="category.edit") active @endif">
                <a class="nav-link collapsed" data-toggle="collapse" href="#pagesExamples" aria-expanded="false">
                    <i class="material-icons">category</i>
                    <p> Categories
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(Route::currentRouteName()=="categories"||Route::currentRouteName()=="category.add") show @endif" id="pagesExamples" style="">
                    <ul class="nav">
                        <li class="nav-item @if(Route::currentRouteName()=="categories") active @endif">
                            <a class="nav-link" href="{{url("categories")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">list</i>
                                </span>
                                <span class="sidebar-normal"> All Categories </span>
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName()=="category.add") active @endif">
                            <a class="nav-link" href="{{url("category/add")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">add</i>
                                </span>
                                <span class="sidebar-normal"> Add Category </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if(Route::currentRouteName()=="brands"||Route::currentRouteName()=="brand.add"||Route::currentRouteName()=="brand.edit") active @endif">
                <a class="nav-link collapsed" data-toggle="collapse" href="#pagesBrands" aria-expanded="false">
                    <i class="material-icons">star</i>
                    <p> Brands
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(Route::currentRouteName()=="brands"||Route::currentRouteName()=="brand.add") show @endif" id="pagesBrands" style="">
                    <ul class="nav">
                        <li class="nav-item @if(Route::currentRouteName()=="brands") active @endif">
                            <a class="nav-link" href="{{url("brands")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">list</i>
                                </span>
                                <span class="sidebar-normal"> All Brands </span>
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName()=="brand.add") active @endif">
                            <a class="nav-link" href="{{url("brand/add")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">add</i>
                                </span>
                                <span class="sidebar-normal"> Add Brand </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if(Route::currentRouteName()=="stores"||Route::currentRouteName()=="store.add"||Route::currentRouteName()=="store.edit") active @endif">
                <a class="nav-link collapsed" data-toggle="collapse" href="#pagesStore" aria-expanded="false">
                    <i class="material-icons">store_mall_directory</i>
                    <p> Store
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(Route::currentRouteName()=="stores"||Route::currentRouteName()=="store.add") show @endif" id="pagesStore" style="">
                    <ul class="nav">
                        <li class="nav-item @if(Route::currentRouteName()=="stores") active @endif">
                            <a class="nav-link" href="{{url("stores")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">list</i>
                                </span>
                                <span class="sidebar-normal"> All Stores </span>
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName()=="store.add") active @endif">
                            <a class="nav-link" href="{{url("store/add")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">add</i>
                                </span>
                                <span class="sidebar-normal"> Add Store </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if(Route::currentRouteName()=="measurements"||Route::currentRouteName()=="measurement.add"||Route::currentRouteName()=="store.edit") active @endif">
                <a class="nav-link collapsed" data-toggle="collapse" href="#pagesUnits" aria-expanded="false">
                    <i class="material-icons">design_services</i>
                    <p> Measurements
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(Route::currentRouteName()=="measurements"||Route::currentRouteName()=="measurement.add") show @endif" id="pagesUnits" style="">
                    <ul class="nav">
                        <li class="nav-item @if(Route::currentRouteName()=="measurements") active @endif">
                            <a class="nav-link" href="{{url("measurements")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">list</i>
                                </span>
                                <span class="sidebar-normal"> All Measurements </span>
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName()=="store.add") active @endif">
                            <a class="nav-link" href="{{url("measurement/add")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">add</i>
                                </span>
                                <span class="sidebar-normal"> Add Measurement</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if(Route::currentRouteName()=="currencies"||Route::currentRouteName()=="currency.add"||Route::currentRouteName()=="store.edit") active @endif">
                <a class="nav-link collapsed" data-toggle="collapse" href="#pagesCurrency" aria-expanded="false">
                    <i class="material-icons">money</i>
                    <p> Currency
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(Route::currentRouteName()=="currencies"||Route::currentRouteName()=="currency.add") show @endif" id="pagesCurrency" style="">
                    <ul class="nav">
                        <li class="nav-item @if(Route::currentRouteName()=="currencies") active @endif">
                            <a class="nav-link" href="{{url("currencies")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">list</i>
                                </span>
                                <span class="sidebar-normal"> All Currencies</span>
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName()=="currency.add") active @endif">
                            <a class="nav-link" href="{{url("currency/add")}}">
                                <span class="sidebar-mini">
                                    <i class="material-icons">add</i>
                                </span>
                                <span class="sidebar-normal"> Add Currency</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./map.html">
                    <i class="material-icons">location_ons</i>
                    <p>Maps</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
        </ul>
    </div>
</div>