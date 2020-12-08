<?php

namespace App\Utils;

class Toolbox
{
    /**
     * Compte le nombre de mots dans une chaîne de caractères
     *
     * @param string $text Texte à analyser
     * @return integer Nombre de mots
     */
    public function countWords(string $text): int
    {
        $words     = explode(' ', $text);
        $trimWords = 0;

        foreach ($words as $word)
        {
            $trimWord = trim($word);

            if (strlen($trimWord) > 0)
            {
                $trimWords++;
            }
        }

        return $trimWords;
    }

    /**
     * Compte le nombre de liens dans une chaîne de caractères
     *
     * @param string $text Texte à analyser
     * @return integer Nombre de liens
     */
    public function countsLinks(string $text): int
    {
        $re = '/<a( \S+)*\s*href="\S*"( \S+)*\s*>\S+<\/a>/m';
        return preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
    }
}
