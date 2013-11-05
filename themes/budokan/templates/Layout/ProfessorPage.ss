<div class="row-fluid container-fluid">
    <div class="span12">
        <% if Professors %>
            <% loop Professors %>
                <% include ProfessorPage_Member %>
            <% end_loop %>
        <% end_if %>
    </div>
</div>