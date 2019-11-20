<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facade</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.css">
</head>

<body>
    <?php

    $dir = dirname(__FILE__);

    $filesContent = [];

    function read($file)
    {
        if (file_exists($file)) {
            $handle = @fopen($file, 'r');
            while (($line = fgets($handle)) !== false) {
                yield $line;
            }
        }
        return [];
    }

    function removeDots($prev, $current)
    {
        if (!in_array($current, ['.', '..']))
            return array_merge($prev, [$current]);
        return $prev;
    }

    function  setNamespace(string $namespase = "", $classesFiles)
    {
        foreach ($classesFiles as $key => $value) {
            $classesFiles[$key] = $namespase . '/' . $value;
        }
        return $classesFiles;
    }

    if ($filesInDir = scandir($dirClasses = $dir . '/../classes')) {

        $files = array_merge(setNamespace($dirClasses, array_reduce($filesInDir, 'removeDots', [])), [$dir . '/../index.php']);

        foreach ($files as $file) {
            $content = "";
            foreach (read($file) as $line) :
                $content .= $line;
            endforeach;
            array_push($filesContent, [
                'filename' => $file,
                'length' => strlen($content),
                'content' => $content
            ]);
        }
    }
    ?>
    <?php
    foreach ($filesContent as $key => $details) :
        echo "<section><p>{$details['filename']}</p><textarea name=\"code-$key\" id=\"code-$key\" cols=\"30\" rows=\"10\"></textarea></section>";
    endforeach;
    ?>


    <!-- <section>
        <textarea name="code-1" id="code-1" cols="30" rows="10"></textarea>
    </section>
    <script>
        var editor = CodeMirror.fromTextArea(document.querySelector('#code-1'), {
            lineNumbers: true
        });
    </script> -->
</body>

</html>
