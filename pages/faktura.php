<?php

// ziskaj udaje o objednavke cislo $idFaktury

$objednavka = new Classes\Objednavky;
$faktura = $objednavka->getObjednavkaById($idFaktury);
$kosik = unserialize($faktura['kosik']);

$html = 'nejaky text';
$html = $html . 'pridany text';
echo $html; // vypise 'nejaky textpridanytext'


// $mpdf = new \Mpdf\Mpdf();
$mpdf = new mPDF();
$html = '<style>h1{color: red;} .table{background-color: silver;}</style>';
$html .= '<h1>Faktura id: %d</h1>';
$html .= '<p>Datum: ' . date('d.m.Y', $faktura['datum']);
$html .= '</p>';
$html .= 'Zoznam nakupeneho tovaru:';
$html .= '<table class="table">
  			<tr><th>Nazov</th><th>Cena</th><th>Mnozstvo</th>';
  	$suma = 0;
	foreach ($kosik as $kniha) {
  		$suma = $suma + $kniha['item']->getPrice() * $kniha['mnozstvo'];
  		$html .= '<tr>
  				  <td>' . $kniha['item']->getTitle() . '</td>
  				  <td>' . $kniha['item']->getPrice() . '</td>
  				  <td>' . $kniha['mnozstvo'] . '</td>
  				</tr>';
	}
$html .= '</table>';

$mpdf->WriteHTML(sprintf($html, $idFaktury));
$mpdf->Output('faktura.pdf', 'D');