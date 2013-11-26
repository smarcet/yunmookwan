$Name - $SubName
<% if ChildGroups %>
    <ul class="techniques-list">
    <% loop ChildGroups %>
        <li>
        <% include TechniqueHolderPage_Group %>
        </li>
    <% end_loop %>
    </ul>
<% end_if %>
<% if ChildTechniques %>
<ul class="techniques-list">
    <% loop ChildTechniques %>
    <li>
        <a href="$Top.Link/tecnicas/technique/{$Slug}">$Name</a>
    </li>
    <% end_loop %>
</ul>
<% end_if %>
