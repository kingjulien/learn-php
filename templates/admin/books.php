Zoznam knih
<form class="nova">
  <input type="text" name="title_nova" placeholder="Nazov" />
  <input type="text" name="price_nova" placeholder="Cena" />
  <input type="hidden" name="author_nova" value="1" />
  <textarea name="description_nova"></textarea>
  <input type="file" name="obrazok[]" multiple />
  <input type="button" name="vytvor" value="Vytvor" />
</form>

<form>
<table class="table" id="books">


</table>
</form>

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
            <input type="text" name="title[${kniha.id}]" value="${kniha.title}">
          </td>
          <td>
            <input type="text" name="price[${kniha.id}]" value="${kniha.price}">
          </td>
          <td>
            <input name="id" type="hidden" value="${kniha.id}">
            <input name="ulozit" data-id="${kniha.id}" type="button" value="Uloz">
          </td>
          </tr>`;
      });

      $('#books').html(html);

      $('input[name="ulozit"]').on('click', function() {
        var buttonKtorySomclickol = $(this);
        var id = buttonKtorySomclickol.data('id');
        
        var title =  $(`[name="title[${id}]"]`).val();
        var price =  $(`[name="price[${id}]"]`).val();

       $.post('http://localhost/data/books/' + id, {
          id,
          title,
          price
       }).done(function(dataKtorePrisli) {


          console.table(dataKtorePrisli);
          // dataKtorePrisli.title
       });

      });
  });

  $('input[name="vytvor"]').on('click', function() {
      var title =  $(`[name="title_nova"]`).val();
      var price =  $(`[name="price_nova"]`).val();

      $.ajax( {
        url: 'http://localhost/data/books',
        type: 'POST',
        data: new FormData( $('form.nova')[0] ),
        processData: false,
        contentType: false
      } ).done(function(dataKtorePrisli) {
        
          console.table(dataKtorePrisli);
          // dataKtorePrisli.title
       });

  });
  
});
</script>