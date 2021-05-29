<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ajax</title>
</head>

<body>
    <form>
        <div>
            <select name="selection" id="" onchange="changes(this.value)">
                <option>SELECT HERE</option>
                <option>PHP</option>
                <option>JS</option>
                <option>PYTHON</option>
            </select>
        </div>
        <div>
            <select name="selection" id="here">
                <option>SELECT HERE</option>
            </select>
        </div>
    </form>
    <script>
        function changes(data) {
            // alert(data);
            const asjax = new XMLHttpRequest();

            asjax.open('GET','http://localhost/practice/phpajax/default.php?selectedvalue='+data,'TRUE');
            asjax.send();

            asjax.onreadystatechange = function(){
                if(asjax.readyState==4 && asjax.status==200){
                    document.getElementById("here").innerHTML= asjax.responseText;
                }
            }
        }
    </script>
</body>

</html>