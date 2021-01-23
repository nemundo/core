<?php

namespace Nemundo\Core\Type\Text;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\AbstractType;

class Text extends AbstractType
{

    public function __construct($value = '')
    {
        $value = trim($value);
        parent::__construct($value);
    }

    public function getLength()
    {
        $length = strlen($this->value);
        return $length;
    }

    public function getChecksum()
    {

        $checksum = md5($this->getValue());
        return $checksum;

    }


    public function isNumber()
    {

        //(new Debug())->write($this->value);

        $value = ctype_digit($this->value);
        return $value;

        //return is_numeric((int)$this->value);

    }


    public function append($text)
    {
        $this->value = $this->value . $text;
        return $this;
    }

    public function prepend($text)
    {
        $this->value = $text . $this->value;
        return $this;
    }


    // Unterschied zu getSubstring !!!
    public function substring($start, $length = null)
    {

        if ($length == null) {
            $substring = substr($this->value, $start);
        } else {
            $substring = substr($this->value, $start, $length);
        }

        $this->value = $substring;

        return $this;


    }


    public function getSubstring($start, $length = null)
    {

        if ($length == null) {
            $substring = substr($this->value, $start);
        } else {
            $substring = substr($this->value, $start, $length);
        }

        $substring = trim($substring);

        return $substring;

    }


    public function getPosistion($search, $ignoreCaseSensitive = true)
    {

        $position = null;
        if ($ignoreCaseSensitive) {
            $position = stripos($this->value, $search);
        } else {
            $position = strpos($this->value, $search);
        }

        return $position;


    }

    public function split($delimiter)
    {
        $list = explode($delimiter, $this->value);
        return $list;
    }


    // uppercase()
    public function changeToUppercase()
    {
        $this->value = strtoupper($this->value);
        return $this;
    }


    // lowercase()
    public function changeToLowercase()
    {
        $this->value = mb_strtolower($this->value);
        return $this;
    }


    public function uppercaseFirstLetter()
    {
        $this->value[0] = strtoupper($this->value[0]);
        return $this;
    }


    public function replace($textFrom, $textTo, $caseSensitive = true)
    {
        if (!is_null($this->value)) {
            if ($caseSensitive) {
                $this->value = str_replace($textFrom, $textTo, $this->value);
            } else {
                $this->value = str_ireplace($textFrom, $textTo, $this->value);
            }
        }

        return $this;
    }


    public function replaceLeft($textFrom, $textTo, $caseSensitive = true)
    {

        if ($caseSensitive) {
            if (substr($this->value, 0, strlen($textFrom)) == $textFrom) {
                $this->value = $textTo . substr($this->value, strlen($textFrom));
            }
        } else {
            if (strcasecmp(substr($this->value, 0, strlen($textFrom)), $textFrom) == 0) {
                //if (substr($this->value, 0, strlen($textFrom)) == $textFrom) {
                $this->value = $textTo . substr($this->value, strlen($textFrom));
            }
        }

        return $this;
    }


    public function replaceRight($textFrom, $textTo, $caseSensitive = true)
    {

        $replace = false;
        $valueLength = strlen($this->value);
        $textFromLength = strlen($textFrom);
        $pos = $valueLength - $textFromLength;
        $substring = substr($this->value, $pos);

        if ($caseSensitive) {
            if ($substring == $textFrom) {
                $this->value = substr($this->value, 0, $pos) . $textTo;
                $replace = true;
            }
        } else {
            if (strcasecmp($substring, $textFrom) == 0) {
                $replace = true;
            }
        }

        if ($replace) {
            $this->value = substr($this->value, 0, $pos) . $textTo;
        }


        return $this;
    }


    public function remove($text, $caseSensitive = true)
    {
        $this->replace($text, '', $caseSensitive);
        $this->trim();
        return $this;
    }


    public function replaceRegex($regularExpression, $textTo)
    {

        $this->value = preg_replace('/' . $regularExpression . '/', $textTo, $this->value);
        return $this;

    }


    public function removeRegex($regularExpression)
    {

        $this->replaceRegex($regularExpression, '');
        return $this;

    }


