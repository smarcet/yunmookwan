<% if Techniques %>
<div class="technique-panel">
    <div class="technique-panel-heading"><h3>Cuadro de Tecnicas</h3></div>
    <ul class="techniques-list">
        <% loop Techniques %>
            <li>
            <% include TechniqueHolderPage_Group %>
            </li>
        <% end_loop %>
    </ul>
</div>
<% end_if %>
