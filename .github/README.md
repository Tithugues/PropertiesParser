# Properties Parser

Here is a library to retrieve the keys of a `.properties` file.

It seems that `.properties` files are mainly used

## `properties` file format

### Define a property

In a `.properties` file, key/value can be separated by `=`, `:` or a whitespace.

A property can also be defined on multiple lines:

    key = value \
          which \
          is \
          multilined

In this case, the key will be `key` and the value `value which is multilined`.

### Comments

You can define comments in your file by starting a line with `#` or `!` characters.

## References

This parser was implemented to try to match as much as possible the behavior defined by the [Java Properties Parser](https://docs.oracle.com/javase/10/docs/api/java/util/Properties.html).