<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Mes contacts</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
          crossorigin="anonymous">
    @livewireStyles
</head>
<body>
<main class="container">
    <h1>Mes Contacts</h1>
    @livewire('forms',[
    'qp' => $qp,
    'perPage' => $perPage,
    'searchTerm' => $searchTerm
    ])
    <hr>
    @livewire('data-table',[
    'qp' => $qp,
    'searchTerm' => $searchTerm,
    'sortField' => $sortField,
    'perPage' => $perPage,
    'sortOrder' => $sortOrder,
    ])
</main>
@livewireScripts
</body>
</html>
