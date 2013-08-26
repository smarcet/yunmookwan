<div class="row-fluid container-fluid">
    <div class="span12">
        <% if Professors %>
            <script type="text/javascript">
                var places = {};
                $.ajax({
                    dataType: "json",
                    type: "GET",
                    url: 'professor/placedata/{$WhereID}',
                    async:false,
                    success: function(data){
                        places = data;
                    }
                });

                $(document).ready(function() {

                });
            </script>
            <% loop Professors %>
                <% include ProfessorPage_Member%>
            <% end_loop %>
        <% end_if %>
    </div>
</div>