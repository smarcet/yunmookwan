<header class="header" role="banner">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <% loop $Menu(1) %>
                        <% if $LinkingMode=="current" %>
                            <li class="active">
                        <% else %>
                            <li class="">
                        <% end_if %>
                            <a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
                        </li>
                        <% end_loop %>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="header" class="container jumbotron">
        <div class="row">
            <div class="span2 logo-container">
                <h1 id="logo">
                    <a href="/">Budokan</a>
                </h1>
            </div>
            <div class="span10">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <div class="span8"><a href="$BaseHref" class="brand" rel="home">
                                        <h1>$SiteConfig.Title</h1> <% if $SiteConfig.Tagline %>
                                        <p>$SiteConfig.Tagline</p> <% end_if %>
                                    </a></div>
                                    <div class="span4">
                                        <div class="fb-like" data-href="{$SiteConfig.GlobalDomain}" data-width="100"
                                             data-layout="button_count" data-show-faces="true" data-send="true"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <% if $SearchForm %>
                        <div class="row-fluid">
                            <div class="span12">
                                <span class="search-dropdown-icon">L</span>

                                <div class="search-bar">$SearchForm</div>
                            </div>
                        </div>
                        <% end_if %>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <div class="span9">&nbsp;</div>
                                    <div class="span3">
                                        <div class="social-links">
                                            <a href="https://twitter.com/intent/tweet?hashtags=judo,budokan,kohatsu&text=%23Judo+Pagina+Oficial+Budokan&url={$SiteConfig.GlobalDomain}"
                                               target="_blank">
                                                <img style="width: 40px;height: 40px" src="/{$ThemeDir}/images/icon-twitter.png"
                                                     width="40" height="40" alt="twitter">
                                            </a>
                                            <a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]={$SiteConfig.GlobalDomain}&p[images][0]={$SiteConfig.GlobalDomain}/{$ThemeDir}/images/logo_large.png&p[title]=Pagina+Oficial+Budokan+Judo"
                                               target="_blank">
                                                <img style="width: 40px;height: 40px"
                                                     src="/{$ThemeDir}/images/icon-facebook.png" width="40" height="40"
                                                     alt="facebook">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
