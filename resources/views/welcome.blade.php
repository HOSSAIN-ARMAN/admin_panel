<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

</head>
<body>
<div class="flex-center position-ref full-height" id="app">
    <multi-image-component></multi-image-component>
    <h4>hello</h4>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
<script>
    import MultiImageComponent from "../js/components/MultiImageComponent";
    export default {
        components: {MultiImageComponent}
    }
</script>
