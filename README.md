# goofi
get google fonts onto your server with just one &lt;link>

instead of 
```
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans|Roboto" rel="stylesheet">
```

use 
```
<link href="goofi.php?family=Nunito+Sans|Roboto" rel="stylesheet">
```

and the script will get the fonts & css and then save it onto your server. After that, no more queries will be send to google's servers anymore ;-)
