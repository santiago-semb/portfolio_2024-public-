<?php
class Dotenv {    
    protected $filePath;
    protected $entries = [];

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function load() {
        $this->entries = [];

        if (!file_exists($this->filePath)) {
            throw new Exception("File not found: {$this->filePath}");
        }

        foreach (file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = $this->normalizeEnvironmentVariable($line);

            if (!array_key_exists($name, $this->entries)) {
                $this->entries[$name] = $value;
            }
        }

        foreach ($this->entries as $name => $value) {
            putenv("{$name}={$value}");
            $GLOBALS[$name] = $value;
        }

        return $this->entries;
    }

    protected function normalizeEnvironmentVariable($line) {
        list($name, $value) = array_pad(explode('=', $line, 2), 2, null);
        $name = trim($name);

        if (!is_string($value) && is_null($value)) {
            $value = '';
        } else {
            $value = trim($value);
        }

        return [$name, $value];
    }
}
