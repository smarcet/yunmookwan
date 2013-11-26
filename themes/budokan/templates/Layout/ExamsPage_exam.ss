<% with Result %>
<h1>$Title ($Date , $From Hs. / $To Hs.)</h1>
<div class="box effect2">
    <p>$Briefing</p>
</div>
<% if Photos %>
<div id="photos" class="photo-grid">
    <% loop Photos %>
    $Pic
    <% end_loop %>
</div>
<% end_if %>
<% if $ShowFBComments %>
<div class="fb-comments" data-href="{$Top.SiteConfig.GlobalDomain}/{$Top.URLSegment}/instance/{$ID}" data-width="600">
</div>
<% end_if %>
<% if Videos %>
<div id="videos">
    <div class="row-fluid">
        <div class="span12">
            <% loop $Videos %>
            <% if First %>
            <div class='row-fluid'>
                <% end_if %>
                <% if MultipleOf(3) %>
            </div><div class='row-fluid'>
            <% end_if %>
            <div class="span6">
                <div class="video">
                    <a href="https://youtube.googleapis.com/v/{$VideoId}" rel="shadowbox">
                        $Preview
                        <span class="caption">$ShortTitle</span>
                    </a>
                </div>
            </div>
            <% if Last %>
        </div>
            <% end_if %>
            <% end_loop %>
        </div>
    </div>
</div>
<% end_if %>
<% end_with %>