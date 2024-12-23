<?php
// added output buffering 
ob_start();

include('includes/database.php');
include('includes/components/navbar/navbar.php');
include('includes/components/loginform/loginform.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>openspear</title>
   <link rel="stylesheet" href="includes/components/navbar/navbar.css">
   <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
   <script src="https://cdn.tailwindcss.com"></script>
   <link rel="stylesheet" href="includes/components/footer/footer.css">
</head>
<body>

</body>
</html>

<?php
// after the output flush it out // 
ob_end_flush();
?>
