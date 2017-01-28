<li>
    <% include WordSeries_Word %>

    <% if Origins.Count %>
        <ul>
            <% loop Origins %>
                $Me.WordDown
            <% end_loop %>
        </ul>
    <% end_if %>
</li>
