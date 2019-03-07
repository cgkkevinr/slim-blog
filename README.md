# Using Composer

You do not need to include Composer in your PHP image.
Composer can run as a standalone (temporary) container to do any actions you wish.

**Installing**

*Development*

`docker run --rm --interactive --ty --volume ${PWD}:/app composer install --ignore-platform-reqs --no-scripts`

*Production*

`docker run --rm --interactive --tty --volume ${PWD}:/app composer install --ignore-platform-reqs --no-scripts --no-dev`

# PHP-FPM and NGINX

When running in two separate containers it was important to make sure that the NGINX root path and the PHP-FPM public/ path were the same.