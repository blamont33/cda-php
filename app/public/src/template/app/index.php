<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=m, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    My name is {{ name }}

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {% for product in products %}
            <tr>
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td>
                    <form action="/cart/add" method="post">
                        <input type="hidden" name="product" value="{{ product.id }}">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                    <a href="/product/edit?id={{ product.id }}">Edit</a>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</body>
</html>