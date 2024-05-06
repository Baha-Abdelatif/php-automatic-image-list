<?php require_once __DIR__ . "/views/header.html";
require_once __DIR__ . "/inc/functions.php";

$ALLOWED_EXTENSIONS = [
  "jpg",
  "png",
  "jpeg",
];
$images = [];

$handle = opendir(__DIR__ . '/images');
while (($currentFile = readdir($handle)) !== false) {
  if ($currentFile === "." || $currentFile === ".." || $currentFile === ".DS_Store") continue;
  $extension = pathinfo($currentFile, PATHINFO_EXTENSION);
  if (!in_array($extension, $ALLOWED_EXTENSIONS)) continue;
  $textfilename = str_ireplace($extension, "txt", $currentFile);
  $text = file_get_contents(__DIR__ . "/images/$textfilename");
  $titleIdx = stripos($text, "\n", 0);
  $imgTitle = substr($text, 0, $titleIdx);
  $imgDescription = substr($text, $titleIdx);
  $images[$imgTitle] = [
    "location" => $currentFile,
    "description" => $imgDescription,
  ];
}
closedir($handle);

?>

<?php foreach ($images as $title => $image) : ?>
  <h3><?php e($title) ?></h3>
  <img src="images/<?php echo rawurlencode($image["location"]); ?>" alt="an interesting point of view">
  <p><?php e($image['description']) ?></p>
<?php endforeach; ?>

<?php require_once __DIR__ . "/views/footer.html" ?>
