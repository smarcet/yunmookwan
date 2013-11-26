<% if Exams %>
        <ul class="exam-list unstyled">
        <% loop Exams %>
            <li><a title="{$Title}" href="{$Top.Link}exam/{$ID}">$Title ($Date , $From Hs. / $To Hs.)</a></li>
        <% end_loop %>
        </ul>
<% end_if %>