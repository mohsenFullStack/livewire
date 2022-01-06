<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    @livewireStyles
</head>
<body>


{{$slot}}

@livewireScripts
<script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script>
    window.livewire.on('StudentAdded',()=>{
        $('#addstudentModal').modal('hide');
    })
    window.livewire.on('StudentUpdated',()=>{
        $('#updatestudentModal').modal('hide');
    })
</script>
</body>
</html>
