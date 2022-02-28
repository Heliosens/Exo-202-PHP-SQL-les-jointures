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

$request = $db->prepare("
    SELECT article.id, article.title, article.content , categorie.name
    FROM article
    INNER JOIN categorie ON article.category_fk = categorie.id
");

$request->execute();

foreach ($request->fetchAll() as $item){
    echo $item['id'] . " _ " . $item['title'] . " | " . $item['content'] . " | " . $item['name'] . "<br>";
}

echo "<br>";
/**
 * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
 */

$request = $db->prepare("
    SELECT ar.id, ar.title, ar.content, ca.name
    FROM article as ar
    INNER JOIN categorie AS ca ON ar.category_fk = ca.id
");

$request->execute();

foreach ($request->fetchAll() as $item){
    echo $item['id'] . " _ " . $item['title'] . " | " . $item['content'] . " | " . $item['name'] . "<br>";
}

/**
 * 5. Ajoutez un utilisateur dans la table utilisateur.
 *    Ajoutez des commentaires et liez un utilisateur au commentaire.
 *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
 */
$request = $db->prepare("
    SELECT commentaire.content, utilisateur.lastName, utilisateur.firstName
    FROM commentaire
    LEFT JOIN utilisateur ON commentaire.user_fk = utilisateur.id
");

$request->execute();

echo "<br>";

foreach ($request->fetchAll() as $item){
    echo $item['content'] . " _ " . $item['lastName'] . " " . $item['firstName'] . "<br>";
}
