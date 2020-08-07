<?php

if (isset($_FILES['image'])) {

$file_name = $_FILES['image']['name'];
$temp_file_location = $_FILES['image']['tmp_name'];

require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$s3 = new Aws\S3\S3Client([
	'region' => 'us-east-1',
	'version' => 'latest',
	'credentials' => [
	    'key' => "AKIAIFWRJIKGOBACEJVQ",
	    'secret' => "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",
	]


]);

$result = $s3->putObject([
	'Bucket' => 'demodropboxuser1',
	'Key' => $file_name,
	'SourceFile' => $temp_file_location
]);

var_dump($result);
}

?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
	<input type="file" name="image" />
	<input type="submit"/>
</form>
