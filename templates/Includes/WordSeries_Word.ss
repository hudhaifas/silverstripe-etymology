<a title="<% if $Language %><%t Etymology.LANGUAGE 'Language' %> $Language.Name<% end_if %>">
    <span>$Language.Name</span>
</a>
<br />

<a href="$ObjectLink" title="<% if $Spelling %><%t Etymology.SPELLING 'Spelling' %>: $Spelling<% end_if %>">$Word <% if Classification %><span title="<%t Etymology.CLASSIFICATION 'Classification' %>: $Classification">($Classification)</span><% end_if %></a>