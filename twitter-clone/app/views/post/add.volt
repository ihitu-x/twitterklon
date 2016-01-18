<h1>Unesi novi post!</h1>

{% if errors is defined %}
    {%for error in errors%}
      <p>{{error}}</p>
    {% endfor %}
{% endif %}

<form method="post">
<div class="form-group">
  <label for="email">Email</label>
  {{ text_field('email')}}
</div>
<div class="form-group">
  <label for="tekst">Tekst</label>
   {{text_area("tekst","aaa", "ccc" ,"cols": "50", "rows": 20) }}

    {{ submit_button('Unesi') }}
    {{ link_to('post/', 'Nazad') }}

</form>
