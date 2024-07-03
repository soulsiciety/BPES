<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona Slide</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .persona-slide {
            background: white;
            width: 80%;
            max-width: 1000px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: repeat(4, auto);
            gap: 20px;
        }

        .identity {
            grid-column: 1 / 2;
            grid-row: 1 / 3;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #d9a588;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            color: white;
        }

        .identity img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .section {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            margin-top: 0;
        }

        .product-preferences {
            display: flex;
            flex-direction: column;
        }

        .product-preferences div {
            margin: 10px 0;
        }

        .chart,
        .graph {
            background-color: #e9e9e9;
            height: 100px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="persona-slide">
        <div class="identity">
            <div>
                <img src="image.png" alt="Persona Image">
                <h1>Persona Identity</h1>
            </div>
        </div>
        <div class="section description">
            <h2>Description</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
        </div>
        <div class="section story">
            <h2>Story</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
        </div>
        <div class="section product-preferences">
            <h2>Product Preferences</h2>
            <div class="chart"></div>
            <div class="graph"></div>
        </div>
        <div class="section persona-problems">
            <h2>Persona Problems</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
        </div>
        <div class="section persona-needs">
            <h2>Persona Needs</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
        </div>
    </div>
</body>

</html>
