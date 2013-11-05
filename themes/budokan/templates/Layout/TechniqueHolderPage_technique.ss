<% with Result %>
       <div class="technique-holder">
           <div class="row">
               <div id="sidebar" class="span4">
                   <% if FirstPic %>
                   <div id="photos" class="photo-grid">
                       <% loop FirstPic %>
                       $Pic
                       <% end_loop %>
                   </div>
                   <% end_if %>
               </div>
               <div class="8">
                   <h1>$Name</h1>
                   <h3>$SubName</h3>
                   <p>$Description</p>
               </div>
           </div>
           <% if FirstVideo %>
           <div id="videos">
               <div class="row-fluid">
                   <div class="span12">
                       <% loop FirstVideo %>
                       <% if First %>
                       <div class='row-fluid'>
                           <% end_if %>
                           <% if MultipleOf(3) %>
                       </div><div class='row-fluid'>
                       <% end_if %>
                       <div class="span6 offset3">
                           <div class="video">
                               <a href="https://youtube.googleapis.com/v/{$VideoId}" rel="shadowbox">
                                   $Preview
                                   <span class="caption">$ShortTitle</span>
                               </a>
                           </div>
                       </div>
                       <% if Last %>
                   </div>
                       <% end_if %>
                       <% end_loop %>
                   </div>
               </div>
           </div>
           <% end_if %>
       </div>
<% end_with %>