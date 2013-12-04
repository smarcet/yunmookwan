<div class="container">
    <div class="row">
        <div class="col-md-6">
            <% if DirectorProfessor %>
            <% with DirectorProfessor %>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <a href='{$ProfilePhotoUrl}' rel="shadowbox" title="{$FullName}">
                                $ProfilePhoto(330,650)
                            </a>
                        </div>
                        <div class="col-md-6">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 professor-label">
                    <p><strong>Maestro Fundador</strong> : <span class="st"><em>O-Sensei</em></span>&nbsp;$FullName</p>
                </div>
                <div class="col-md-4"></div>
            </div>
            <% end_with %>
            <% end_if %>
            <% if TechAdviserProfessor %>
            <% with TechAdviserProfessor %>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <a href='{$ProfilePhotoUrl}' rel="shadowbox" title="{$FullName}">
                                $ProfilePhoto(330,650)
                            </a>
                        </div>
                        <div class="col-md-6">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 professor-label">
                    <p><strong>Direción Técnica</strong>: Sensei &nbsp;$FullName - $Graduation DAN</p>
                </div>
                <div class="col-md-4"></div>
            </div>
            <% end_with %>
            <% end_if %>
        </div>
        <div class="col-md-6">
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
                    <dd><a href="{$Link}" title="{$Tooltip}" class="outbound-link">$Text<a></dd>
                    <% end_loop %>
                </dl>
            </div>
            <% end_if %>
        </div>
    </div>
</div>