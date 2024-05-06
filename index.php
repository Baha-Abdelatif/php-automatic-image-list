<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
  <link rel="stylesheet" type="text/css" href="./styles/custom.css" />
  <title>Document</title>
</head>

<body>
  <header>
    <h1>Automatic Image List</h1>
  </header>
  <main>
    <pre><?php
          $handle = opendir(__DIR__ . '/images');
          var_dump($handle);
          var_dump(readdir($handle));
          var_dump(readdir($handle));
          var_dump(readdir($handle));
          var_dump(readdir($handle));
          var_dump(readdir($handle));
          var_dump(readdir($handle));
          var_dump(readdir($handle));
          closedir($handle);
          ?></pre>
  </main>
</body>

</html>
