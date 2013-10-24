<!DOCTYPE html>
<!--
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Simple. by Sara (saratusar.com, @saratusar) for Innovatif - an awesome Slovenia-based digital agency (innovatif.com/en)
Change it, enhance it and most importantly enjoy it!
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
-->

<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="google-site-verification" content="{$SiteConfig.GoogleVerificationCode}" />
    <meta property="og:image" content="{$SiteConfig.GlobalDomain}/{$ThemeDir}/images/logo.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="224" />
    <meta property="og:image:height" content="272" />
    <meta property="og:title" content="{$Title}" />
    <meta property="og:url" content="{$SiteConfig.CurrentUrl}" />
    <meta property="og:description" content="{$Title} &raquo; {$SiteConfig.Title}" />
    <meta property="fb:admins" content="{$SiteConfig.FacebookUserId}"/>
    <meta property="fb:app_id" content="{$SiteConfig.FacebookAppId}"/>
    <meta property="og:type" content="website" />
	$MetaTags(false)
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<% require themedCSS('reset') %>
    <% require themedCSS('bootstrap.min') %>
	<% require themedCSS('typography') %>
	<% require themedCSS('form') %>
	<% require themedCSS('layout') %>
    <% require themedCSS('magnific-popup') %>
    <link rel="stylesheet" href="/$ThemeDir/javascript/shadowbox/shadowbox.css" type="text/css" media="screen, projection">
    <!-- Magnific Popup core CSS file -->
    <link rel="shortcut icon" href="$ThemeDir/images/logo.ico" />
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Magnific Popup core JS file -->
    <script type="text/javascript" src="/$ThemeDir/javascript/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="/{$ThemeDir}/javascript/shadowbox/shadowbox.js"></script>
    <script type="text/javascript">
	   var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '{$SiteConfig.GoogleAnalitycsAccount}']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>

    <script type="text/javascript">

        // Used to record outbound links before the browser resets to the new site

        function recordOutboundLink(link, category, action,opt_label) {
            try {
                _gaq.push(['._trackEvent', category , action,opt_label ]);
                setTimeout('document.location = "' + link.href + '"', 100)
            }catch(err){}
        }

    </script>
</head>
<body class="$ClassName<% if not $Menu(2) %> no-sidebar<% end_if %>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId={$SiteConfig.FacebookAppId}";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<% include Header %>
<div class="main" role="main">
	<div class="inner typography">
		$Layout
	</div>
</div>

<% include Footer %>

<%-- Please move: Theme javascript (below) should be moved to mysite/code/page.php  --%>
<script  type="text/javascript" src="/{$ThemeDir}/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="/{$ThemeDir}/javascript/script.js"></script>
<script type="text/javascript" src="/{$ThemeDir}/javascript/image.gallery.js"></script>
<script type="text/javascript">
    Shadowbox.init();
    $(document).ready(function() {
        $('.popup-gmaps').live('click',function(e){
            e.preventDefault();
            e.stopPropagation();
            var url = $(this).attr('map');
            var title = $(this).attr('title');
            Shadowbox.open({
                content:    url,
                player:     'iframe',
                title:      title
            });
            return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function($) {
        $(".outbound-link").live("click",function(event){
            var href = $(this).attr("href");
            var text = $(this).text();
            recordOutboundLink(this,'Outbound Links',href,text);
            event.preventDefault();
            event.stopPropagation()
            return false;
        });
    });
</script>


</body>
</html>
