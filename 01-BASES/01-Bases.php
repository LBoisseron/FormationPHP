<!--
    tout d'abord nous pouvons écrire du HTML dans un fichier ayant l'extension PHP.
    l'inverse n'est pas possible
--> 
<style>
    h2 {
        margin: 0;
        font-size: 15px;
        color: red;
    }
</style>

<h2>Ecriture et Affichage</h2>

<?php

echo 'Bonjour'; // echo est une instruction qui nous permet d'effectuer un affichage
echo '<br>'; // nous pouvons également y mettre du html
echo '<hr><h2>Commentaires</h2>'; // Si vous vous rendez dans le code-source, vous ne verrez pas le PHP; cr le langage est interprété !
?>

<strong>Bonjour</strong>

<?= 'Hello world !'; ?> <!-- Le = remplace le echo. -->
<!--
    il est possible de fermer et ré-ouvrir php pour mélanger du code HTML & PHP
-->

<?php

echo 'Texte'; // ceci est un commentaire sur une ligne
echo 'Texte'; /* ceci est un commentaire sur plusieurs lignes */
print 'Texte'; # ceci est un commentaire sur une ligne
/*
Print est une autre instruction d'affichage. Pas de différence entre print et echo
---------------------------------------------------------------------------
vous n'êtes pas obligée de fermer PHP avec '?>'. 
vous pouvez fermer et ouvrir plusieurs fois PHP
*/

//_________________________________________________________________________________
echo '<hr><h2>Variable PHP : Types / Déclaration / Affection</h2>';

// Déclaration d'une variable PHP : avec le signe $ 

$a = 127 ; // Affectation de la valeur 127 dans la variable nommée a
$b = 1.5 ; // Affectation de la valeur 1.5 dans la variable nommée b

// $nom_de_ma_variable = ma_valeur... 

echo gettype( $a ); // il s'agit d'un Entier : integer
echo '<br>';
echo gettype( $b ); // il s'agit d'un nombre à virgule : double
// gettype permet de voir le type d'une variable

$a = "une chaîne";
$b = "127";
echo '<br>';
echo gettype( $a );
echo '<br>';
echo gettype( $b ); // string est l'équivalant de varchar de MySQL

$a = true;
$b = FALSE;
echo '<br>';
echo gettype( $a );
echo '<br>';
echo gettype( $b );

/*
N.B : nous pouvons appeler une variable 'a2' mais pas '2a'.
elle peut contenir des chiffres, mais ne doit pas commencer par un chiffre.
*/

// ___________________________________________________________________________________
echo '<hr><h2>La Concaténation</h2>';

/*
on utilise le point ou la virgule pour concaténer
*/

$prenom = "Léna";
echo 'Bonjour '. $prenom . '<br>';
echo 'Bonjour ', $prenom , '<br>';

/*
il est possible de mélanger les points et les virgules;
ce n'est pas une bonne pratique, donc A EVITER.
*/

echo "Bonjour $prenom "; // dans les guillemets, la variable est évaluée
echo 'Bonjour $prenom' ; // dans les quotes, la variable n'est pas évaluée

// ___________________________________________________________________________________
echo '<hr><h2>Constante et Constante Magique</h2>';

define('IMPOSSIBLE_A_MODIFIER', 'Valeur de ma constante');
echo IMPOSSIBLE_A_MODIFIER . '<br>';

/*
par convention, une constante se déclare toujours en MAJUSCULE
--------------------------------------------------------------
les constantes sont utiles pour sauvegarder vos informations de connexion à une BDD par exemple
*/

// -- Les constantes magiques :
echo __FILE__ . '<br>'; // Chemin complet vers mon fichier
echo __DIR__ . '<br>'; // chemin vers mon dossier
echo __LINE__ . '<br>'; // affiche le numéro de la ligne

// ___________________________________________________________________________________
echo '<hr><h2>Les opérateurs arythmétiques</h2>';

$a = 10;
$b = 5;
echo $a + $b . '<br>'; // affiche 15
echo $a - $b . '<br>'; // affiche 5
echo $a * $b . '<br>'; // affiche 50
echo $a / $b . '<br>'; // affiche 2

