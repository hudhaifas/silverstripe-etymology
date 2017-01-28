<a href="$ObjectLink" title="$Word">$Word <% if $Spelling %><span>($Spelling)</span><% end_if %></a>

<br />

<a title="<%t Etymologist.LANGUAGES 'Languages' %>">
    <% loop Languages %>
        <span>$Title</span> <% if not Last %>, <% end_if %>
    <% end_loop %>
</a>
