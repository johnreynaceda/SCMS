<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OSCA-Office for Senior Citizen Affairs</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-overlay.min.css"
        rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        [x-cloak] { display: none !important; }
        @media (min-width: 15em) {
            .filepond--item {
                width: calc(35% - 0.5em);
            }
        }

        @media (min-width: 50em) {
            .filepond--item {
                width: calc(33.33% - 0.5em);
            }
        }

        .w{
            color: white;
        }
        

    </style>
    <style type="text/css" media="print">
@media print {
  body {-webkit-print-color-adjust: exact;}
}
@page {
    size:A4 landscape;
    margin-left: 0px;
    margin-right: 0px;
    margin-top: 0px;
    margin-bottom: 0px;
    margin:;
    -webkit-print-color-adjust: exact;
}
</style>

</head>

<body class="font-sans antialiased" onload="window.print()" onafterprint="window.close()">
   @livewire('print-id',[
     'id' => $id,
   ])
    @livewireScripts
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.js"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
    </script>
</body>

</html>
