## Installation

The kata uses:
- [Node](https://nodejs.org/en/download/)

Install all the dependencies using npm

```sh
cd javascript

npm install
```

## Folders

- `run.js` run from the command line
- `src` - contains the two classes:
    - `item.js` - this class should **not** be changed
    - `gilded_rose.jx` - this class needs to be refactored, and the new feature added
- `tests`
    - `gilded_rose.test.js` - test

## Execution

To run from the root directory:

```sh
node run.js 10
```

> Change **10** to the required days.

## Scripts

```sh
npm test              # To run all tests
npm run test:watch    # To run all tests in watch mode
npm run test:coverage # To generate test coverage report
```

