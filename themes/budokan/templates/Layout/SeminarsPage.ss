<% if Seminars %>
   <div>
   <ul class="seminar-list">
   <% loop Seminars %>
       <li>
       <div class="seminar">
           <div class="title">
                <a href="{$Top.Link}seminar/{$ID}">$Title</a>
           </div>
           <div class="place">
                <a href="#" map='https://maps.google.com/maps?q={$Where.GoogleMapQuery}&hl=en&ie=UTF8&oq={$Where.GoogleMapQuery}&t=m&z=16&output=embed' title='{$Where.Name} - {$Where.FullAddress}' class="popup-gmaps"><b>$Where.Name</b> - $Where.FullAddress</a>
           </div>
           <div class="seminar-date">
               $WhenFull
           </div>
           <div class="text" title="{$RawText}">
               $ShortText
           </div>
           <% if $Flier %>
           <div class="flier">
               $Flier
           </div>
           <% end_if %>
       </div>
       </li>
   <% end_loop %>
   </ul>
   </div>
<% end_if %>
