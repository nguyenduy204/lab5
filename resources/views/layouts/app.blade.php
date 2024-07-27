<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <style>
 /* public/css/app.css */

.card {
    border-radius: 10px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    height: 200px;
    object-fit: cover;
}

.card-body {
    display: flex;
    flex-direction: column;
}

.badge {
    font-size: 0.85em;
}

.alert {
    font-size: 1rem;
}

.table-hover tbody tr:hover {
    background-color: #f5f5f5;
}


    </style>
    <title>Laravel Application</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
