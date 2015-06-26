<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

// Name of the file
$filename = 'sql/articlerequest.sql';
// MySQL host
$db_host = 'localhost';
// MySQL username
$db_user = 'root';
// MySQL password
$db_pass = '';
// Database name
$db_database = 'articlerequest';

$hostString = "mysql:host={$db_host};dbname={$db_database};charset=utf8";
$pdo = new PDO($hostString, $db_user,$db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

// Add this line to the current segment
    $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        try {
            // Perform the query
            $query = $pdo->prepare($templine);
            $query->execute();
        } catch (PDOException $ex) {
            print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
            exit(1);
        }
        // Reset temp variable to empty
        $templine = '';
    }
}
echo "Tables imported successfully";
?>