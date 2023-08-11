# DPUK Plugin Template

## Project Description
Plugin boilerplate from WordPress 

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation-&-configuration">Installation</a></li>
        <li><a href="#development">Development</a></li>
        <li><a href="#usage">Usage</a></li>
      </ul>
    </li>
    <li><a href="#future-updates">Future Updates</a></li>
    <li><a href="#authors">Authors</a></li>
    <li><a href="#version-history">Version History</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#tests">Tests</a></li>
  </ol>
</details>

## About the project
* Add a detailed description of the project here
## Getting Started
### Prerequisites
* Describe any prerequisites, libraries, OS version, etc., needed before installing program.
* NPM
* Composer
* PHP 7.4+

### Installation & Configuration

* Download the zip file and install it like any other WordPress plugin or clone this repo into your WordPress installation into the wp-content/plugins folder.

### Development
 \* replace the namespace **DPUK_Plugin_Template** with something unique for your project.
 
 \* replace the prefix **DPT** with something unique for your project.

Register class in includes\autoloader.php.

* Run `npm install` to pull all the packages.
* Run `composer install` to bring in php dependencies.
* Run `npm run build` to compile the block.
* Run `gulp comileSass` to compile the css.

### Folder structure
├── build                   # Block Compiled files
├── docs                    # Documentation files
├── assets                  # Asset Files
  |── scss
  |── js
  |── css
  |── images
├── includes                # Main app files   
  ├── classes                   
├── Languages
├── LICENSE
└── README.md

### Usage
* Step-by-step bullets
```
code blocks for commands
```

## Future updates 
* List planned developments

## Authors
* Daniel Pringle 
[@danielpringleuk](https://twitter.com/danielpringleuk)

## Version History
[See the changelog file](CHANGELOG.md)

## License

## Tests






