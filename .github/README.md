# Properties Parser

Here is a **PHP** library to retrieve the properties of a `.properties` file.

It seems that `.properties` files are mainly used by Java programs. But you may have also defined a `properties` file in
a **PHP** project or would like to use the same file with both languages.

## Installation

    composer require hpeccatte/properties-parser

## `properties` file format

### Define a property

In a `.properties` file, property/value can be separated by `=`, `:` or a whitespace.

A property can also be defined on multiple lines:

    property = value \
          which \
          is \
          multilined

In this case, the property will be `property` and the value `value which is multilined`.

### Comments

You can define comments in your file by starting a line with `#` or `!` characters.

## References

This parser was implemented to try to match as much as possible the behavior defined by the
[Java Properties Parser](https://docs.oracle.com/javase/10/docs/api/java/util/Properties.html).