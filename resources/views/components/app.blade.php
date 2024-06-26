@props(['title'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <script src="https://cdn.tailwindcss.com"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-***********" crossorigin="anonymous" />


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" 
      rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-***********" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">

    <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
    <title>social | {{$title}}</title>
</head>
<body>
   
    <x-navbar/>

 

   
   <main class="mt-20">
    @include('layouts.flashbag')
    {{$slot}}
   </main>
   <x-footer/>

   </body>
</html>