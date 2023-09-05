# em-media-query

[![Build Status][ci-img]][ci]

Transform min/max-width/height media queries to ems.

This is a low-level module. You’re probably looking for
[PostCSS][postcss-plugin] or [Babel][babel-plugin] plugin.

## Install

```sh
npm install em-media-query --save
```

## Usage

```js
import meMediaQuery from 'em-media-query';

console.log(emMediaQuery('screen and (min-width:600px)'));
// 'screen and (min-width:37.5em)'
```

## API

### emMediaQuery(str, [opts])

Returns: `string`

#### str

Type: `string`

Media query to convert.

#### opts

Type: `Object`

##### precision

Type: `number`  
Default: `5`

Rounding precision for values.

## License

MIT © [Ivan Nikolić](http://ivannikolic.com)

<!-- prettier-ignore-start -->

[ci]: https://travis-ci.com/niksy/em-media-query
[ci-img]: https://travis-ci.com/niksy/em-media-query.svg?branch=master
[postcss-plugin]: https://github.com/niksy/postcss-em-media-query
[babel-plugin]: https://github.com/niksy/babel-plugin-em-media-query

<!-- prettier-ignore-end -->
