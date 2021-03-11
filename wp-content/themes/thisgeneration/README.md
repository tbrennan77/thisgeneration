# This Generation Wordpress Theme

This is a custom WordPress theme for Christian Media International (CMI). The goal of CMI is to reach the world with the gospel in this generation. The theme name is taken from that mission statement.

The theme is built on the [Sage template](https://roots.io/sage) from Roots.io. The development is being led by [Tim Brennan](https://github.com/tbrennan77) with design by Brandon McCurdy. The technical documentation that is specific to Sage is located in the `wp-content/themes/thisgeneration` directory. Please reference that for specific functionality questions, install, setup and running this project locally.

## Getting Started 

Follow these steps to run this project locally:

1. Download a fresh copy of [WordPress](https://wordpress.org/download/) to your local machine in your project or websites directory. 
2. `cd` into the root folder of `your/project/directory/` and `git clone git@github.com:tbrennan77/thisgeneration.git`
3. Run a database update from the `/Migrations` directory to get the latest version of the database (TODO: add more specific details here...).
4. Edit the `wp-config.php` file to point to your specific database (ie `localhost` with your `username` and `password`).
5. Refer to the technical documentation in the `wp-content/themes/thisgeneration` directory for instructions on running the project locally. 


# Carbon Fields

This theme is built around the amazing [Carbon Field](https://carbonfields.net/) library from our friends and project partners at [htmlBurger](https://htmlburger.com/). Carbon Fields is much more developer-centric than Advanced Custom Fields (ACF) or similar custom fields libraries that may exist. With Carbon Fields the custom fields are defined via PHP and not an admin UI. So while there may be less control over the general setup there is much more flexibility and customizations than is possible with ACF. Additionally changes are part of the Git history. Below are some of the initial custom fields that are built into this project:


## Header

The header shows a standard WordPress menu location and a button.

The menu is managed from [WordPress menus](nav-menus.php). The button is managed from [Theme options](admin.php?page=crbn-theme-options.php)

## Footer

1. The footer shows three menu locations, socials, copyright text and optionally another logo on top.
2. It also shows a background image.
3. The menu locations are managed from [WordPress menus](nav-menus.php)
4. The social icon links, copyright text and background image are managed from [Theme options](admin.php?page=crbn-theme-options.php)

## Theme Options

1. Manage header, footer and socials
2. The callout shown at the bottom of blog pages
3. You can optionally add scripts to header and footer (no need for additional plugin for this)

## Post

To edit the blue text in the top part of the single post page and the excerpt in the blog listing, edit the text in the excerpt section to the right in the post edit page

## Page Templates

### Section Builder

Use many different sections to build a page.

Has a checkbox to show or hide the additional footer logo.

## Shortcodes

### [year]

The [year] shortcode shows the current year

Example usage:

	The current year is [year] .
