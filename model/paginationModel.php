<?php



function PaginationModel(
    string $url,
    string $getName,
    int $nbTotalItem,
    int $currentPage = 1,
    int $nbByPage = 10
): string|null {
    if ($nbTotalItem === 0)
        return null;
    $sortie = "";
    $nbPage = (int) ceil($nbTotalItem / $nbByPage);

    if ($nbPage < 2)
        return null;

    if ($currentPage === 1) {
        $sortie .= "<< <";
    } elseif ($currentPage === 2) {
        $sortie .= "<a href='$url'><<</a> <a href='$url'><</a>";
    } else {
        $sortie .= "<a href='$url'><<</a> <a href='$url?&$getName=" . ($currentPage - 1) . "'><</a>";
    }

    for ($i = 1; $i <= $nbPage; $i++) {
        if ($i === $currentPage)
            $sortie .= " $i ";
        else if ($i === 1)
            $sortie .= " <a href='$url'>$i</a> ";
        else
            $sortie .= " <a href='$url?&$getName=$i'>$i</a> ";
    }

    $sortie .= $currentPage === $nbPage ? "> >>" : "<a href='$url?&$getName=" . ($currentPage + 1) . "'>></a> <a href='$url?&$getName=$nbPage'>>></a>";

    return $sortie;
}
