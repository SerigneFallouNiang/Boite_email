<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation - Idée Enregistrée</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f8fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        p {
            color: #34495e;
            margin-bottom: 30px;
        }
        .success-icon {
            color: #2ecc71;
            font-size: 48px;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">&#10004;</div>
        <h1>Idée enregistrée avec succès</h1>
        <p>Votre idée a été enregistrée et un email de confirmation a été envoyé. Merci pour votre contribution !</p>
        <a href="{{ route('idees.index') }}" class="btn">Retour à la liste des idées</a>
    </div>
</body>
</html>