<<<<<<< HEAD
## Resources

### Required Resources

This theme requires the following resources to be installed on your local machine

**NODE:** v20.12.0 or compatible

**NPM:** v10.5.0 or compatible

### Additional Resources

**NVM:** v1.1.12 (Used to switch between different Node versions on your machine, if necessary

## Commands

The following are the commands used to compile assets:

`npm run build` - Build the custom assets in Production mode, minifying, and concatenating styles

`npm run dev` - Build the custom assets once in Development mode to see source files in inspect element

`npm run dev:watch` - Build the custom assets in watch mode to monitoring changes, best for active development

## Initial Installation of existing site

1. Import backup of the site
2. Delete the theme, README, and .gitignore from root of repository.
3. Run the following commands:
    1. `git init`
    2. `git remote add origin <repo_url>`
    3. `git pull origin main`
        1. Ensure your local repositories primary branch name is *main* before pulling
4. Navigate into the theme and run `npm install`
5. You should now be able to run the compilation commands and begin development

To create the production and development branches:

1. `git fetch origin`
2. `git checkout -b production origin/production`
3. `git checkout -b development origin/development`

This will ensure that your local branches reflect any differences between production, main, and development, rather than making copies of main after your initial pull.

## Workflow

Each of these three branches has a corresponding endpoint on WP Engine:

| Repo Branch | WP Engine Environment |
| --- | --- |
| main | staging |
| production | production |
| development | development |

These connections will be made for you. If a connection does not already exist, please reach out to Facta Studio to have it created

DO NOT develop directly on these branches, nor push directly to these branches in github.

ONLY create feature branches and use Github’s Pull Request feature to merge new updates and fixes into these branches there. 

### Branch Naming

For new features and improvements, use: `feature/<feature-name>`

For bugfixes, use `bugfix/<fix-name>`

## Troubleshooting

### Caching

If you find that SCSS or JS edits are not showing on the site, ensure that the .css and .js files being enqueued have an updated flag.

### Compiling

If you encounter an error where jquery is not found, please install it via `npm install jquery`

You may encounter error where other dependencies that are listed in package.json are not installed. Please check that the version of Node you are using is correct. If not, switch to it and reinstalled node_modules. If that does not work, try installing the missing dependency on it’s own.

## Code Movement Visual

![workflow_visual.jpg](https://prod-files-secure.s3.us-west-2.amazonaws.com/9f0f7e6d-608a-4484-8299-4d21e1c61418/545d9c62-6e76-4f3b-8ff1-982334d3bce7/workflow_visual.jpg)
=======
Currently using Foundation 6.5.3.

## JointsWP Requirements
JointsWP requires [Node.js](https://nodejs.org) v6.9.x or newer. This doesn't mean you need to understand Node (or even Gulp) - it's just the steps we need to take to make sure all of our development tools are installed. 

## Getting Started 
### Download JointsWP and install dependencies with npm 
```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone https://github.com/JeremyEnglert/JointsWP.git
$ cd JointsWP
$ npm install
```
At this point, JointsWP should be installed and fully running on your local machine. If you prefer to install the theme manually, that will work as well - just be sure to run `npm install` after manually moving the files into the `/themes/` directory.

## Working with JointsWP
### Watching for Changes
```bash
$ npm run watch
```
* Watches for changes in the `assets/styles/scss` directory. When a change is made the SCSS files are compiled, concatenated with Foundation files and saved to the `/styles` directory. Sourcemaps will be created.
* Watches for changes in the `assets/scripts/js` directory. When a change is made the JS files are compiled, concatenated with Foundation JS files and saved to the `/scripts` directory. Sourcemaps will be created.
* Watches for changes in the `assets/images` directory. When a change is made the image files are optimized and saved over the original image.

### Watching for Changes with Browsersync
```bash
$ npm run browsersync
```
This will watch the same files as `npm run watch`, but utilizes browsersync for live reloading and style injection. Be sure to update the `URL` variable in the `gulpfile.js` to your local install URL. 

## Compile and Minify All Theme Assets
```bash
$ npm run build
```
Compiles and minifies all scripts and styles.

### Compile Specific Assets
* `$ npm run styles` - to compile all SCSS files in the `assets/styles/scss` directory.
* `$ npm run scripts` - to compile all JS files in the `assets/scripts/js` directory.
* `$ npm run images` - to optimize all image files in the `assets/images` directory.

## File Structure - "Where to Put Stuff"

### Custom Styles
* `style.css` - this file is never actually loaded, however, this is where you set your theme name and is required by WordPress
* `assets/styles/scss/style.scss` - import all of your styles here. If you create an additional SCSS file, be sure to import it here.
* `assets/styles/scss/_main.scss` - place all of your custom styles here.
* `assets/styles/scss/_settings.scss` - adjust Foundation style settings here.
* `assets/styles/scss/login.scss` - place custom login styles here. This will generate it's own stylesheet.
### Custom Scripts
* `assets/scripts/js/` - place your custom scripts here. Each .JS file will be compiled and concatenated when the build process is ran.

### Images
* `assets/images/` - place your theme images here. Each image will be optimized when the build process is ran.
>>>>>>> 293f68c (Initial commit of Element2021 code without node_modules)
