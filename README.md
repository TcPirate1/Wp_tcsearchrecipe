# Notes

- Download and install Wordpress from https://wordpress.org/download/ and not https://wordpress.com/.
- Setup `phpMyAdmin` with `UniserverZ` (download from https://sourceforge.net/projects/miniserver/files/), download Wordpress and add to `www` folder under the C drive.
- The links don't work. Use links without the extensions at the end. E.g. replace `wp-admin.php` with `wp-admin`.
- Yes, everything got added to the gitignore except for themes. Most importantly `wp-config.php` contains sensitive information and should NEVER be added to repo.
- https://developer.wordpress.org/themes/core-concepts/theme-structure/
- https://themeisle.com/blog/wordpress-news-aggregator-website/
- https://rss.feedspot.com/home_cooking_rss_feeds/

## Theme

Blossom recipes (Aggregation website)

## Repo add-ons

[Update when needed.](https://github.com/vlucas/phpdotenv) for managing environment variables.
[RSS aggregation plugin](https://wordpress.org/plugins/wp-rss-aggregator/)
[Auth0 plugin](https://wordpress.org/plugins/auth0/)

## .env.example

List of environment variables that need to be set. Create your own .env file and set the values.
