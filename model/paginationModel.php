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

    if ($currentPage > 1) {
        $sortie .= "<a href='$url'><<</a> <a href='$url?&$getName=" . ($currentPage - 1) . "'><</a>";
    }

    for ($i = 1; $i <= $nbPage; $i++) {
        if ($i === $currentPage)
            $sortie .= " <a class='active' href='#'>$i</a> ";
        else if ($i === 1)
            $sortie .= " <a href='$url'>$i</a> ";
        else
            $sortie .= " <a href='$url?&$getName=$i'>$i</a> ";
    }

    if ($currentPage < $nbPage) {
        $sortie .= "<a href='$url?&$getName=" . ($currentPage + 1) . "'>></a> <a href='$url?&$getName=$nbPage'>>></a>";
    }

    return $sortie;
}
?>