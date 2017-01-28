<li>
    <a href="$ObjectLink" title="$Title">
        $Word <% if $Spelling %><sub>($Spelling)</sub><% end_if %>
        <br />
        <% loop Languages %>
            <sub>$Title</sub> <% if not Last %>, <% end_if %>
        <% end_loop %>
    </a>
    <% if Derivations.Count %>
        <ul>
            <% loop Derivations %>
                $Me.WordUp                
            <% end_loop %>
        </ul>
    <% end_if %>
</li>
