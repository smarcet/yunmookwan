<header class="header" role="banner">
	<div id="header" class="container-fluid inner">
		<div class="row-fluid">
			<div class="span2">
				<img src="{$ThemeDir}/images/logo.png" class="logo" />
			</div>
			<div class="span10 unit size4of4 lastUnit">
				<a href="$BaseHref" class="brand" rel="home">
					<h1>$SiteConfig.Title</h1> <% if $SiteConfig.Tagline %>
					<p>$SiteConfig.Tagline</p> <% end_if %>
				</a> <% if $SearchForm %> <span class="search-dropdown-icon">L</span>
				<div class="search-bar">$SearchForm</div>
				<% end_if %> <% include Navigation %>
                <div class="fb-like" data-href="{$BaseHref}" data-width="100" data-layout="button_count" data-show-faces="true" data-send="false"></div>
                <div class="social-links">
                    <a href="https://twitter.com/intent/tweet?hashtags=namsungchoi,yunmookwan,taekwondo&text=%23namsungchoi+Pagina+Oficial+de+Yun+Moo+Kwan&url={$BaseHref}" target="_blank">
                        <img src="/{$ThemeDir}/images/icon-twitter.png" width="40" height="40" alt="twitter">
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]={$BaseHref}&p[images][0]={$BaseHref}{$ThemeDir}/images/logo.png&p[title]=Pagina+Oficial+de+Yun+Moo+Kwan" target="_blank">
                        <img src="/{$ThemeDir}/images/icon-facebook.png" width="40" height="40" alt="facebook">
                    </a>
                </div>
			</div>
		</div>
	</div>
</header>
