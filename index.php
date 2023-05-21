<?php

function isAccepted($word)
{
    $currentState = 0;
    $wordLength = strlen($word);

    for ($i = 0; $i < $wordLength; $i++) {
        $char = $word[$i];

        if ($currentState === 0) {
            if ($char === 'b') {
                $currentState = 1;
            } else {
                return false;
            }
        } elseif ($currentState === 1) {
            if ($char === 'a' || $char === 'b') {
                $currentState = 2;
            } else {
                return false;
            }
        } elseif ($currentState === 2) {
            if ($char === 'b') {
                $currentState = 2;
            } else {
                return false;
            }
        }
    }

    return $currentState === 2;
}

// Test the function with example words

$word = isset($_POST['word']) ? $_POST['word'] : '';

if (!empty($word)) {
    $result = isAccepted($word) ? "Accepted" : "Not Accepted";
    $output = "Word: " . $word . "<br>Status: " . $result;
} else {
    $output = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>NFA Word Tester</title>
    <style>
        html{
            background-image: url("https://dm0qx8t0i9gc9.cloudfront.net/thumbnails/video/GTYSdDW/videoblocks-abstract-simple-blue-waving-3d-grid-or-mesh-as-sci-fi-landscape-blue-geometric-vibrating-environment-or-pulsating-math-background_hyfuqfeakz_thumbnail-1080_01.png");
        } 
        body {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            margin :4% auto;
            text-align: center;
            border: 1px solid #ccc;
            padding: 40px;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        h1 {
            margin-top: 0;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 200px;
        }

        button[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            font-weight: bold;
            margin-bottom: 20px;
        }

        img {
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>NFA Word Tester</h1>
        <p>
            The following NFA accepting language b (a + b) b*. <br>
            Examples of the accepted words are:<br>
            ba<br>
            bb<br>
            babb<br>
            bbbb<br> 
        </p>
        <img src="images.png">
        <form method="post">
            <label for="word">Enter a word:</label> <br>
            <input type="text" name="word" id="word" required>
            <button type="submit">Check</button>
        </form>
        <div class="result">
            <?php echo $output; ?>
        </div>
    </div>
</body>
</html>