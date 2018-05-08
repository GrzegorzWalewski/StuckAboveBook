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
            <li>
                <a href="#" class="orange">
                    Dodaj problem
                </a>
            </li>
            <li>
                <a href="#" class="orange">
                    Zaloguj się
                </a>
            </li>
        </ul>
    </div>
    <div class="uk-navbar-right">
        

         <div>
            <a class="uk-navbar-toggle orange" uk-search-icon href="#"></a>
            <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input orange" type="search" placeholder="Wyszukaj książki..." autofocus>
                </form>
            </div>
        </div>
    </div>
</nav>