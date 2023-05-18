const path = require('path')

module.exports = {
    resolve: {
        extensions: ['.js', '.json', '.vue', '.blade.php'],
        alias: {
            '~': path.join(__dirname, 'resources/sass'),
            '@components': path.join(__dirname, 'resources/js/components'),
            '@src': path.join(__dirname, 'resources/js/src'),
            '@utils': path.join(__dirname, 'resources/js/utils'),
            '@static': path.join(__dirname, 'resources/js/static'),
        }
    },
}
