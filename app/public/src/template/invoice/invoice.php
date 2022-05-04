<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>
    <tbody>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    {% for product in products %}
        <tr>
            <td>{{product.product.id}}</td>
            <td>{{product.product.name}}</td>
            <td>{{product.product.price}}</td>
            <td>{{product.quantity}}</td>
            <td>{{product.quantity * product.product.price}}</td>
    </tr>    
    {% endfor %}
    <tbody>
<table>

Total = {{total}}

</body>
</html>