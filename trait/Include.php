<?php
trait HelloWorld
{
    public function includeWithVariables($filePath, $variables = array(), $print = true)
    {
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
        if (!$print) {
            return $output;
        }
        echo $output;
    }
}