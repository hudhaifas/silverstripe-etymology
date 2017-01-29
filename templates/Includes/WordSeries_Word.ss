<a title="<% if $Language %><%t Etymologist.LANGUAGE 'Language' %> $Language.Name<% end_if %>">
    <span>$Language.Name</span>
</a>
<br />

<a href="$ObjectLink" title="<% if $Spelling %><%t Etymologist.SPELLING 'Spelling' %>: $Spelling<% end_if %>">$Word <% if Classification %><span title="<%t Etymologist.CLASSIFICATION 'Classification' %>: $Classification">($Classification)</span><% end_if %></a>