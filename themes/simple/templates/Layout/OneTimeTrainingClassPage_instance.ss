<% control Result %>
    Clase del <b>$Date</b> -  $When.StartTime Hs - <a href="#" map='https://maps.google.com/maps?q={$Where.GoogleMapQuery}&hl=en&ie=UTF8&oq={$Where.GoogleMapQuery}&t=m&z=16&output=embed' title='{$Where.Name} - {$Where.FullAddress}' class="popup-gmaps"><b>$Where.Name</b> - $Where.FullAddress</a>
    <% if Photos %>
        <div class="photo-grid">
        <% loop Photos %>
            $Pic
        <% end_loop %>
        </div>
    <% end_if %>
    <% if $ShowFBComments %>
    <div class="fb-comments" data-href="{$GlobalDomain}/{$Top.URLSegment}/instance/{$ID}" data-width="600">
    <% end_if %>
<% end_control %>

</div>