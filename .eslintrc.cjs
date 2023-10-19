module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
    "extends": [
        'airbnb',
        'airbnb-typescript',
        'airbnb/hooks',
        "prettier"
    ],
    "ignorePatterns": [".eslintrc.cjs", "vite.config.ts", "*.config.js" ],
    "overrides": [
        {
            "env": {
                "node": true
            },
            "files": [
                ".eslintrc.{js,cjs}"
            ],
            "parserOptions": {
                "sourceType": "script"
            }
        }
    ],
    "parser": "@typescript-eslint/parser",
    "parserOptions": {
        "ecmaVersion": "latest",
        "sourceType": "module",
        "project": ["tsconfig.json"]
    },
    "plugins": [
        "@typescript-eslint",
        "react",
    ],
    "rules": {
        'react/react-in-jsx-scope': 0,
        'import/prefer-default-export': 0,
        '@typescript-eslint/semi': 0,
        'react/function-component-definition': 0,
        'no-param-reassign': ['error', {
            props: true,
            ignorePropertyModificationsFor: [
                'state',
            ]
        }],
        'react/jsx-props-no-spreading': 0,
        'react/button-has-type': 0,
        'react/prop-types': 0,
        'react-hooks/exhaustive-deps': 0,
        "react/require-default-props": 0,
    },
}
