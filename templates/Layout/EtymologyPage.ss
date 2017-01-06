<article class="container" style="min-height: 35vh;">

    <div class="row">
        <% if $Results %>
            <div class="col-md-4" style="padding-bottom: 20px;">
                $SearchWord
                <sub><%t Genealogist.SEARCH_RESULTS_COUNT '{value} results' value=$Results.Count%></sub>
            </div>
        <% else %>
            <div class="col-md-4 col-md-offset-4" style="padding-bottom: 20px;">
                $SearchWord
            </div>
        <% end_if %>
    </div>

    <% include EtymologyPage_Results %>

</article>
