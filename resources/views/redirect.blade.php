<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect to New Tab</title>
</head>
<body>

    <script>
       
        // Open the URL in a new tab
        window.open('http://localhost:3000/{{ $userToken }}', '_blank');
        location.href = '/EmployeeHome'
    </script>

</body>
</html>
