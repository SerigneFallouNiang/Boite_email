<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Idée Innovante Reçue</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f4f8;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 15px;
            text-align: center;
            font-size: 28px;
        }
        .intro {
            background-color: #e8f6fc;
            border-left: 5px solid #3498db;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 0 8px 8px 0;
            font-style: italic;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.2s ease-in-out;
        }
        li:hover {
            transform: translateY(-3px);
        }
        strong {
            color: #2980b9;
            display: block;
            margin-bottom: 8px;
            font-size: 18px;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 30px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .btn {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 12px 20px;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            text-align: center;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nouvelle Idée Innovante Reçue !</h1>
        <div class="intro">
            <p>Nous sommes enchantés de vous informer qu'une nouvelle idée créative a été soumise sur notre plateforme d'innovation. Cette proposition pourrait révolutionner notre approche et ouvrir de nouvelles perspectives. Découvrez les détails de cette idée inspirante :</p>
        </div>
        <ul>
            <li><strong>Nom de l'innovateur</strong> {{ $idee['nom'] }}</li>
            <li><strong>Email</strong> {{ $idee['email'] }}</li>
            <li><strong>Description de l'idée</strong> {{ $idee['description'] }}</li>
        </ul>
        <p>Cette idée mérite toute notre attention et pourrait être le catalyseur d'améliorations significatives ou de nouvelles opportunités pour notre organisation.</p>
        <img src="https://example.com/path/to/idea-image.jpg" alt="Illustration d'une idée innovante" title="Une ampoule représentant une nouvelle idée brillante">
        <p>Nous vous encourageons vivement à explorer cette idée plus en profondeur. N'hésitez pas à contacter l'auteur pour obtenir plus de détails ou pour discuter de sa mise en œuvre potentielle.</p>
        <a href="https://votre-application-url.com" class="btn">Accéder à l'Application</a>
    </div>
</body>
</html>