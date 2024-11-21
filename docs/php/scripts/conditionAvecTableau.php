<?php
// Initialisation de la variable pour les lignes vides
$lignes_vide = '';

// Tableau contenant les montants HT, les taux de TVA, et les montants TVA correspondants
$rows = [
    ['montant_ht' => $montant_ht_2, 'taux' => '2,1 %', 'montant_tva' => $montant_tva_2],
    ['montant_ht' => $montant_ht_3, 'taux' => '5,5 %', 'montant_tva' => $montant_tva_3],
    ['montant_ht' => $montant_ht_4, 'taux' => '10 %', 'montant_tva' => $montant_tva_4],
    ['montant_ht' => $montant_ht_5, 'taux' => '20 %', 'montant_tva' => $montant_tva_5],
];

// Boucle pour parcourir chaque ligne et générer le HTML
foreach ($rows as $row) {
    echo $row['montant_ht'] != 0
        ? '<tr style="width:100%;">
                <td align="right" style="padding:2px 15px;">' . number_format($row['montant_ht'], 2, ',', ' ') . ' &euro;</td>
                <td align="right" style="padding:2px 15px; border-left:1px solid;">' . $row['taux'] . '</td>
                <td align="right" style="padding:2px 15px; border-left:1px solid;">' . number_format($row['montant_tva'], 2, ',', ' ') . ' &euro;</td>
           </tr>'
        : ($lignes_vide .= '<tr style="width:100%;">
                <td align="right" style="padding:2px 15px;">&nbsp;</td>
                <td align="right" style="padding:2px 15px; border-left:1px solid;">&nbsp;</td>
                <td align="right" style="padding:2px 15px; border-left:1px solid;">&nbsp;</td>
           </tr>');
}
?>