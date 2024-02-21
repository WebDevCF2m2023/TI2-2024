<?php

require_once "../config.php"; // Constantes

// Fonction utilisateur de pagination au format texte
function PaginationModel(string $url, // URL (pour conserver les autres variables GET)
                        string $getName, // Le nom de notre variable GET de pagination
                        int $nbTotalItem, // Le nombre total d'éléments à afficher
                        int $currentPage = 1, // La page actuelle par défaut
                        int $nbByPage = 10 // Le nombre d'éléments par page par défaut
                        ): string|null
{
    // Pas d'éléments, pas de pagination
    if ($nbTotalItem === 0) {
        return null;
    }

    // Initialisation de la variable de sortie au format texte
    $sortie = "";

    // Calcul du nombre de pages en divisant le nombre total d'éléments par le nombre d'éléments par page
    $nbPage = (int) ceil($nbTotalItem / $nbByPage);

    // Si une seule page, pas de pagination
    if ($nbPage < 2) {
        return null;
    }

    // Bouton précédent
    if ($currentPage === 1) {
        $sortie .= "<< <";
    } elseif ($currentPage === 2) {
        $sortie .= "<a href='$url'><<</a> <a href='$url'><</a>";
    } else {
        $sortie .= "<a href='$url'><<</a> <a href='$url?$getName=" . ($currentPage - 1) . "'><</a>";
    }

    // Boucle sur le nombre de pages
    for ($i = 1; $i <= $nbPage; $i++) {
        if ($i === $currentPage) {
            $sortie .= " $i ";
        } elseif ($i === 1) {
            $sortie .= " <a href='$url'>$i</a> ";
        } else {
            $sortie .= " <a href='$url?$getName=$i'>$i</a> ";
        }
    }

    // Bouton suivant, ternaire pour éviter un if-else
    $sortie .= $currentPage === $nbPage ? "> >>" : "<a href='$url?$getName=" . ($currentPage + 1) . "'>></a> <a href='$url?$getName=$nbPage'>>></a>";

    return $sortie;
}