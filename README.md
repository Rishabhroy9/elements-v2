## Resources

### Required Resources

This theme requires the following resources to be installed on your local machine

**NODE:** v20.12.0 or compatible

**NPM:** v10.5.0 or compatible

### Additional Resources
dg
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