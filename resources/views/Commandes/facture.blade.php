<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Facture {{ $commande->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 15px;
            text-align: left;
            font-size: 16px;
        }
        table, th, td {
            padding: 15px;
            font-size: 14px;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .border{
            border-bottom: #5C6AC4 solid 3px;
        }
        .text-end {
            text-align: right;
        }

        .bg-blue {
            background-color: #5C6AC4;
            color: #fff;
        }

        .product th{
            color: #5C6AC4;
        }
        .main{
            padding: 50px;
            border-bottom: #EBEBED 1px solid;
        }
    </style>
</head>
<body>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="width: 50%;">
                    <h2 style="font-size: 20px;">CRUD Ecommerce</h2>
                </th>
                <th style="width: 50%; text-align: right; font-size: 14px;">
                    <div>
                        <span style="display: block; font-weight: bold;">Facture Id: #{{ $commande->id }}</span>
                        <span style="color: #AFB3C1;">Date: {{ $commande->dateCommande }}</span>
                    </div>
                </th>
            </tr>
        </thead>
    </table>
    
<div style="background-color: #F1F7F9; padding: 10px; margin-bottom: 20px;">
    <div style="width: 100%; padding: 10px; font-family: Arial, sans-serif; border-radius: 5px;">
        <div style="display: inline-block; width: 48%; vertical-align: top; text-align: left;">
            <h6 style="margin: 0; font-size: 16px; font-weight: bold;">Informations client</h6>
            <p style="margin: 5px 0 0 0; font-size: 14px; line-height: 1.6; color: #6c757d;">
                {{ $commande->client->nom }} {{ $commande->client->prenom }}<br>
                {{ $commande->client->tel }}<br>
                {{ $commande->client->email }}<br>

            </p>
        </div>
        <div style="display: inline-block; width: 48%; vertical-align: top; text-align: right;">
            <h6 style="margin: 0; font-size: 16px; font-weight: bold;">Informations commande</h6>
            <p style="margin: 5px 0 0 0; font-size: 14px; line-height: 1.6; color: #6c757d;">
                Date: {{ $commande->dateCommande }}<br>
                État: {{ $commande->etat }}<br>
            </p>
        </div>
    </div>
</div> 
    

    <table class="product">
        <thead>
            <tr class="border">
                <th>ID</th>
                <th>Details produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commande->produits as $produit)
                <tr class="main">
                    <td width="10%">{{ $produit-> id }}.</td>
                    <td>
                        {{ $produit-> nom }}
                    </td>
                    <td width="20%">{{ $produit-> prix }} DHS</td>
                    <td width="10%">{{ $produit->pivot-> quantite }}</td>
                    <td width="20%" class="fw-bold">{{ $produit->pivot-> quantite * $produit-> prix }} DHS</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td colspan="1" class="bg-blue text-end total-heading">Total :</td>
                <td colspan="1" class="bg-blue total-heading">{{ $total }} DHS</td>
            </tr>
        </tfoot>
    </table>


    <div style="width: 80%; font-family: Arial, sans-serif; margin: auto; font-size: 12px; color: #6c757d; text-align: center; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);">
        <hr style="border: 0.5px solid #e9ecef; margin-bottom: 10px;">
        <p style="margin: 0;">
            CRUD Ecommerce | n°10 Bd zahi, 20230, Casablanca<br>
            Phone: +212 643 906 090 | Email: info@crudecommerce.com | Website: www.crudecommerce.com
        </p>
    </div>
    
    
</body>
</html>