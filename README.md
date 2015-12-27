# craft-dropdowndate
Custom fieldtype for [Craft](https://craftcms.com/) to display a DateTime field as separate dropdowns

## Functionality

* Extends the default DateTime fieldtype, but without a datepicker.
* Allows the user to enter a date using three separate `<select>` fields for day/month/year.
* You can set your own range for the Year field, using full numeric year notation (eg. 2016) or a `strtotime()` value based on the current date/time.

## Installation

### Using Composer

1. Add `ctigelaar/craft-dropddowndate` to your `composer.json` file.
2. Run Composer:

	```
	php composer.phar update
	```
3. Go to your Control Panel and navigate to Settings/Plugins and click the Install button to install Dropdown Date.
4. Installation complete, you can now choose this fieldtype when creating fields.

### Using just copy and paste

1. Download a zip from the latest release, [see releases](releases).
2. Unzip it in a new directory `craft/plugins/dropdowndate`.
3. Go to your Control Panel and navigate to Settings/Plugins and click the Install button to install Dropdown Date.
4. Installation complete, you can now choose this fieldtype when creating fields.

## TODO
Some ideas to make this fieldtype even more flexible. Just a list of ideas, not to be meant as a roadmap or something like that.

* Add dropdowns for time selection
* Display dropdowns in the order of Craft's dateformat


## Contact
If you have any questions, suggestions or noticed any bugs, please feel free to contact me.
