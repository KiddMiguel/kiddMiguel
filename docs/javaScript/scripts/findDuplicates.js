function findDuplicates(data, selectedFields) {
    if (selectedFields.length === 0) {
        return { duplicates: data, groups: null };
    }

    let duplicates = [];
    let seen = {};
    let groups = [];

    for (let i = 0; i < data.length; i++) {
        let item = data[i];

        // Générer une clé unique basée sur les champs sélectionnés,
        // mais ignorer les valeurs nulles ou vides
        let key = selectedFields
            .map(field => (item[field] !== null && item[field] !== '' ? item[field] : null))
            .filter(value => value !== null) // Ignorer les champs null ou vides
            .join('||');

        if (key === '') continue; // Si la clé est vide, ignorer cet élément

        // Vérifier si la clé a déjà été rencontrée
        if (seen[key]) {
            if (seen[key].items.length === 1) {
                duplicates.push(...seen[key].items);
            }
            duplicates.push(item);
            seen[key].items.push(item);
        } else {
            seen[key] = { key: key, items: [item] };
        }
    }

    // Construire les groupes à partir de 'seen', n'inclure que les groupes avec plus d'un élément
    groups = Object.values(seen).filter(group => group.items.length > 1);

    return { duplicates: duplicates, groups: groups };
}