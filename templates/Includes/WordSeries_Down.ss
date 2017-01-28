<li>
    <a href="$ObjectLink" title="$Title">
        $Word <% if $Spelling %><sub>($Spelling)</sub><% end_if %>
        <br />
        <% loop Languages %>
            <sub>$Title</sub> <% if not Last %>, <% end_if %>
        <% end_loop %>
    </a>
    <% if Origins.Count %>
        <ul>
            <% loop Origins %>
                $Me.WordDown
            <% end_loop %>
        </ul>
    <% end_if %>
</li>
