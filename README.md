GbreadcrumbPHP
==============

Clase para modelar un breadcrumb.

## Instalación 

1-Incluye la clase:

` require 'Gbreadcrumb.php'; ` 

-Crea una nueva instacia de GBreadCrumb

` $Breadcrumb = new GBreadCrumb(); ` 

-Agrega todos los link que desees:

```php
<?php

$Breadcrumb->Push('Inicio', 'http://tudomino.com');
$Breadcrumb->Push('Listado de productos', 'http://tudomino.com/productos');
$Breadcrumb->Push('Celular', 'http://tudomino.com/productos/celular');

echo $Breadcrumb->printBreadCrumb("", true);

?>
```




                
