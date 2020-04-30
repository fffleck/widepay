<div class="vd_navbar vd_nav-width vd_navbar-no-tab vd_navbar-right  vd_bg-grey left-menubar">
    <div class="navbar-menu clearfix">
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu">
                <i class="fa fa-sort-amount-asc"></i>
            </span>
        </div>
        <h3 class="menu-title hide-nav-medium hide-nav-small">UI Features</h3>
        <div class="vd_menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}" title="Home">
                        <span class="menu-icon"><i class="fa fa-home"></i></span>
                        <span class="menu-text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" title="Dashboard">
                        <span class="menu-icon"><i class="fa fa-dashboard"></i></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('profile.home') }}" title="Profile">
                        <span class="menu-icon"><i class="fa fa-user"></i></span>
                        <span class="menu-text">Profile</span>
                    </a>
                <!-- <div class="child-menu"  data-action="click-target">
                        <ul>
                            <li>
                                <a href="{{ route('profile.home') }}">
                                    <span class="menu-text">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>-->

                <li>
                    <a href="javascript:void(0);" data-action="click-trigger" title="Account">
                        <span class="menu-icon"><i class="fa fa-database"></i></span>
                        <span class="menu-text">Account</span>
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu"  data-action="click-target">
                        <ul>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="{{ route('accounts.list') }}">My Account</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="{{ route('accounts.list') }}"> Wallets</a></li>
                                    <li><a tabindex="-1" href="{{ route('accounts.type', ['ALL']) }}">Statements</a></li>
                                    <li><a tabindex="-1" href="#"> Library</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </li>

                <li>
                    <a href="javascript:void(0);" data-action="click-trigger" title="Network">
                        <span class="menu-icon"><i class="fa fa-sitemap"></i></span>
                        <span class="menu-text">Network</span>
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu"  data-action="click-target">
                        <ul>
                            <li>
                                <a href="{{ route('network.list') }}">
                                    <span class="menu-text">My Network</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="javascript:void(0);" data-action="click-trigger" title="Orders">
                        <span class="menu-icon"><i class="fa fa-shopping-cart"></i></span>
                        <span class="menu-text">Orders</span>
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu"  data-action="click-target">
                        <ul>
                            {{--</li>--}}
                            <li>
                                <a href="{{ route('orders.products') }}">
                                    <span class="menu-text">Products</span>
                                </a>
                            </li>

                            {{--<li>--}}
                                {{--<a href="front-2.html">--}}
                                    {{--<span class="menu-text">Pay Order</span>--}}
                                {{--</a>--}}
                            <li>
                                <a href="{{ route('orders.list') }}">
                                    <span class="menu-text">My Orders</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('machine.list') }}" title="Machine List">
                        <span class="menu-icon"><i class="fa fa-cubes"></i></span>
                        <span class="menu-text">Machine List</span>
                    </a>
                </li>
                <li>
                    <a href="https://awscapitalgroup.zendesk.com/hc/en-gb" target="_blank" title="Support Center">
                        <span class="menu-icon"><i class="fa fa-comment"></i></span>
                        <span class="menu-text">Support</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-action="click-trigger" title="Documents">
                        <span class="menu-icon"><i class="fa fa-download"></i></span>
                        <span class="menu-text">Documents</span>
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu"  data-action="click-target">
                        <ul>
                            <li>
                                <a href="v1/files/Affliate_Program_Agreement_AWSCapital_2019.pdf" download>
                                    <span class="menu-text">Affliate Program</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>




            </ul>
            <!-- Head menu search form ends -->         </div>
    </div>
    <div class="navbar-spacing clearfix">
    </div>
</div>
