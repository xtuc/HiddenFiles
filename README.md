HiddenFiles
===========

Cette class permet de cacher une archive (RAR) dans une image (BMP, GIF et le format par défault JPG). L'image n'est pas modifé, elle est graphiquement strictement identique.
**Marche uniquement sur Windows!**


# Usage : 


#### Créer une image : 
```php
$HiddenFiles->create("image.jpg", "archive");
```

#### Extraire l'archive caché d'une image : 
```php
$HiddenFiles->extract("ArchivedImage.jpg");
```
