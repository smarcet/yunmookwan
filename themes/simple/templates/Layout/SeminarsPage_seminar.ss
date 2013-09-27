<div class="seminar">

<% control Result %>
    <h1>$Title</h1>
    <div class="seminar-date">
        <b>$WhenFull</b>
    </div>
    <div class="text">
        $Text
    </div>
    <div>
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
    <% if SeminarPics %>
        <div id="photos">
        <h3>Fotos</h3>
        <hr>
        <div class="photo-grid">
            <% loop SeminarPics %>
                $Pic
            <% end_loop %>
        </div>
        </div>
    <% end_if %>
    </div>
    <% if $ShowFBComments %>
    <div class="fb-comments" data-href="{$BaseHref}{$Top.URLSegment}/seminar/{$ID}" data-width="600"></div>
     <% end_if %>
<% end_control %>
</div>