// -- Opération / Affectation
$a = $a + $b; // ici, $a vaut 10... donc 10+5=15
$a += $b; // écriture simplifiée. même chose que $a = $a + $b  
$a -= $b; // même chose que $a = $a - $b 
$a *= $b; // même chose que $a = $a * $b 
$a /= $b; // même chose que $a = $a / $b 

$a += 1; // j'incrémente de 1. j'ajoute +1 à ma variable
$a++; // même chose que $a += 1;
$a--; // même chose que $a -= 1;

// _____________________________________________________________________________________
echo '<hr><h2>Structures Conditionnelles (if / else)</h2>';

/*
Isset & Empty
empty = teste si une variable est égale à 0, est vide ou non définie
isset = teste uniquement si une variable est définie / existe
*/

$var1 = "test";
$var2 = "";

if ( empty( $var2 ) ) { // si $var2 est égale à 0, est vide ou n'existe pas
    echo '0, vide ou non définie<br>';
} else {
    echo 'Ma Variable est définie<br>';
}

if ( isset( $var2 ) ) { // si existe $var2
    echo 'var2 existe<br>';
} else {
    echo 'var2 n\'existe pas !<br>';
}

$prenom = "";
$nom = "BOISSERON";
if (isset($prenom)) echo "Attention, prénom existe !";
if (empty($prenom)) echo "Attention, vous avez oublié de remplir votre prénom";

echo '<hr>';
$a = 10;
$b = 6;
$c = 8;

if ( $a > $b ) { // si A est supérieur à B
    print "A est bien supérieur à B. <br>";
} else {
    print "non, c'est B qui est supérieur à A. <br>";
}

if ( $a < $b && $b < $c ) { // si A est inférieur à B et que dans le même temps B est inférieur à C
print "Tout est ok pour les deux conditions. <br>";
}

if ( $a == 2 || $b > $c ) { // si A contient 2 et que dans le même temps B est supérieur à C
    print "Tout est ok pour les deux conditions. <br>";
} else {
    // aucune des 2 est bonne
    print "Nous sommes dans le ELSE";
}
/*
N.B: le double égal == permet de vérifier une info à l'intérieur d'une variable
*/

if ( $a == 10 XOR $b == 6 ) { // seulement l'une des 2 conditions doit être valide. mais pas les 2 en même temps
    echo 'ok, condition exclusive <br>';
}

/*
forme contractée de IF... 
une écriture ternaire, un if ternaire
le "?" remplace le IF (alors), le ":" remplace le ELSE (sinon)
*/
echo ($a == 10) ? "a est égal à 10<br>" : "a n'est pas égal à 10<br>";

// -- Comparaison

$a = 1;
$b = "1";
if ( $a == $b ) echo "les deux variables sont égales";
if ( $a === $b ) echo "les deux variables sont strictement égales";

/*
/!\ A NE PAS OUBLIER /!\
= Affectation
== Comparaison des valeurs
=== Comparaison des valeurs et des types
*/

// _____________________________________________________________________________________
echo '<hr><h2>Condition Switch</h2>';

$couleur = 'marron';
switch($couleur) {
    case 'bleu' :
    echo 'Vous aimez le bleu';
    break;
    case 'rouge' :
    echo 'Vous aimez le rouge';
    break;
    case 'jaune' :
    echo 'Vous aimez le jaune';
    break;
    case 'vert' :
    echo 'Vous aimez le vert';
    break;
    default: // cas par défaut, on ne rentre dans aucun des cas précédents.
    echo "Vous n'aimez ni le bleu, ni le rouge,...";
    break;
}

/*
EXERCICE :
peut-on faire la même chose que le switch avec if/else ? est-ce possible ?
*/

if  ($couleur == bleu) {
    echo 'Vous aimez le bleu';
} else if ($couleur == rouge) {
    echo 'Vous aimez le rouge';
} else if ($couleur == vert) {
    echo 'Vous aimez le vert';
   } else {
    echo "Vous n'aimez ni le bleu, ni le rouge,...";
}

