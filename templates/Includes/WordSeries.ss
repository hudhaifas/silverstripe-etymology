<ul id="word-origins-{$Dir}" style="display:noe">
    <% if $Dir == 'origins' %>
        $WordDown            
    <% else_if $Dir == 'derivations' %>
        $WordUp                
    <% end_if %>
</ul>

<div id="origins-tree-{$Dir}" class="{$Dir}"></div>

<script>
    $(document).ready(function () {
        $('#word-origins-{$Dir}').jOrgChart({
            chartElement: '#origins-tree-{$Dir}',
//            direction: 'r2l',
            dragScroller: false,
            exportImage: false,
            collapse: false,
            fullscreen: false,
            zoom: false,
        });
    });
</script>
