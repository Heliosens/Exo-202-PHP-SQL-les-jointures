<?php

/**
 * 1. Commencez par importer le script SQL disponible dans le dossier SQL.
 * 2. Connectez vous à la base de données blog.
 */

require 'connPDO.php';
$pdo = new connPDO();
$db = $pdo->conn();

/**
 * 3. Sans utiliser les alias, effectuez une jointure de type INNER JOIN de manière à récupérer :
 *   - Les articles :
 *     * id
 *     * titre
 *     * contenu
 *     * le nom de la catégorie ( pas l'id, le nom en provenance de la table Categorie ).
 *
 * A l'aide d'une boucle, affichez chaque ligne du tableau de résultat.
 */

// TODO Votre code ici.
$request = $db->prepare("
    SELECT article.id, article.title, article.content , categorie.name
    FROM article
    INNER JOIN categorie ON article.category_fk = categorie.id
");

$request->execute();
;
foreach ($request->fetchAll() as $item){
    echo $item['id'] . " | " . $item['title'] . " | " . $item['content'] . " | " . $item['name'] . "<br>";
}

/**
 * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
 */

// TODO Votre code ici.


/**
 * 5. Ajoutez un utilisateur dans la table utilisateur.
 *    Ajoutez des commentaires et liez un utilisateur au commentaire.
 *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
 */

// TODO Votre code ici.