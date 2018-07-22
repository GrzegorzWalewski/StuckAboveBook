<div id="navigation">
    
    <a href="#offcanvas-slide" class="uk-hidden@m" id="sidebar_button" uk-toggle>
        <img src="<?php echo base_url() ?>/assets/img/button.png">
    </a>

    <div id="offcanvas-slide" uk-offcanvas>
        <div class="uk-offcanvas-bar">
            <a class="uk-navbar-item uk-logo orange" href="/stuckAboveBook/home/"><img class="logo" src="<?php echo base_url() ?>assets/img/icon.png"></a>
            <ul class="uk-nav  uk-nav-default uk-nav-parent-icon orange" uk-nav>
                <?php if($is_logged_in)
                    {?>
                        <li>
                            <a href="/stuckAboveBook/home/addProblem" class="orange">
                            Dodaj problem
                            </a>
                        </li>
                <li class="uk-parent">
                    <a class="orange" href="#"><?php echo $username?></a>
                    <ul class="uk-nav-sub">
                        <li class=""><a href="#">Twój profil</a></li>
                        <li class=""><a href="/stuckAboveBook/user/yourproblems">Twoje pytania</a></li>
                        <li class=""><a href="/stuckAboveBook/examples/logout">Wyloguj</a></li>
                    </ul>
                </li>
                    <?php
                    }
                    else
                    {?>
                        <li>
                        <a href="/stuckAboveBook/examples/login_form" class="orange">
                        Zaloguj się
                    </a>
                    </li>
                    <?php }?>
                    <li>
                <a class=" orange" href="/stuckAboveBook/home/search" uk-search-icon href="#">Wyszukaj </a>
            </li>
            </ul>
            <button class="uk-offcanvas-close uk-close uk-icon" type="button" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>

        </div>
    </div>
    <nav class="uk-navbar-container no-bottom-margin uk-visible@m" uk-navbar>
        <div class="uk-navbar-left">

            <a class="uk-navbar-item uk-logo orange" href="/stuckAboveBook/home/"><img class="logo" src="<?php echo base_url() ?>assets/img/icon.png"></a>
            <ul class="uk-navbar-nav">
                    <?php if($is_logged_in)
                    {?>
                        <li>
                            <a href="/stuckAboveBook/home/addProblem" class="orange">
                            Dodaj problem
                            </a>
                        </li>
                <li>
                        <a class="orange" href="#"><?php echo $username?></a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class=""><a href="#">Twój profil</a></li>
                                    <li class=""><a href="/stuckAboveBook/user/yourproblems">Twoje pytania</a></li>
                                    <li class=""><a href="/stuckAboveBook/examples/logout">Wyloguj</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php
                    }
                    else
                    {?>
                        <li>
                        <a href="/stuckAboveBook/examples/login_form" class="orange">
                        Zaloguj się
                    </a>
                    </li>
                    <?php }?>
                    
                
            </ul>
        </div>
        <div class="uk-navbar-right">
            

             <div>
                <a class="uk-navbar-toggle orange" href="/stuckAboveBook/home/search" uk-search-icon href="#"></a>
            </div>
        </div>
    </nav>
</div>