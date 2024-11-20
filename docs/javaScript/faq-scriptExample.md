# FAQ - Exemple de Script

## Détecter les Doublons

### Objectif du Code
- Supprimer les lignes en doublon dans les données retournées par le webservice.
- Deux lignes sont considérées comme des doublons si elles ont :
  - La même **date de création** (`date_creation`).
  - Le même **numéro de badge** (`numero_badge`).
- Garder uniquement la première occurrence de chaque doublon.
- Collecter les informations des doublons détectés pour mise à jour via une API.

### Code Exemple

```javascript
function onLoad_view927() {
  var thisComponent = this;

  var viewbar = Component.find("Viewbar", this);

  viewbar.addTool("Ajuster audit", function () {
    ajustAudit();
  });

  async function ajustAudit() {
    let viewData = await gopaas.webservice.getItems("historique_audit.default", "");

    let auditData = viewData.rows;
    let array = [];
    let uniqueKeys = new Set();

    // Parcourir les données et conserver uniquement la première occurrence
    let filteredData = auditData.filter((item) => {
      let key = `${item.date_creation}-${item.numero_badge}`;
      if (uniqueKeys.has(key)) {
        // Ajouter les doublons détectés dans le tableau array
        array.push({
          cle: item.cle,
          compter: 0,
        });
        return false; // Exclure les doublons
      } else {
        uniqueKeys.add(key);
        return true; // Conserver la première occurrence
      }
    });

    console.log("Doublons détectés :", array);
    console.log("Données filtrées :", filteredData);

    // Mettre à jour les données via le webservice
    if (array.length > 0) {
      await gopaas.webservice.updateItems("historique_audit", JSON.stringify(array));
    }

    console.log("Opération terminée !");
  }
}