// _____________________________________________________________________________________
echo '<hr><h2>Les fonctions prédéfinies</h2>';
// à regarder : http://overapi.com/php

echo '<br>Date : <br>';
print date('d/m/Y');
echo '<br>';
print date('Y M d D');

echo '<br>';
$email1 = "lboisseron@yahoo.fr";
echo strpos($email1, "@");
/*
La fonction strpos() indique la position du caractère @ dans la chaîne.
on commence à zéro.
 */

echo '<br>';
$email2 = 'léna';
/*
cette ligne ne sort rien, pourtant il y a bien une valeur. FALSE : boolean
-----------------------------------------
avec un var_dump on aperçoit le FALSE si le caractère @ n'est pas trouvé. 
var_dump est une instruction d'affichage améliorée que l'on utilise régulièrement en phase de développement
*/

echo strpos($email2, "@");
var_dump(strpos($email2, "@"));

/*
strpos() permet de trouver la position d'un caractère dans une chaîne
en cas de succès, ça nous retourne un entier int.
en cas d'échec, ça retourne un FALSE si l'occurence n'a pas été trouvé
------------
PARAMETRES :
1. la chaîne dans laquelle effectuer la recherche
2. le caractère / l'info à chercher
*/

echo '<br>';
$phrase = "Je suis une phrase.";
echo iconv_strlen($phrase) . '<br>';
/*
iconv_strlen() permet de compter le nombre de caractères dans une chaîne
en cas de succès, ça nous retourne un entier int.
en cas d'échec, ça retourne un boolean FALSE : 0
------------
PARAMETRES :
1. la chaîne dans laquelle effectuer la recherche
*/

$texte = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis eius cum vel itaque molestiae placeat accusantium nostrum atque? Ipsum deleniti exercitationem quo porro placeat dolores nihil, sit quos ducimus perspiciatis.";
echo substr($texte, 0, 50) . '... <a href="#">Lire la suite</a>';

/*
substr() retourne une partie d'une chaîne (option LIRE LA SUITE)
en cas de succès, ça nous retourne un entier int.
en cas d'échec, ça retourne un boolean FALSE : 0
------------
PARAMETRES :
1. la chaîne d'entrée correspond à la chaîne à couper
2. Start ; position de début
3. length : nombre de caractères souhaités
*/

// _____________________________________________________________________________________
echo '<hr><h2>Les Fonctions Utilisateur</h2>';

/*
les fonctions qui ne sont pas prédéfinies en php sont déclarées puis exécutées par l'utilisateur.
autrement dit, il est possible de créer ses propres fonctions php.
réalisons une fonction permettant de tirer un trait sur la page. 
*/

function separator () { // cette fonction ne reçoit pas d'argument
    echo "<br><hr><br>";
}
separator(); // exécution de notre fonction.

/*
Fonction avec arguments
les $arguments sont des paramètres fournis à la fonction
ils lui permettent de compléter ou modifier son comportement initialement prévu
 */

function bonjour($prenom) {
    return "Bonjour $prenom <br>";
}
// Exécution
echo bonjour ("Léna");
echo bonjour ("Aurélie");
echo bonjour ("Astrid");

// ________________________________________________________________________________________________
/*
    EXERCICE :
    1. Créer une fonction permettant de calculer la somme de 2 nb.
    2. Créer une fonction permettant de générer des titres h3
    3. Créer une fonction permettant de calculer la TVA 20% (1.2)
    4. Créer une fonction permettant de calculer la TVA plusieurs taux. normal : 20% ou 1.2 | réduit : 5.5% ou 1.055

    5. BONUS : Réaliser une fonction permettant de générer une accroche de X caractères passé paramètres, sans couper de mot.

    6. BONUS : Challenge Réaliser une fonction PHP permettant de
    convertir une chaine en slug. slugify().
*/

// 1. Créer une fonction permettant de calculer la somme de 2 nb.

function somme($nb1, $nb2) {
    return $nb1 + $nb2;
};
$resultat = somme(10, 15);
echo $resultat;

