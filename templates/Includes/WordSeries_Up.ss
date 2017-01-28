<li>
    <% include WordSeries_Word %>
    
    <% if Derivations.Count %>
        <ul>
            <% loop Derivations %>
                $Me.WordUp                
            <% end_loop %>
        </ul>
    <% end_if %>
</li>
