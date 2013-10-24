<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
    <article>
        <h1>$Title</h1>
        <div class="content">$Content</div>
    </article>
    <% if Images %>
    <% if SortedVideos %>
    <div id="videos">
        <h3>Videos</h3>
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <% loop $SortedVideos %>
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