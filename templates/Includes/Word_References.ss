<% loop References %>
<div class="word-references">
    <p class="title"><a href="$Link" target="_blank">$Title</a> <% if $Page %><span>(<%t Etymology.PAGE 'Page' %> $Page)</span><% end_if %></p>

    <% if $Description %><p class="details">$Description</p><% end_if %>
    <% if $Details %><p class="details">$Details</p><% end_if %>
</div>
<% end_loop %>