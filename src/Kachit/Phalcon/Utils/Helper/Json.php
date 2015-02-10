<?php
/**
 * Helper for works with json serializes
 *
 * @author Kachit
 * @package Kachit\Phalcon\Utils\Helper
 */
namespace Kachit\Phalcon\Utils\Helper;

use Kachit\Phalcon\Utils\PhpVersion;

class Json {
    /**
     * @var bool
     */
    protected $isPhp54Support = false;
    /**
     * @var bool
     */
    protected $isPhp55Support = false;
    /**
     * @var array
     */
    protected $optionsDecode = [];
    /**
     * @var bool
     */
    protected $decodeAsArray = true;
    /**
     * @var int
     */
    protected $decodeDepth = 512;

    /**
     * @var int
     */
    protected $encodeDepth = 512;

    /**
     * @var array
     */
    protected $optionsEncode = [];

    /**
     * Init
     */
    public function __construct() {
        $this->isPhp54Support = PhpVersion::compare('5.4.0');
        $this->isPhp55Support = PhpVersion::compare('5.5.0');
        $this->optionsDecode = $this->getDecodeOptions();
        $this->optionsEncode = $this->getEncodeOptions();
    }

    /**
     * Decode json string to value
     *
     * @param string $jsonString
     * @return mixed
     */
    public function decode($jsonString) {
        $value = json_decode($jsonString, $this->decodeAsArray, $this->decodeDepth, $this->generateDecodeOptions());
        $this->checkJsonErrors();
        return $value;
    }

    /**
     * Encode value to json string
     *
     * @param mixed $value
     * @return string
     */
    public function encode($value) {
        $value = $this->prepareValueForEncode($value);
        $jsonString = json_encode($value, $this->generateEncodeOptions(), $this->encodeDepth);
        $this->checkJsonErrors();
        return $jsonString;
    }

    /**
     * SSet encode option JSON_HEX_TAG
     *
     * @param bool $value
     * @return $this
     */
    public function setEncodeOptionHexTag($value = true) {
        return $this->setEncodeValue(JSON_HEX_TAG, $value);
    }

    /**
     * SSet encode option JSON_HEX_AMP
     *
     * @param bool $value
     * @return $this
     */
    public function setEncodeOptionHexAmp($value = true) {
        return $this->setEncodeValue(JSON_HEX_AMP, $value);
    }

    /**
     * Set encode option JSON_HEX_APOS
     *
     * @param bool $value
     * @return $this
     */
    public function setEncodeOptionHexApos($value = true) {
        return $this->setEncodeValue(JSON_HEX_APOS, $value);
    }

    /**
     * Set encode option JSON_HEX_QUOT
     *
     * @param bool $value
     * @return $this
     */
    public function setEncodeOptionHexQuot($value = true) {
        return $this->setEncodeValue(JSON_HEX_QUOT, $value);
    }

    /**
     * Set encode option JSON_FORCE_OBJECT
     *
     * @param bool $value
     * @return $this
     */
    public function setEncodeOptionForceObject($value = true) {
        return $this->setEncodeValue(JSON_FORCE_OBJECT, $value);
    }

    /**
     * Set encode option JSON_NUMERIC_CHECK
     *
     * @param bool $value
     * @return $this
     */
    public function setEncodeOptionNumericCheck($value = true) {
        return $this->setEncodeValue(JSON_NUMERIC_CHECK, $value);
    }

    /**
     * Set encode options
     *
     * @param array $options
     * @return $this
     */
    public function setEncodeOptions(array $options) {
        foreach ($options as $key) {
            $this->setEncodeValue($key, true);
        }
        return $this;
    }

    /**
     * Check json encoding errors
     *
     * @throws \Exception
     */
    protected function checkJsonErrors() {
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception(json_last_error_msg());
        }
    }

    /**
     * Set decode as array
     *
     * @return $this;
     */
    public function setDecodeAsArray() {
        $this->decodeAsArray = true;
        return $this;
    }

    /**
     * Set decode as object
     *
     * @return $this;
     */
    public function setDecodeAsObject() {
        $this->decodeAsArray = false;
        return $this;
    }

    /**
     * Set decode depth
     *
     * @param int $decodeDepth
     * @return $this;
     */
    public function setDecodeDepth($decodeDepth) {
        $this->decodeDepth = (int)$decodeDepth;
        return $this;
    }

    /**
     * Get decode options
     *
     * @return int
     */
    protected function generateDecodeOptions() {
        return $this->generateOptions($this->optionsDecode);
    }

    /**
     * Generate options list
     *
     * @param array $optionsList
     * @return int
     */
    protected function generateOptions(array $optionsList) {
        $options = 0;
        foreach ($optionsList as $option => $state) {
            if ($state) {
                $options = $options | $option;
            }
        }
        return $options;
    }

    /**
     * Get encode options
     *
     * @return int
     */
    protected function generateEncodeOptions() {
        return $this->generateOptions($this->optionsEncode);
    }

    /**
     * Get decode options
     *
     * @return array
     */
    protected function getDecodeOptions() {
        $options = [
            JSON_BIGINT_AS_STRING => false,
        ];
        return $options;
    }

    /**
     * Get encode options
     *
     * @return array
     */
    protected function getEncodeOptions() {
        $options = [
            JSON_HEX_TAG => false,
            JSON_HEX_AMP => false,
            JSON_HEX_APOS => false,
            JSON_HEX_QUOT => false,
            JSON_FORCE_OBJECT => false,
            JSON_NUMERIC_CHECK => false,
        ];
        if ($this->isPhp54Support) {
            $options[JSON_BIGINT_AS_STRING] = false;
            $options[JSON_PRETTY_PRINT] = true;
            $options[JSON_UNESCAPED_SLASHES] = true;
            $options[JSON_UNESCAPED_UNICODE] = true;
        }
        return $options;
    }

    /**
     * Set encode value
     *
     * @param int $optionKey
     * @param bool $value
     * @return $this
     */
    protected function setEncodeValue($optionKey, $value) {
        $this->optionsEncode[$optionKey] = (bool)$value;
        return $this;
    }

    /**
     * Set decode value
     *
     * @param int $optionKey
     * @param bool $value
     * @return $this
     */
    protected function setDecodeValue($optionKey, $value) {
        $this->optionsDecode[$optionKey] = (bool)$value;
        return $this;
    }

    /**
     * Prepare value for encode
     *
     * @param mixed $value
     * @return array
     */
    protected function prepareValueForEncode($value) {
        if (!is_array($value) || !is_object($value)) {
            $value = (array)$value;
        }
        return $value;
    }
}