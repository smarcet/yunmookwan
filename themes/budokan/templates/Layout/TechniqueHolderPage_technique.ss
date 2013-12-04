<% with Result %>
       <div class="technique-holder">
           <div class="row">
               <div id="sidebar" class="col-md-4">
                   <% if FirstPic %>
                   <div id="photos" class="photo-grid">
                       <% loop FirstPic %>
                       $Pic
                       <% end_loop %>
                   </div>
                   <% end_if %>
               </div>
               <div class="col-md-8">
                   <h1>$Name</h1>
                   <h3>$SubName</h3>
                   <p>$Description</p>
               </div>
           </div>
           <% if FirstVideo %>
           <div id="videos">
               <div class="row">
                   <div class="col-md-12">
                       <% loop FirstVideo %>
                       <% if First %>
                       <div class='row'>
                           <% end_if %>
                           <% if MultipleOf(3) %>
                       </div><div class='row'>
                       <% end_if %>
                       <div class="col-md-6 col-md-offset-3">
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