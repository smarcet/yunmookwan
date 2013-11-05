$Content
<% if Classes %>
        <ul>
        <% loop Classes %>
            <li>
                <% if $Void %>
                    <span style="text-decoration: line-through;">
                    <a href="{$Top.Link}instance/{$ID}">
                        <b>$Date</b> -  $When.StartTime Hs - $Where.Address ($Where.Name)
                    </a>
                    </span>
                <% else %>
                    <b>$Date</b> -  $When.StartTime Hs - $Where.Address ($Where.Name)
                <% end_if %>
            </li>
        <% end_loop %>
        </ul>
<% end_if %>