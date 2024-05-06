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
  $imgTitle = "A beautiful place.";
  $imgDescription = ["Cannot found more infos about this place for now. Please try later or refresh the page."];
  if ($currentFile === "." || $currentFile === ".." || $currentFile === ".DS_Store") continue;
  $extension = pathinfo($currentFile, PATHINFO_EXTENSION);
  if (!in_array($extension, $ALLOWED_EXTENSIONS)) continue;
  // $textfilename = str_ireplace($extension, "txt", $currentFile);
  // or
  $textfilename = pathinfo($currentFile, PATHINFO_FILENAME) . ".txt";
  if (!file_exists(__DIR__ . "/images/$textfilename")) continue;
  $text = file_get_contents(__DIR__ . "/images/$textfilename");
  $titleIdx = stripos($text, "\n", 0);
  $imgTitle = substr($text, 0, $titleIdx);
  $imgDescription = substr($text, $titleIdx);
  $images[$imgTitle] = [
    "location" => $currentFile,
    "description" => explode("\n", $imgDescription),
  ];
}
closedir($handle);

?>

<?php foreach ($images as $title => $image) : ?>
  <figure>
    <h3><?php e($title) ?></h3>
    <img src="images/<?php echo rawurlencode($image["location"]); ?>" alt="A nice view of <?php e($title) ?>">
    <figcaption>
      <?php foreach ($image['description'] as $description) : ?>
        <p><?php e($description) ?></p>
      <?php endforeach; ?>
    </figcaption>
  </figure>
<?php endforeach; ?>

<?php require_once __DIR__ . "/views/footer.html" ?>
