<?php

$GLOBALS['alphabet'] = array(
    "a",
    "b",
    "c",
    "d",
    "e",
    "f",
    "g",
    "h",
    "i",
    "j",
    "k",
    "l",
    "m",
    "n",
    "o",
    "p",
    "q",
    "r",
    "s",
    "t",
    "u",
    "v",
    "w",
    "x",
    "y",
    "z"
);

function shift_encrypt($shiftNumber, $text)
{
    $encryptedText = null;
    $text = strtolower($text);

    if (preg_match('~[0-9]~', $text)) {
        return "Het mogen alleen maar letters zijn.";
    }

    while ($shiftNumber > 24) {
        $shiftNumber -= 24;
    }

    $characters = str_split($text);
    foreach ($characters as $character) {
        $encryptedText .= shift_character($shiftNumber, $character);
    }

    return $encryptedText;
}

function shift_character($shiftPositions, $character)
{
    if ($character === " ") {
        return " ";
    }

    $alphabetPosition = array_search($character, $GLOBALS['alphabet']);

    $NewAlphabetPosition = $alphabetPosition + $shiftPositions;

    if ($NewAlphabetPosition > 24) {
        $NewAlphabetPosition -= 24;
    }

    return $GLOBALS['alphabet'][$NewAlphabetPosition];
}

echo(shift_encrypt(intval($argv[1]), $argv[2]));

?>