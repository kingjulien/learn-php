Zoznam knih

<table class="table" id="books">


</table>

<script type="text/javascript">
$(function() {
  $.get(
  	'http://localhost/data/books'
  	//{ name: "John", time: "2pm" }
  )
    .done(function( data ) {
      var html = '<tr><th>Nazov</th><th>Cena</th><th>Actions</th>';
      $.each(data, function(index, kniha) {
        // console.log(kniha);
        
        html += `<tr>
          <td>
            <input type="text" name="title[{$kniha.id}]" value="${kniha.title}">
          </td>
          <td>
            <input type="text" name="price" value="${kniha.price}">
          </td>
          <td>
            <input name="id" type="hidden" value="${kniha.id}">
            <input name="ulozit[${kniha.id}]" type="button" value="Uloz">
          </td>
          </tr>`;  
      });

      $('#books').html(html);
  });

  $('input[name="ulozit"]').on('click', function(e) {
  	  console.log(e);
     $.put('http://localhost/data/book', {
        // form.serialize();
     });
  });
});
</script>