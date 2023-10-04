module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
    "extends": [
        'airbnb',
        'airbnb-typescript',
        'airbnb/hooks',
        "eslint:recommended",
        "plugin:@typescript-eslint/recommended",
        "plugin:react/recommended"
    ],
    "ignorePatterns": [".eslintrc.cjs", "vite.config.ts"],
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
        "react"
    ],
    "rules": {
        'react/react-in-jsx-scope': 0,
        'import/prefer-default-export': 0,
        '@typescript-eslint/semi': 0,
        'no-param-reassign': ['error', {
            props: true,
            ignorePropertyModificationsFor: [
                'state',
            ]
        }],
    },
}
