Cloned from the similar project over at https://github.com/suwdc

A change!

The rundown..

* Laravel 4.2+
* AngularJS
* Grunt ... or Gulp. We'll see :)
* Homestead/Vagrant developement environment
* PHPSpec ... and possibly Behat
* Whatever other fancy jazz we decide to throw in the mix

### Install/Setup Homestead Environment

* Install homestead: http://laravel.com/docs/homestead#installation-and-setup
* `cd Project/Path/Homestead && cp Homestead-starter.yaml Homestead.yaml`
* "Should" only require some self-explanatory minor editing in the `Homestead.yaml`.
* `vagrant up`
* Edit your hosts file
* Browse to
  * Laravel API: http://api.my-todo-app.dev/
  * FrontEnd: http://my-todo-app.dev/
* You should be golden!

### Running tests

* From the LaravelApi directory
    * `vendor/bin/phpspec run`
Or even better
* Set up an alias or add to path
* `phpspec run --format=pretty`

Voila! Beautiful documentation-ish test output with PHPSpec:

![1__vagrant_homestead____mapped_theapp_laravelapi__bash_](https://cloud.githubusercontent.com/assets/1240178/3486446/18fa3756-0439-11e4-9d43-61598f2c9bf4.png)

Note: Feel free to poke around the feature branches, issues, and wiki to see what may or may not be in the works.

Contributions/Feedback welcome.
