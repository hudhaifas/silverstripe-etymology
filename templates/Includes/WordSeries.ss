<ul id="word-origins-{$Dir}" style="display:noe">
    <% if $Dir == 'Origins' %>
        $WordDown            
    <% else_if $Dir == 'Derivations' %>
        $WordUp                
    <% end_if %>
</ul>

<div id="origins-tree-{$Dir}"></div>

<script>
    $(document).ready(function () {
        $('#word-origins-{$Dir}').jOrgChart({
            chartElement: '#origins-tree-{$Dir}',
//            direction: 'r2l',
            dragScroller: false,
            exportImage: false,
            fullscreen: false,
            zoom: false,
        });
    });
</script>
