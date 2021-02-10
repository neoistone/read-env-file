<?php

namespace neoistone\core;

class ns_env {
    
    
    /**
     * env to array file storage
     *
     * @param $envPath
     */
    public static function envToArray(string $envPath)
    {
        $variables = [];
        $mread = fopen($envPath, "r");
        $content = fread($mread,filesize($envPath));
        fclose($mread);
        $lines = explode("\n", $content);
        if($lines) {
            foreach($lines as $line) {
                // If not an empty line then parse line
                if($line !== "") {
                    // Find position of first equals symbol
                    $equalsLocation = strpos($line, '=');

                    // Pull everything to the left of the first equals
                    $key = substr($line, 0, $equalsLocation);

                    // Pull everything to the right from the equals to end of the line
                    $value = substr($line, ($equalsLocation + 1), strlen($line));

                    $variables[$key] = $value;

                } else {
                    $variables[] = "";
                }
            }
        }
        return $variables;
    }
  
    /**
     * Array to .env file storage
     *
     * @param $array
     * @param $envPath
     */
    public static function arrayToEnv(array $array, string $envPath)
    {
        $env = "";
        $position = 0;
        foreach($array as $key => $value) {
            $position++;
            // If value isn't blank, or key isn't numeric meaning not a blank line, then add entry
            if($value !== "" || !is_numeric($key)) {
                // If passed in option is a boolean (true or false) this will normally
                // save as 1 or 0. But we want to keep the value as words.
                if(is_bool($value)) {
                    if($value === true) {
                        $value = "true";
                    } else {
                        $value = "false";
                    }
                }

                // Always convert $key to uppercase
                $env .= strtoupper($key) . "=" . $value;

                // If isn't last item in array add new line to end
                if($position != count($array)) {
                   $env .= "\n";
                }
            } else {
                $env .= "\n";
            }
        }
        $mwrite = fopen($envPath, "w");
        fwrite($mwrite, $env);
        fclose($mwrite);
    }
    /**
     * Json to .env file storage
     *
     * @param $json
     * @param $envPath
     */
    public static function JsonToEnv(array $json, string $envPath)
    {
        $env = "";
        $position = 0;
        $array = json_decode($json,true);
        foreach($array as $key => $value) {
            $position++;
            // If value isn't blank, or key isn't numeric meaning not a blank line, then add entry
            if($value !== "" || !is_numeric($key)) {
                // If passed in option is a boolean (true or false) this will normally
                // save as 1 or 0. But we want to keep the value as words.
                if(is_bool($value)) {
                    if($value === true) {
                        $value = "true";
                    } else {
                        $value = "false";
                    }
                }

                // Always convert $key to uppercase
                $env .= strtoupper($key) . "=" . $value;

                // If isn't last item in array add new line to end
                if($position != count($array)) {
                   $env .= "\n";
                }
            } else {
                $env .= "\n";
            }
        }
        $mwrite = fopen($envPath, "w");
        fwrite($mwrite, $env);
        fclose($mwrite);
    }
    /**
     * XML to .env file storage
     *
     * @param $json
     * @param $envPath
     */
    public static function XmlToEnv(array $xml, string $envPath)
    {
        $env = "";
        $position = 0;
        $array = simplexml_load_string($xml);
        foreach($array as $key => $value) {
            $position++;
            // If value isn't blank, or key isn't numeric meaning not a blank line, then add entry
            if($value !== "" || !is_numeric($key)) {
                // If passed in option is a boolean (true or false) this will normally
                // save as 1 or 0. But we want to keep the value as words.
                if(is_bool($value)) {
                    if($value === true) {
                        $value = "true";
                    } else {
                        $value = "false";
                    }
                }

                // Always convert $key to uppercase
                $env .= strtoupper($key) . "=" . $value;

                // If isn't last item in array add new line to end
                if($position != count($array)) {
                   $env .= "\n";
                }
            } else {
                $env .= "\n";
            }
        }
        $mwrite = fopen($envPath, "w");
        fwrite($mwrite, $env);
        fclose($mwrite);
    }
}
?>
