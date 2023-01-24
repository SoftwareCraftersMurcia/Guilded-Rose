## Installation

The kata uses:
- [Node](https://nodejs.org/en/download/)

Install all the dependencies using npm

```sh
cd typescript

npm install
```

## Folders

- `run.ts` run from the command line
- `app` - contains the two classes:
  - `item.ts` - this class should **not** be changed
  - `gilded-rose.tx` - this class needs to be refactored, and the new feature added
- `tests`
  - `gilded-rose.spec.ts` - test

## Execution

To run from the root directory:

```sh
npx ts-node run.ts 10
```

> Change **10** to the required days.

## Scripts

```sh
npm test              # To run all tests
npm run test:watch    # To run all tests in watch mode
npm run test:coverage # To generate test coverage report
```
