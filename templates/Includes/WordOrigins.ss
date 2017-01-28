<ul id="word-origins" style="display:noe">
    $Me
</ul>

<div id="origins-tree"></div>

<script>
    $(document).ready(function () {
        $('#word-origins').jOrgChart({
            chartElement: '#origins-tree',
//            direction: 'r2l',
            dragScroller: false,
            exportImage: false,
            fullscreen: false,
            zoom: false,
        });
    });
</script>
