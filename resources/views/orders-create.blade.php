<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Créer une Commande</title>
</head>
<body>

<div class="container mt-4">
    <form action="/orders/create" method="post">
        @csrf
        <div class="form-group">
            <label for="orderNumber">Numéro de commande</label>
            <input type="text" class="form-control" name="orderNumber" id="orderNumber">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status" id="status">
        </div>
        <div class="form-group">
            <label for="comments">Commentaires</label>
            <textarea class="form-control" name="comments" id="comments" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="customerNumber">Numéro de client</label>
            <select class="form-control" name="customerNumber" id="customerNumber">
                @foreach($customers as $customer)
                    <option value="{{$customer->customerNumber}}">{{$customer->contactLastName}} {{$customer->contactFirstName}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Créer la commande</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
