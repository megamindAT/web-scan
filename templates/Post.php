<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="templates/w3css_4_w3.css">
<style>
div.container {
    width: 100%;
    border: 1px solid gray;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}

nav {
    float: left;
    max-width: 260px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
</style>
</head>
<body>


<div class="container">

<header>
   <h1>Web Scan</h1>
</header>
  
<nav>
  <ul>
    <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
    <a href='?action=logout'>Logout</a>
    <form action="?action=upload" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>
  </ul>
</nav>

<article>
<table class="w3-table-all notranslate">
<tbody>
<tr>
<th>Delete</th>
<th>IP</th>
<th>Status</th>
<th>Ports</th>
<th>User</th>
</tr>

<?php foreach ($posts as $post):   ?>
<tr>

    <td> <a href="?action=delete&item=<?php print $post[ip]; ?>">Delete</a> </td>
   <!--  <td> <input type="checkbox" name="dell" value="Dell"></td>    -->   
    <td><?php echo $post[ip]; ?></td>
    <td><?php echo $post[status]; ?></td>
    <td><?php echo $post[port]; ?></td>  
    <td><?php echo $post[user]; ?></td>
</tr>    
<?php endforeach ; ?>

<!-- <script type="text/javascript">
  setTimeout(function(){
   window.location.reload(1);
  }, 5000);
</script> -->
</tbody>
</table>
  
</article>

<footer>Copyright &copy; Mr Huong</footer>

</div>

</body>
</html>
