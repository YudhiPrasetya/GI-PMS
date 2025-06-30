<?php
class Curl
{

    public function __construct()
    {
        // Initialize any resources here if needed
    }

    // Send a simple GET request
    public function simple_get($url)
    {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request and capture the response
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            // Handle error, possibly log it
            log_message('error', 'cURL error: ' . curl_error($ch));
        }

        // Close the cURL session
        curl_close($ch);

        // Return the response
        return $response;
    }

    // Send a POST request
    public function post($url, $data)
    {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options for POST request
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request and capture the response
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            // Handle error
            log_message('error', 'cURL error: ' . curl_error($ch));
        }

        // Close the cURL session
        curl_close($ch);

        // Return the response
        return $response;
    }
}
