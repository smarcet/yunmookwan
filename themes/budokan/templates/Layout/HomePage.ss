<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
            <% if DirectorProfessor %>
            <% with DirectorProfessor %>
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <div class="span6">
                            <a href='{$ProfilePhotoUrl}' rel="shadowbox">
                                $ProfilePhoto
                            </a>
                        </div>
                        <div class="span6">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <p><strong>Maestro Fundador</strong> : <span class="st"><em>Sensei</em></span>&nbsp;$FullName</p>
                </div>
            </div>
            <% end_with %>
            <% end_if %>
            <% if TechAdviserProfessor %>
            <% with TechAdviserProfessor %>
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <div class="span6">
                            <a href='{$ProfilePhotoUrl}' rel="shadowbox">
                                $ProfilePhoto
                            </a>
                        </div>
                        <div class="span6">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <p><strong>Direción Técnica</strong>: Sensei &nbsp;$FullName - $Graduation DAN</p>
                </div>
            </div>
            <% end_with %>
            <% end_if %>
        </div>
        <div class="span6">
            <div>
                <% if Headquarter %>
                <% with Headquarter %>
                <a href="#"  map='https://maps.google.com/maps?q={$GoogleMapQuery}&hl=en&ie=UTF8&oq={$GoogleMapQuery}&t=m&z=16&output=embed' title='Sede Central - {$FullAddress}' class="popup-gmaps"><strong>Sede&nbsp;Central:&nbsp;</strong>$FullAddress</a>
                <% end_with %>
                <% end_if %>
            </div>
            <% if News %>
            <div id="news" class="news-container">
                <h3>Novedades</h3>
                <dl>
                    <% loop News %>
                    <dt <% if First %>class="first"<% end_if %> ></dt>
                    <dd><a href="{$Link}" class="outbound-link">$Text<a></dd>
                    <% end_loop %>
                </dl>
            </div>
            <% end_if %>
        </div>
    </div>
</div>