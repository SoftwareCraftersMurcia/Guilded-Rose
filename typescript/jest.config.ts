import { pathsToModuleNameMapper } from  "ts-jest";
const { compilerOptions } = require("./tsconfig");

export default {
  roots: ['<rootDir>/app', '<rootDir>/test'],
  collectCoverage: false,
  coverageDirectory: 'coverage',
  coverageProvider: 'v8',
  transform: {
    '^.+\\.tsx?$': 'ts-jest',
  },
  moduleNameMapper: pathsToModuleNameMapper(compilerOptions.paths, { prefix: '<rootDir>/' } ),
};
