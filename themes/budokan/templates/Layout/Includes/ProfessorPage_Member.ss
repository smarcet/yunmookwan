<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span3">
                $ProfilePhoto
            </div>
            <div class="span9">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span12">
                                <h3> $FullName - $Graduation Dan ($CurrentRole)</h3>
                            </div>
                        </div>
                        <%if $BioInfo %>
                        <div class="row-fluid">
                                <div class="span12">
                                    $BioInfo
                                </div>
                            </div>
                        <% end_if %>
                        <div class="row-fluid">
                            <% if FBUrl %>
                            <div class="span2 social">
                                <a href='{$FBUrl}' title="Facebook"><img src='{$ThemeDir}/img/facebook-button.jpeg' class='facebook-button' /></a>
                            </div>
                            <% end_if %>
                            <% if Email %>
                            <div class="span2 social">
                                <a href='mailto:{$Email}' title="Email"><img src='{$ThemeDir}/img/email-icon.jpg' class='email-button' /></a>
                            </div>
                            <% end_if %>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <% if $GroupedTrainingClasses %>
        <div class="row-fluid">
            <div class="span12">
                <h4>Horarios</h4>
            </div>
        </div>
        <div class="row-fluid schedule">
            <div class="span12">
                <% loop $GroupedTrainingClasses.GroupedBy(WhereID) %>
                <div class="row-fluid">
                    <div class="span7" id="place-{$Top.ID}-{$WhereID}"></div>
                    <script type="text/javascript">
                        var map_url = "https://maps.google.com/maps?q="+places[$WhereID].map+"&hl=en&ie=UTF8&oq="+places[$WhereID].map+"&t=m&z=16&output=embed";
                        var content = '<a href=\"#\" map=\"'+map_url+'\" title=\"'+places[$WhereID].title+'\" class=\"popup-gmaps\"><b>'+places[$WhereID].name +' - '+ places[$WhereID].address + '('+places[$WhereID].city+')'+'</b></a>';
                        $('#place-{$Top.ID}-{$WhereID}').html(content);
                    </script>
                    <div class="span5">
                        <div class="row-fluid">
                            <div class="span12">
                            <% loop $Children.Sort(Day) %>
                                <div class="row-fluid">
                                    <div class="span12"><b>$Activity.Name</b> -  $When.Name
                                        <% if $Audience!='Adult' %>
                                            <b>($Audiencei18n)</b>
                                        <% end_if %>
                                    </div>
                                </div>
                            <% end_loop %>
                            </div>
                        </div>
                    </div>
                </div>
                <% end_loop %>
            </div>
        </div>
        <% end_if %>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        &nbsp;
    </div>
</div>