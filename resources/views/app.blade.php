<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMSU Facilities</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if(auth()->check())
            <AdminDashboard />
        @else
            <App />
        @endif
    </div>
    
    <script>
        window.authenticated = @json(auth()->check());
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
