<?php

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

$buckets = $s3Client->listBuckets();
foreach ($buckets['Buckets'] as $bucket) {
	echo $bucket['Name'] . "\n";
}

$BUCKET_NAME = 'new-bucket-dropboxabcd1005107';

try {
    $result = $s3Client->createBucket([
	'Bucket' => $BUCKET_NAME,
    ]);
} catch (AwsException $e) {
    echo $e->getMessage();
    echo "\n";
}

$policy = json_encode( array (
	'Version' => '2012-10-17',  
	'Statement' => array(
				array('Resource' => "arn:aws:s3:::$BUCKET_NAME/*",  
				'Action' => 's3:*', 
				'Principal' => '*', 
				'Effect' => 'Allow',
				'Sid' => 'AddPerm')
	)));

print($policy);
try {
    $result = $s3Client->putBucketPolicy([
	'Bucket' => $BUCKET_NAME,
	'Policy' => $policy, 
    ]);
} catch(AwsException $e) {
    echo $e->getMessage();
    echo "\n";
}
?>
