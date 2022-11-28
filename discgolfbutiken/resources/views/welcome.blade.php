<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,


        a {
            color: inherit;
            text-decoration: inherit
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        main {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <main>
        <h1>Discgolfbutiken API</h1>
        <p>av Jessica Ejelöv, <a href="mailto:jeej2100@student.miun.se">jeej2100@student.miun.se</a></p>
        <p>Projektuppgift för kursen Fullstack-utveckling med ramverk på Mittuniversitetet.
            Skapad med Laravel och kräver autentisering med Sanctum. Du behöver alltså vara inloggad för att kunna använda APIet.</p>
        <h2>Om webbtjänsten</h2>
        <p>I denna webbtjänst lagras olika Discgolfbutikens produktlager.</p>
        <p>Denna webbtjänst är uppbyggd med Laravel och en MYSQL databas.</p>
        <h2>Databasen : installation och uppbyggnad</h2>
        <p>Ladda hem repot via:
            <code>git clone https://github.com/Webbutvecklings-programmet/projekt---webbtjanst-api-Jessofnorth</code>
        </p>
        <h3>ER-diagram för databsen</h3>
        <p>Produkter kan ha EN(1) Kategori(category), Märke(brand) och Rabatt(discount). Medans Kategorier, Märken och Rabatter kan ha FLERA produkter.</p>
        <img src="{{ asset('img/ERdiagram.jpg') }}" alt="ER-diagram">
        <h2>Klasser och metoder</h2>
        <h3>ProductController</h3>
        <h4>Metoder</h4>
        <ul>
            <li>Index - Hämtar alla Produkter från databasen samt adderar namnet för category, discount och brand för bättre utskrifter.</li>
            <li>Store (request) - Sparar anrop till databasen efter validering av anropet.</li>
            <li>Show (id) - Letar efter produkt i databasen med specifikt ID.</li>
            <li>Update (id) - Updaterar produkt i databasen med specifikt ID efter validering av anropet.</li>
            <li>Destroy (id) - Raderar produkt i databasen med specifikt ID.</li>
            <li>searchProductName - Tar sökordet och matchar mot produkternas namn.</li>
            <li>getProductsByCategory - Hämtar alla produkter från specifik kategori.</li>
            <li>getProductsByBrand - Hämtar alla produkter från specifikt märke.</li>
            <li>getProductsByDiscount - Hämtar alla produkter från specifik rabatt.</li>
            <li>calculateAmounts - Beräknar totala antalet discar på lager.</li>
        </ul>
        <hr>
        <h3>Användning</h3>
        <p>Nedan finns beskrivet hur man nå APIet på olika vis.</p>
        <table>
            <thead>
                <tr>
                    <th>Metod</th>
                    <th>Endpoint</th>
                    <th>Beskrivning</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>POST</td>
                    <td>/api/product</td>
                    <td>Lagrar en ny produkt.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/product</td>
                    <td>Hämtar alla tillgängliga produkter.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/product/2</td>
                    <td>Hämtar en specifik produkt med angivet ID (siffra).</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/product/category/2</td>
                    <td>Hämtar alla produkter i en specifik kategori angivet med ID.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/product/brand/2</td>
                    <td>Hämtar alla produkter från specifikt märke angivet med ID.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/product/discount/2</td>
                    <td>Hämtar alla produkter med en specifik rabatt angivet med ID.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/calculate</td>
                    <td>Hämtar totala antalet discar på lager.</td>
                </tr>
                <tr>
                    <td>PUT</td>
                    <td>/api/product/2</td>
                    <td>Uppdaterar en existerande produkt med angivet ID (siffra).</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/api/product/2</td>
                    <td>Raderar en produkt med angivet ID.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/search/product/*sökord* </td>
                    <td>Söker i produkters namn efter matchning mot sökordet. </td>
                </tr>
            </tbody>
        </table>
        <p>En produkt returneras/skickas som JSON med följande struktur:</p>

        <pre>{
  "name": "Fuse",
  "price": "179",
  "info": "En stabil midrange",
  "stock": "100",
  "category_id": "3",
  "brand_id": "1",
  "discount_id": "1",
  "img": "H3myyyHppQAC3kCDOVb7.jpg",
}</pre>

        <hr>
        <h3>DiscountController</h3>
        <h4>Metoder</h4>
        <ul>
            <li>Index - Hämtar alla rabatter från databasen.</li>
            <li>Store (request) - Sparar anrop till databasen efter validering av anropet.</li>
            <li>Show (id) - Letar efter rabatt i databasen med specifikt ID.</li>
            <li>Update (id) - Updaterar rabatt i databasen med specifikt ID efter validering av anropet.</li>
            <li>Destroy (id) - Raderar rabatt i databasen med specifikt ID.</li>
        </ul>
        <hr>
        <h3>Användning</h3>
        <p>Nedan finns beskrivet hur man nå APIet på olika vis.</p>
        <table>
            <thead>
                <tr>
                    <th>Metod</th>
                    <th>Endpoint</th>
                    <th>Beskrivning</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>POST</td>
                    <td>/api/discount</td>
                    <td>Lagrar en ny rabatt.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/discount</td>
                    <td>Hämtar alla tillgängliga rabatter.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/discount/2</td>
                    <td>Hämtar en specifik rabatt med angivet ID (siffra).</td>
                </tr>
                <tr>
                    <td>PUT</td>
                    <td>/api/discount/2</td>
                    <td>Uppdaterar en existerande rabatt med angivet ID (siffra).</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/api/discount/2</td>
                    <td>Raderar en rabatt med angivet ID.</td>
                </tr>
            </tbody>
        </table>
        <p>En rabatt returneras/skickas som JSON med följande struktur:</p>

        <pre>{
  "discount": "50"
}</pre>
        <hr>
        <h3>CategoryController</h3>
        <h4>Metoder</h4>
        <ul>
            <li>Index - Hämtar alla kategorier från databasen.</li>
            <li>Store (request) - Sparar anrop till databasen efter validering av anropet.</li>
            <li>Show (id) - Letar efter kategori i databasen med specifikt ID.</li>
            <li>Update (id) - Updaterar kategori i databasen med specifikt ID efter validering av anropet.</li>
            <li>Destroy (id) - Raderar kategori i databasen med specifikt ID.</li>
        </ul>
        <hr>
        <h3>Användning</h3>
        <p>Nedan finns beskrivet hur man nå APIet på olika vis.</p>
        <table>
            <thead>
                <tr>
                    <th>Metod</th>
                    <th>Endpoint</th>
                    <th>Beskrivning</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>POST</td>
                    <td>/api/category</td>
                    <td>Lagrar en ny kategori.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/category</td>
                    <td>Hämtar alla tillgängliga kategorier.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/category/2</td>
                    <td>Hämtar en specifik kategori med angivet ID (siffra).</td>
                </tr>
                <tr>
                    <td>PUT</td>
                    <td>/api/category/2</td>
                    <td>Uppdaterar en existerande kategori med angivet ID (siffra).</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/api/category/2</td>
                    <td>Raderar en kategori med angivet ID.</td>
                </tr>
            </tbody>
        </table>
        <p>En kategori returneras/skickas som JSON med följande struktur:</p>
        <pre>{
    "category" : "Midrange"
}
</pre>
        <hr>
        <h3>BrandController</h3>
        <h4>Metoder</h4>
        <ul>
            <li>Index - Hämtar alla märken från databasen.</li>
            <li>Store (request) - Sparar anrop till databasen efter validering av anropet.</li>
            <li>Show (id) - Letar efter märke i databasen med specifikt ID.</li>
            <li>Update (id) - Updaterar märke i databasen med specifikt ID efter validering av anropet.</li>
            <li>Destroy (id) - Raderar märke i databasen med specifikt ID.</li>
        </ul>
        <hr>
        <h3>Användning</h3>
        <p>Nedan finns beskrivet hur man nå APIet på olika vis.</p>
        <table>
            <thead>
                <tr>
                    <th>Metod</th>
                    <th>Endpoint</th>
                    <th>Beskrivning</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>POST</td>
                    <td>/api/brand</td>
                    <td>Lagrar ett nytt märke.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/brand</td>
                    <td>Hämtar alla tillgängliga märken.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/brand/2</td>
                    <td>Hämtar en specifik märke med angivet ID (siffra).</td>
                </tr>
                <tr>
                    <td>PUT</td>
                    <td>/api/brand/2</td>
                    <td>Uppdaterar en existerande märke med angivet ID (siffra).</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/api/brand/2</td>
                    <td>Raderar en märke med angivet ID.</td>
                </tr>
            </tbody>
        </table>
        <p>Ett märke returneras/skickas som JSON med följande struktur:</p>
        <pre> {
    "brand_name": "Latitude 64",
    "brand_phone": "0701234567",
    "brand_contact": "Jonathan",
    "brand_email": "jonathan@latitude64.com",
}
</pre>

        <hr>
        <h3>AuthController</h3>
        <h4>Metoder</h4>
        <ul>
            <li>Register - Registrera ny användare med namn, email och lösenord.</li>
            <li>Login - kontrollera att inloggningsuppgifter finns i databasen och skicak med token som svar.</li>
            <li>Logout - logga ut användare genom att förstöra token.</li>
        </ul>
        <hr>
        <h3>Användning</h3>
        <p>Nedan finns beskrivet hur man nå APIet på olika vis.</p>
        <table>
            <thead>
                <tr>
                    <th>Metod</th>
                    <th>Endpoint</th>
                    <th>Beskrivning</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>POST</td>
                    <td>/api/logout</td>
                    <td>Loggar ut användare.</td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>/api/login</td>
                    <td>Loggar in användare.</td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>/api/register</td>
                    <td>Registrera ny användare.</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>/api/users</td>
                    <td>Hämta alla användare.</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/api/usrs/2</td>
                    <td>Radera användare med specifikt id.</td>
                </tr>
            </tbody>
        </table>
        <p>Ett inlogg returneras/skickas som JSON med följande struktur:</p>
        <pre> {
    "email": "user@email.com",
    "password": "password",
    
}
</pre>
        <p>Registrera ny användare returneras/skickas som JSON med följande struktur:</p>
        <pre> {
            "name" : "Name",
    "email": "user@mail.com",
    "password": "password",
    
}
</pre>
        <hr>

    </main>
</body>

</html>