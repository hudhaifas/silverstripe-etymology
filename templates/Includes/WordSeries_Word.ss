<a title="<% if Dialect %><%t Etymology.DIALECT 'Dialect' %> $Dialect.Name<% end_if %>">
    <span>$Dialect.Name</span>
</a>
<br />

<a href="$ObjectLink" title="<% if $Spelling %><%t Etymology.SPELLING 'Spelling' %>: $Spelling<% end_if %>">$Word <% if Classification %><span title="<%t Etymology.CLASSIFICATION 'Classification' %>: $Classification">($Classification)</span><% end_if %></a>