// 2. Créer une fonction permettant de générer des titres h3
echo titre('Je suis développeuse web'); // il est possible d'exécuter une fonction avant qu'elle soit déclarée dans le code
function titre($h3) {
    return "<h3>$h3</h3>"; // à partir du return, on quitte la fonction. tout ce qui se trouve parès, n'est pas exécuté
    echo 'test';
}

// 3. Créer une fonction permettant de calculer la TVA 20% (1.2)

function calculTva ($montant) {
    return "$montant"*1.2;
}
echo calculTva ("200");

// 4. Créer une fonction permettant de calculer la TVA plusieurs taux. normal : 20% ou 1.2 | réduit : 5.5% ou 1.055
echo '<br>';
function calculTva2 ($montant, $taux) {
    return $montant*$taux;
}
$resultat = calculTva2(100, 1.2);
echo $resultat;

// 5. BONUS : Réaliser une fonction permettant de générer une accroche de X caractères passé paramètres, sans couper de mot.


// 6. BONUS : Challenge Réaliser une fonction PHP permettant de convertir une chaine en slug. slugify().

separator ();

// _____________________________________________________________________________________________________________
echo '<hr><h2>Les Boucles</h2>';

for( $i = 0 ; $i < 10 ; $i++ ) {
    echo $i . '<br>';
}

/* EXERCICE :
en partant de l'exemple ci-dessous et en utilisant une boucle for,
réalisez un select allant de 1 à 31, correspondant au nombre de jours dans 1 mois
*/ 
echo '<select>';
echo '<option>1</option>';
echo '<option>2</option>';
echo '<option>3</option>';
echo '</select>';

echo '<br>';
echo '<select>';
for( $j = 1 ; $j <= 31 ; $j++ ) {
    echo "<option>$j</option>";
}
echo '</select>';

separator ();

?> <!-- Je ferme php, donc je suis dans mon HTML -->

<table border = "1">
    <tr>
        <?php
            for($i = 0 ; $i <= 9 ; $i++) {
                "<td>$i</td>";
            }
        ?>
    </tr>
</table>

<?php
//__________________
// même

echo '<table border="1"><tr>';
    for($i = 0 ; $i <= 9 ; $i++) {
        echo "<td>$i</td>";
    }
echo '</tr></table>';


// _____________________________________________________________________________________________________________
echo '<hr><h2>Les Tableaux / Array</h2>';
/*
Un Array ou tableau est une variable qui contient plusieurs valeurs
organisées sous forme de "clé(index) -> valeur". 

     --------------------------------------------------------
    |     0     |     1    |    2     |     3    |    4    |
    --------------------------------------------------------
    |   Léna    |    Lau   |    Kat   |   Angel  |  Astrid |
    --------------------------------------------------------

*/
 // -- Déclaration et remplissage d'un tableau indexé
$apprenantes = array('Léna', 'Lau', 'Kat', 'Angel', 'Astrid');
$apprenantes = ['Léna', 'Lau', 'Kat', 'Angel', 'Astrid'];
echo $apprenantes[1];

/*
pour afficher la valeur d'une clé d'un tableau, on utilise : monTableau[cle]
clé = indice = index
*/

echo '<pre>'; // pour un affichage plus ordonné
    print_r($apprenantes);
echo '</pre>';

/*
Les tableaux associatifs : les clés ne sont plus numériques, mais sous forme de string

    -------------------------------------------------------------
    |    Prenom    |      Nom     |    Téléphone   |     Âge    |
    -------------------------------------------------------------
    |     Léna     |   BOISSERON  |   0690424043   |   40 ans   |
    -------------------------------------------------------------

*/

$contact = [
    // 'cle' => 'valeur'
    'prenom' => 'Léna',
    'nom'    => 'BOISSERON',
    'téléphone' => '0690424043',
    'âge'   => '40ans',
    'adresse' => [
        'rue' => '512 Résidence la Sucrerie',
        'ville' => 'Petit-Bourg',
        'CP' => '97170',
        'pays' => 'GUADELOUPE',
    ]
];

