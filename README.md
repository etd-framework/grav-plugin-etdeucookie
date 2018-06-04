# Etd Eu Cookie Plugin

**This README.md file should be modified to describe the features, installation, configuration, and general usage of this plugin.**

The **Etd Eu Cookie** Plugin is for [Grav CMS](http://github.com/getgrav/grav). Grav plugin which displays a dialog

## Installation

Installing the Etd Eu Cookie plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install etdeucookie

This will install the Etd Eu Cookie plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/etdeucookie`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `etdeucookie`. You can find these files on [GitHub](https://github.com/etd-solutions/grav-plugin-etdeucookie) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/etdeucookie
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

### Admin Plugin

If you use the admin plugin, you can install directly through the admin plugin by browsing the `Plugins` tab and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/etdeucookie/etdeucookie.yaml` to `user/config/plugins/etdeucookie.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

Note that if you use the admin plugin, a file with your configuration, and named etdeucookie.yaml will be saved in the `user/config/plugins/` folder once the configuration is saved in the admin.

## Usage

**Describe how to use the plugin.**

## To Do

- [ ] Future plans, if any