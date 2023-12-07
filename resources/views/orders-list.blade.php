<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <td>Numéro de commande</td>
                <td>Status</td>
                <td>Client</td>
                <td>Quantité</td>
                <td><a href="/orders/create" class="btn btn-primary">+</a></td>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->orderNumber}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->customer->contactFirstName}} {{$order->customer->contactLastName}}</td>
                    <td>({{sizeof($order->orderdetails)}})</td>
                    <td>
                        <a class="btn btn-primary" href="/orders/{{$order->orderNumber}}">Voir la page de détail</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-4">
    <!-- Votre contenu de la liste des commandes ici -->

    <div class="mt-4">
        @if ($orders->hasPages())
            <ul class="pagination">
                {{-- Page précédente --}}
                @if ($orders->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&laquo; @lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $orders->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo; @lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Page suivante --}}
                @if ($orders->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $orders->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">@lang('pagination.next') &raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">@lang('pagination.next') &raquo;</span>
                    </li>
                @endif
            </ul>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
