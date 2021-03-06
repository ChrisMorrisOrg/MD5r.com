# MD5r.com

By [Chris Morris](http://chrismorris.org).

A PHP tool for MD5 hashing and cracking.

Background
----------
I originally made this site back in 2008, but I've revamped it a bit and setup a dictionary using MySQL, this allow users to hash and then crack content. Once a user has hashed something, it will automatically be added to the dictionary so that it can be reverted.

Known Issues
------------
- Collisions may not crack correctly.

Version History
---------------
### v2.1.000 (2013-Feb-04)
- Updated schema allows for large text blocks to be hashed.
- Case-sensitivity bug fixed.
- Generator no longer skips certain words, due to schema fix.
- 1000-char limit removed.
- Hash input element is now a large textarea.

### v2.0.006 (2013-Jan-21)
- Updated schema.
- Allows for up to 1000-char long input for hashing.
- Fix for hashing inputs larger than 255-chars which would map the first 255-chars to the hash for the 256+ char string.

### v2.0.001 (2013-Jan-21)
- Added Database integration/rainbow table.
- Simple PHP generator file to hash dictionaries.

### v1.0 (2008)
- Allows users to hash using MD5, as well as get the current UNIX timestamp.
