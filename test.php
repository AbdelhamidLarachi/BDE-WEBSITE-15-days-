
<!DOCTYPE html>
<html>
    <head>
        <title>Disable Button - JQuery Example</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    </head>
    <body>
        <p>Click the button below to disable it!</p>
        <button id="my_button">Click Here</button>
        
        <script>
            $('#my_button').on('click', function(){
                alert('Button clicked. Disabling...');
                $('#my_button').attr("disabled", true);
            });
        </script>
    </body>
</html>