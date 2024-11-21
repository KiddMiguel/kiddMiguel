Voici une version complète du fichier README avec le script fourni :

```markdown
# Condition avec Tableau

## Objectif

Optimiser la gestion des conditions dans un script PHP en remplaçant des blocs `if` répétitifs par une structure plus efficace utilisant un tableau et une boucle `foreach`. Cette méthode améliore la lisibilité, la maintenabilité et réduit la duplication de code.

## Code Exemple

```php
    // Script disposnible sur le fichier conditionAvecTableau.php
```

## Explications

1. **Utilisation d'un tableau** : 
   - Toutes les informations nécessaires (montants HT, taux et TVA) sont centralisées dans un tableau `$rows`.
   - Cela évite de répéter plusieurs blocs conditionnels similaires.

2. **Boucle `foreach`** :
   - Parcourt chaque ligne du tableau pour générer dynamiquement le code HTML.

3. **Condition ternaire** :
   - Si `montant_ht` est différent de 0 (`!= 0`), affiche une ligne HTML avec les valeurs formatées.
   - Sinon, ajoute une ligne vide au contenu de `$lignes_vide`.

4. **Avantages** :
   - **Lisibilité** : Le code est plus concis et organisé.
   - **Maintenance** : Ajouter ou modifier des lignes est simplifié en ajustant le tableau.
   - **Élimination des répétitions** : Moins de code redondant.
