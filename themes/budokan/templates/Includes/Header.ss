<header class="header" role="banner">
    <!-- Static navbar -->
    <div class="navbar navbar-default  navbar-fixed-top bs-docs-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
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
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <div id="content" class="bs-header">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                                <h1 id="logo">
                                    <a href="/">Budokan</a>
                                </h1>
                            </div>
                <div class="col-md-10">
                   <div class="row">
                        <div class="col-md-8">
                            <a href="$BaseHref" class="brand" rel="home">
                                <h1>$SiteConfig.Title</h1> <% if $SiteConfig.Tagline %>
                                <p>$SiteConfig.Tagline</p> <% end_if %>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12"><div class="fb-like" data-href="{$SiteConfig.GlobalDomain}" data-width="100"
                                                           data-layout="button_count" data-show-faces="true" data-send="true"></div></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">&nbsp;</div>
                                <div class="col-md-6">
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
</header>
