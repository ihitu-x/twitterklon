<h1>Popis Postova!</h1>

{% for post in postovi %}
  <div class="row">
    <div class="col-md-6">
      {{post.tekst}} {{ link_to('post/delete/' ~ post.id, 'Obrisi')}}
    </div>
  </div>
{% endfor %}

<p>
  {{ link_to('post/add/', 'Dodaj Post')}}
</p>
