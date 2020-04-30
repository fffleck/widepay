<div class="col-sm-12 col-xs-12">
    <div class="vd_mega-menu-wrapper">
        <div class="vd_mega-menu pull-right">
            <ul class="mega-ul">
                <li id="top-menu-profile" class="profile mega-li">
                    <a href="#" class="mega-link" data-action="click-trigger">
                        <span class="mega-image">
                            {{--<img src="/v1/img/avatar/avatar.jpg" alt="example image" />--}}
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="mega-name">{{ Auth::user()->name }}<i class="fa fa-caret-down fa-fw"></i>
                        </span>
                    </a>
                    <div class="vd_mega-menu-content width-xs-2 left-xs left-sm" data-action="click-target">
                        <div class="child-menu">
                            <div class="content-list content-menu">
                                <ul class="list-wrapper pd-lr-10">
                                    <li> <a href="{{ route('profile.home') }}">
                                            <div class="menu-icon"><i class=" fa fa-user"></i></div>
                                            <div class="menu-text">Edit Profile</div>
                                        </a> </li>
                                    <li class="line"></li>
                                    <li> <a href="#">
                                            <div class="menu-icon"><i class=" fa fa-cogs"></i></div>
                                            <div class="menu-text">Settings</div>
                                        </a> </li>
                                    <li>
                                        <a href="{{ route('two_factor_edit') }}">
                                            <div class="menu-icon">
                                                <i class="fa fa-shield"></i>
                                            </div>
                                            <div class="menu-text">Two-factor</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pin') }}">
                                            <div class="menu-icon">
                                                <i class="fa fa-key"></i>
                                            </div>
                                            <span class="menu-text">PIN</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <div class="menu-icon"><i class="fa fa-sign-out"></i></div>
                                            <div class="menu-text">Log Out</div>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    <li class="line"></li>
                                    {{--<li> <a href="#"> <div class="menu-icon"><i class=" fa fa-question-circle"></i></div> <div class="menu-text">Help</div> </a> </li>--}}
                                    {{--<li> <a href="#"> <div class="menu-icon"><i class=" glyphicon glyphicon-bullhorn"></i></div> <div class="menu-text">Report a Problem</div> </a> </li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <li id="top-menu-settings" class="one-big-icon hidden-xs hidden-sm mega-li"
                    data-intro="<strong>Toggle Right Navigation </strong><br/>On smaller device such as tablet or phone you can click on the middle content to close the right or left navigation."
                    data-step=2 data-position="left">
                    <a href="#" class="mega-link" data-action="toggle-navbar-right">
                        {{--<span class="mega-icon">--}}
                        {{--<i class="fa fa-comments"></i>--}}
                        {{--</span>--}}
                        <!--            <span  class="mega-image">
                                        <img src="v1/img/avatar/avatar.jpg" alt="example image" />
                                    </span> -->
                        {{--<span class="badge vd_bg-red">8</span>--}}
                    </a>

                </li>
            </ul>
            <!-- Head menu search form ends -->
        </div>
    </div>
</div>
