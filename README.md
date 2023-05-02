# prestamosDeLibros
para que el archivo se ejecute correctamente se debe añadir un htacces, no se aun porque al subir el proyecto se elimina dicho archivo el archivo debe contener la siguiente  instruccion:
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>