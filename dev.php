<?php
function reverseWords($string) {
    $words = explode(' ', $string);
    $reversedWords = [];

    foreach ($words as $word) {
        $reversedWord = '';
        $letters = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($letters as $letter) {
            if (preg_match('/\p{L}/u', $letter)) {
                if (ctype_upper($letter)) {
                    $reversedWord .= mb_strtoupper($letter, 'UTF-8');
                } else {
                    $reversedWord .= mb_strtolower($letter, 'UTF-8');
                }
            } else {
                $reversedWord .= $letter;
            }
        }

        $reversedWords[] = strrev($reversedWord);
    }

    return implode(' ', $reversedWords);
};


function testReverseWords() {
    $string1 = "Cat";
    $expected1 = "Tac";
    $result1 = reverseWords($string1);
    assert($result1 === $expected1, "Test case 1 failed");

    $string2 = "Мышь";
    $expected2 = "Ьшым";
    $result2 = reverseWords($string2);
    assert($result2 === $expected2, "Test case 2 failed");

    $string3 = "houSe";
    $expected3 = "esuOh";
    $result3 = reverseWords($string3);
    assert($result3 === $expected3, "Test case 3 failed");

    $string4 = "домИК";
    $expected4 = "кимОД";
    $result4 = reverseWords($string4);
    assert($result4 === $expected4, "Test case 4 failed");

    $string5 = "elEpHant";
    $expected5 = "tnAhPele";
    $result5 = reverseWords($string5);
    assert($result5 === $expected5, "Test case 5 failed");

    $string6 = "cat,";
    $expected6 = "tac,";
    $result6 = reverseWords($string6);
    assert($result6 === $expected6, "Test case 6 failed");

    $string7 = "Зима:";
    $expected7 = "Амиз:";
    $result7 = reverseWords($string7);
    assert($result7 === $expected7, "Test case 7 failed");

    $string8 = "is 'cold' now";
    $expected8 = "si 'dloc' won";
    $result8 = reverseWords($string8);
    assert($result8 === $expected8, "Test case 8 failed");

    $string9 = "это «Так» \"просто\"";
    $expected9 = "отэ «Так» \"отсорп\"";
    $result9 = reverseWords($string9);
    assert($result9 === $expected9, "Test case 9 failed");

    $string10 = "third-part";
    $expected10 = "driht-trap";
    $result10 = reverseWords($string10);
    assert($result10 === $expected10, "Test case 10 failed");

    $string11 = "can`t";
    $expected11 = "nac`t";
    $result11 = reverseWords($string11);
    assert($result11 === $expected11, "Test case 11 failed");

    echo "All test cases passed!";
};

testReverseWords();

?>
