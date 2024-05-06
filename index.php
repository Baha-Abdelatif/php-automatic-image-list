<?php require_once __DIR__ . "/views/header.html";
require_once __DIR__ . "/inc/functions.php";

$handle = opendir(__DIR__ . '/images');
$images = [];

while (($currentFile = readdir($handle)) !== false) {
  if ($currentFile === "." || $currentFile === ".." || $currentFile === ".DS_Store") continue;
  $extension = pathinfo($currentFile, PATHINFO_EXTENSION);
  if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png") continue;
  $images[] = $currentFile;
}
closedir($handle);
?>

<ul>
  <?php foreach ($images as $image) : ?>
    <li><img src="images/<?php echo rawurlencode($image); ?>" alt="an interesting point of view"></li>
  <?php endforeach; ?>
</ul>

<?php require_once __DIR__ . "/views/footer.html" ?>
