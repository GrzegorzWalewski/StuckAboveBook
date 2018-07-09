<nav class="uk-navbar-container uk-margin no-bottom-margin" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo orange" href="/stuckAboveBook/home/"><img class="logo" src="<?php echo base_url() ?>assets/img/icon.png"></a>
        <ul class="uk-navbar-nav">
            <li>
                <a href="/stuckAboveBook/home/categories" class="orange">
                    Kategorie
                </a>
            </li>

            <li>
                <a href="#" class="orange">
                    Lista Książek
                </a>
            </li>
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