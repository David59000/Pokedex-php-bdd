var classement = "asc"; // Variable pour stocker l'état du classement
function trierTableau(colonne) {
    var tabResult = document.getElementById("tableauPokemons");
    var lignes = Array.from(tabResult.rows).slice(1); // Convertir les lignes en tableau JavaScript et exclure la ligne d'en-tête

    lignes.sort(function(a, b) {
        var x = a.cells[colonne].textContent.toLowerCase();
        var y = b.cells[colonne].textContent.toLowerCase();

        if (classement === "asc") {
            return x.localeCompare(y); // Tri ascendant
        } else {
            return y.localeCompare(x); // Tri descendant
        }
    });

    // Reconnecter les lignes triées au tableau HTML
    lignes.forEach(function(ligne) {
        tabResult.appendChild(ligne);
    });

    // Inverser le classement pour le prochain clic
    classement = (classement === "asc") ? "desc" : "asc";
}