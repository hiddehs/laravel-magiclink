<!DOCTYPE html>
<html>
<head>
    <title>Confirming</title>
</head>
<body>
<form method="get">
{{ csrf_field() }}
</form>
<script !src="">
document.onload = function () {
    document.getElementsByTagName("form")[0].submit()
}

</script>

</body>
</html>
