<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <article>
                <h1>$Title</h1>
                <div class="content">$Content</div>
            </article>
            <% if Images %>
            <div id="photos" class="photo-grid">
                <% loop Images %>
                $Pic
                <% end_loop %>
            </div>
            <% end_if %>
            <% if $ShowFBComments %>
                <div class="fb-comments" data-href="{$Top.SiteConfig.GlobalDomain}/{$Top.URLSegment}" data-width="600"></div>
            <% end_if %>
        </div>
    </div>
</div>