    public function removeLeft($text, $caseSensitive = true)
    {
        $this->replaceLeft($text, '', $caseSensitive);
        return $this;
    }

    public function removeRight($text, $caseSensitive = true)
    {
        $this->replaceRight($text, '', $caseSensitive);
        return $this;
    }


    public function removeAfter($text)
    {
        $this->value = strtok($this->value, $text);
        return $this;
    }

    /**
     * @return $this
     */
    public function removeHtmlTags()
    {
        $this->value = strip_tags($this->value);
        return $this;
    }


    public function removeLeadingZero()
    {
        $this->value = ltrim($this->value, '0');
        return $this;
    }


    public function removeNewline()
    {
        $this->value = str_replace(array("\n", "\r"), '', $this->value);
        return $this;
    }


    /**
     * @return $this
     */
    public function utf8Encode()
    {
        $this->value = utf8_encode($this->value);
        return $this;
    }


    public function decodeHtmlCharacter()
    {
        $this->value = html_entity_decode($this->value);
        return $this;
    }


    public function replaceNewLineToHtmlBreak()
    {
        $this->value = nl2br($this->value);
        return $this;
    }


    public function clear()
    {
        $this->value = '';
        return $this;
    }


    public function trim()
    {
        $this->value = trim($this->value);
        return $this;
    }


    public function contains($text, $caseSensitive = true)
    {

        $found = false;

        if ($caseSensitive) {
            if (strlen(strstr($this->value, $text)) > 0) {
                $found = true;
            }
        } else {
            if (strlen(stristr($this->value, $text)) > 0) {
                $found = true;
            }
        }

        return $found;

    }


    public function containsLeft($text, $caseSensitive = true)
    {

        $found = false;

        if ($caseSensitive) {
            if (strpos($this->value, $text) === 0) {
                $found = true;
            }
        } else {
            if (stripos($this->value, $text) === 0) {
                $found = true;
            }
        }

        return $found;

    }


    public function containsRight($text, $caseSensitive = true)
    {

        $found = false;

        if ($caseSensitive) {
            if (strpos($this->value, $text) === 0) {
                $found = true;
            }
        } else {
            if (stripos($this->value, $text) === 0) {
                $found = true;
            }
        }


        return $found;

    }


    // auslagern nach WordList
    public function getWordList()
    {


        $text = $this->getValue();

        $text = mb_strtolower($text);

        //$text = ' ' . $text . ' ';
        $text = str_replace('.', ' ', $text);
        $text = str_replace(':', ' ', $text);
        $text = str_replace(',', ' ', $text);
        $text = str_replace('?', ' ', $text);
        $text = str_replace('!', ' ', $text);
        $text = str_replace('/', ' ', $text);
        $text = str_replace('\\', ' ', $text);
        $text = str_replace('\'', ' ', $text);
        //$text = str_replace('�', ' ', $text);
        //$text = str_replace('�', ' ', $text);
        $text = str_replace('-', ' ', $text);
        $text = str_replace('_', ' ', $text);
        $text = str_replace('(', ' ', $text);
        $text = str_replace(')', ' ', $text);
        $text = str_replace('<', ' ', $text);
        $text = str_replace('>', ' ', $text);

        $wordList = explode(' ', $text);

        $wordList = array_filter($wordList, function ($value) {
            return $value !== '';
        });

        return $wordList;


    }


    public function getUniqueWordList()
    {

        $list = $this->getWordList();
        $list = array_unique($list);
        return $list;

    }


    public function appendIfNotExists($text)
    {
        $this->value = rtrim($this->value, $text) . $text;
        return $this;
    }


    public function prefixIfNotExists($text)
    {
        $this->value = $text . ltrim($this->value, $text);
        return $this;
    }


    public function isEmpty()
    {

        $value = false;
        if ($this->getLength() == 0) {
            $value = true;
        }
        return $value;


    }


    public function isNotEmpty()
    {

        $value = false;
        if ($this->getLength() > 0) {
            $value = true;
        }
        return $value;


    }


}