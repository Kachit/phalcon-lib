<?php
/**
 * Replacer
 *
 * @author Kachit
 */
namespace Kachit\Phalcon\Assets\Filters;

use Phalcon\Assets\FilterInterface;

class Replacer implements FilterInterface{

    const SYMBOL_OPEN_DEFAULT = '{%';
    const SYMBOL_CLOSE_DEFAULT = '%}';

    /**
     * @var string
     */
    private $symbolOpen = self::SYMBOL_OPEN_DEFAULT;

    /**
     * @var string
     */
    private $symbolClose = self::SYMBOL_CLOSE_DEFAULT;

    /**
     * @var array
     */
    private $data = [];

    /**
     * filter
     *
     * @param string $content
     * @return string
     */
    public function filter($content) {
        if ($this->data) {
            $data = $this->prepareData();
            $content = str_replace(array_keys($data), array_values($data), $content);

        }
        return $content;
    }

    /**
     * Set SymbolOpen
     *
     * @param string $symbolOpen
     * @return $this;
     */
    public function setSymbolOpen($symbolOpen) {
        $this->symbolOpen = $symbolOpen;
        return $this;
    }

    /**
     * Set SymbolClose
     *
     * @param string $symbolClose
     * @return $this;
     */
    public function setSymbolClose($symbolClose) {
        $this->symbolClose = $symbolClose;
        return $this;
    }

    /**
     * Set Data
     *
     * @param array $data
     * @return $this;
     */
    public function setData(array $data) {
        $this->data = $data;
        return $this;
    }

    /**
     * prepareData
     *
     * @return array
     */
    protected function prepareData() {
        $data = [];
        foreach ($this->data as $key => $value) {
            $data[$this->prepareKey($key)] = $this->prepareValue($value);
        }
        return $data;
    }

    /**
     * prepareKey
     *
     * @param $key
     * @return string
     */
    protected function prepareKey($key) {
        return "'" . $this->symbolOpen . $key . $this->symbolClose . "'";
    }

    /**
     * prepareValue
     *
     * @param $value
     * @return mixed
     */
    protected function prepareValue($value) {
        switch(gettype($value)) {
            case 'string':
            default:
                $value = "'" . $value . "'";
                break;
            case 'object':
            case 'array':
                $value = json_encode($value);
                break;
            case 'NULL':
                $value = 'null';
                break;
            case 'boolean':
                $value = ($value) ? 'true' : 'false';
                break;
        }
        return $value;
    }
}