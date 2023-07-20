<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello </h1>
    <form action="done.php" method="post">
        <label for="firstName">firstName:</label>
        <input type="text" id="firstName" name="firstName"><br><br>
        <label for="lastName">lastName:</label>
        <input type="text" id="lastName" name="lastName"><br><br>

        <label for="address">address:</label>
        <textarea id="address" name="address" rows="4" cols="40"></textarea><br><br>

        <label for="country">Country:</label>
        <select id="country" name="country" >
        <option value="" disabled selected >country</option>
        <option value="USA">United States</option>
        <option value="CAN">Canada</option>
        <option value="MEX">Mexico</option>
        <option value="GBR">United Kingdom</option>
        <option value="FRA">France</option>
        <option value="GER">Germany</option>
        </select> <br><br>

        <label>gender:</label>
        <input type="radio" id="male" name="gender" value="Mr">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Miss">
        <label for="female">Female</label><br><br>
        
        <label>Skills:</label><br>
        <input type="checkbox" id="html" name="skills[]" value="HTML">
        <label for="html">HTML</label>
        <input type="checkbox" id="css" name="skills[]" value="CSS">
        <label for="css">CSS</label><br>
        <input type="checkbox" id="javascript" name="skills[]" value="JavaScript">
        <label for="javascript">JavaScript</label>
        <input type="checkbox" id="python" name="skills[]" value="Python">
        <label for="python">Python</label><br><br>

        <label for="userName">userName:</label>
        <input type="text" id="userName" name="userName"><br><br>

        <label for="password">password:</label>
        <input type="password" id="password" name="password"><br><br>



        <label for="department" >Department:</label>
        <input type="text" id="department" name="department" value="Open Source" readonly style="opacity: 0.5;"><br><br>
        
        <label for="checkedSentence">Re-Enter this sentence:</label>
        <label for="checkedSentence" > <h3 name="sentence" style="font-family: Arial, sans-serif;">ITI_PHP_intern</h3> </label>
        <input type="text" id="checkedSentence" name="checkedSentence" >

        <br><br>
        <button type="submit">submit</button>
        <input type="reset" value="Reset">
        
    </form>
</body>
</html>

<?php
?>