echo '<h1>Bonjour ' . $contact['prenom']
                    . ' '
                    . $contact['nom']
                    . '<br><small>'
                    . $contact['adresse']['ville']
                    . ' '
                    . $contact['adresse']['pays']
                    . '</small>'
                    . '</h1>'
;

$mesContacts = []; // déclarer un tableau vide
$mesContacts[] = 'Léna'; // ajouter un élément dans un tableau
$mesContacts[] = 'Khélian'; // l'indice est affecté automatiquement par PHP
$mesContacts[] = 'Khénaël'; 
$mesContacts[10] = 'Gérard'; // l'indice es précisé manuellement
$mesContacts[] = 'Family'; // PHP continue après à 11

echo '<pre>'; 
    print_r($mesContacts);
echo '</pre>';

$contacts = [];
$contacts[] = [
    'prenom' => 'Léna',
    'nom'    => 'BOISSERON'
];
$contacts[] = [
    'prenom' => 'Khélian',
    'nom'    => 'SELBONNE'
];
$contacts[] = [
    'prenom' => 'Khénaël',
    'nom'    => 'SELBONNE'
];
echo '<pre>'; 
    print_r($contacts);
echo '</pre>';

// afficher les prénoms de chaque contact
echo $contacts[0]['prenom']. '<br>';
echo $contacts[1]['prenom']. '<br>';
echo $contacts[2]['prenom']. '<br>';

/*
faire une boucle afin d'afficher les prénoms dans un paragraphe
 */

// avec la boucle FOR
/*
N.B : count et sizeof me retournent la dimension de mon tableau, autrement dit, le nombre d'éléments.
pas de différence entre les 2 fonctions
*/

echo 'La taille de mon tableau est : ' . count($contacts) . '<br>';
echo 'La taille de mon tableau est : ' . sizeof($contacts) . '<br>';
for( $i = 0 ; $i < count($contacts) ; $i++ ) {
    echo '<p>' .$contacts[$i]['prenom']. '</p>';
}

separator();

// avec la boucle FOREACH
/*
 quand il y a 2 variables ($index et $valeur) : 
 la 1ere parcourt la colonne des indices (index)
 la 2eme parcourt la colonne des valeurs.
 */
foreach ($contacts as $index => $valeur) {
    echo 'Mon contact ' . $valeur['prenom'] . ' est à index ' . $index . '<br>';
}

// quand il y a 1 variable, c'est la colonne des valeurs
foreach ($contacts as $valeur) {
    echo 'Mon contact ' . $valeur['prenom'] . '<br>';
}

/*
    EXERCICE :
    En utilisant une ou plusieurs boucles foreach
    afficher les informations (Cle / Valeur) du contact
    $contact.
    BONUS : vous utiliserez des listes à puces <ul><li>
*/

separator();


$contact = [
    // 'cle' => 'valeur'
    'prenom' => 'Léna',
    'nom'    => 'BOISSERON',
    'téléphone' => [
        'fixe' => '0590927955',
        'port' => '0690424043' 
    ],
    'âge'   => '40ans',
    'adresse' => [
        'rue' => '512 Résidence la Sucrerie',
        'ville' => 'Petit-Bourg',
        'CP' => '97170',
        'pays' => 'GUADELOUPE'
    ],
];

$content = '<ul>';

// Je parcours mon tableau $contact
// Ici $cle prend successivement les valeurs prenom, nom, ...
foreach ($contact as $cle => $valeur) {

    // Si au cours d'une des itérations (tour de boucle) ma $valeur est un tableau...
    if ( is_array( $valeur ) ) {
        
        // --- Alors, je parcours le nouveau tableau
        $content .= "<li><strong>$cle</strong> : </li>"; // .= fait à la fois une concaténation et une attribution de valeur
        $content .= "<ul>";

        foreach ($valeur as $key => $value) {
            $content .= "<li><strong>$key</strong> : $value</li>";
        }

        $content .= "</ul>";

    } else {
        // -- Sinon, ma $valeur n'est pas un tableau. Je l'affiche...
        $content .= "<li><strong>$cle</strong> : $valeur</li>";
    }
}

$content .= '</ul>';
echo $content;

separator();
// affiche les infos de PHP
// phpinfo();









?>