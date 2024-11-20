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
    // Voir fichier onLoad_view927.js
}
```

Voici une version complète du document avec une explication claire :

---

## Détecter les doublons de façon sélective

### Objectif du code

L'objectif de ce code est de détecter des doublons dans un ensemble de données en fonction de certains champs sélectionnés par l'utilisateur. Les doublons sont identifiés en comparant uniquement les champs spécifiés. De plus, les valeurs `null` ou vides sont ignorées lors de la comparaison, ce qui permet d'améliorer la précision des résultats en ne considérant que des données significatives.

### Code Exemple

```javascript
function findDuplicates(data, selectedFields) {
   // Voir fichier findDuplicates.js
}
```

---

### Fonctionnalités principales

1. **Champs sélectionnés** :
   - Permet de sélectionner uniquement certains champs pertinents pour la recherche des doublons.
   - Par exemple, rechercher des doublons uniquement sur les colonnes "nom" et "email".

2. **Ignorer les valeurs nulles ou vides** :
   - Les champs avec des valeurs `null` ou vides (`""`) sont automatiquement exclus de la comparaison pour éviter des correspondances inutiles.

3. **Regroupement des doublons** :
   - Les doublons détectés sont regroupés en fonction de leur clé unique. Chaque groupe contient les éléments ayant des valeurs similaires pour les champs sélectionnés.

4. **Sortie claire** :
   - Renvoie deux résultats : 
     - Une liste à plat des doublons.
     - Des groupes de doublons pour des analyses approfondies.

---

### Exemple d'utilisation

```javascript
    const data = [
        { id: 1, name: "Alice", email: "alice@example.com" },
        { id: 2, name: "Bob", email: "" },
        { id: 3, name: "Alice", email: "alice@example.com" },
        { id: 4, name: "Charlie", email: "charlie@example.com" },
        { id: 5, name: "Alice", email: null }
    ];

    const selectedFields = ["name", "email"];

    const result = findDuplicates(data, selectedFields);

    console.log("Doublons détectés :", result.duplicates);
    console.log("Groupes de doublons :", result.groups);
```

---

### Résultat attendu

```javascript
    // Doublons détectés : 
    [
        { id: 1, name: "Alice", email: "alice@example.com" },
        { id: 3, name: "Alice", email: "alice@example.com" }
    ]

    // Groupes de doublons :
    [
        {
            key: "Alice||alice@example.com",
            items: [
                { id: 1, name: "Alice", email: "alice@example.com" },
                { id: 3, name: "Alice", email: "alice@example.com" }
            ]
        }
    ]
```
### Remarque 
- Ce code est utile pour des applications comme le nettoyage de données 
- ou la gestion des bases de données, où l'identification 
- et la suppression des doublons sont essentielles pour garantir l'intégrité des données.
