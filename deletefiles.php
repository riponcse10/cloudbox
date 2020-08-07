<?php
    $file_name = $_GET['file_name'];
    $bucket_name = $_GET['bucket_name'];
echo $file_name;
echo $bucket_name;
    require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$s3Client = new S3Client([
	'region' => 'us-east-1',
	'version' => 'latest',
	'credentials' => [
	    'key' => "AKIAIFWRJIKGOBACEJVQ",
	    'secret' => "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",
	]	
]);

$s3Client->deleteObject([
    'Bucket' => $bucket_name,
    'Key' => $file_name
]);

header("Location: uploadnew.php");
?>
